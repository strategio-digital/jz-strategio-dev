# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

Personal/portfolio website of Jiří Zapletal (jz.strategio.dev), built on **Megio** — a Nette-DI + Symfony-HTTP + Doctrine + Latte micro-framework shipped as `strategio/megio-core` in `vendor/`. PHP 8.3, Vue 3 islands, Bootstrap 5, Vite.

There is no test suite and no `phpstan.neon`. The only quality gate is `composer analyse`.

## Commands

```bash
composer analyse                 # phpstan (level 8) + neon-lint config + latte-lint view — run before committing
composer phpstan                 # phpstan only, on app/ www/ bin/console
yarn dev                         # Vite dev server (writes temp/vite.hot; PHP picks it up automatically)
yarn build                       # tsc + vite build → www/temp/ (required before serving without yarn dev)
./project.sh serve               # docker-compose up -d → http://localhost:8090 or https://jz-web.local (OrbStack)
./project.sh app                 # bash into the app container
```

Console (`bin/console <cmd>`, aliases in brackets):

```bash
bin/console migrate              # [migrations:migrate] apply migrations
bin/console diff                 # [migrations:diff] generate migration from entity mapping
bin/console status               # [migrations:status]
bin/console admin <email> <pwd>  # [app:user:create-admin] Megio admin account (for /app panel)
bin/console user <email> <pwd>   # [app:user:create] App\Database\Entity\User; -r <role> grants all resources
bin/console resources            # [app:auth:resources:update] sync auth resources from routes
```

PHPStan level 8 covers only `app/`, `www/`, `bin/console`. The other two `analyse` targets are syntax-only and hit different trees: `neon-lint` → `config/`, `latte-lint` → `view/`. Nothing checks `router/` or `migrations/` — a broken `->controller([...])` reference slips through every gate.

## Where content actually lives — three separate sources

This is the thing that is not visible from any single file:

1. **`app/Model/*.php` are not Doctrine entities.** They are plain classes with a `get(): array` returning hardcoded Czech marketing copy (about-me timeline, skills, tools, references, clients, contacts, working hours, MealHack timeline). Changing site text means editing PHP, not the database or the admin panel. `HomeController` instantiates eight of them directly (`new About()`, …) — no DI, no repository.

2. **The blog is remote.** `BlogController` fetches from `https://strategio.contentio.app/api/` through `App\Http\Client\ContentioClient`, filtered on label `jz-strategio-blog`. There is no local article entity or migration. The client returns `array` on success or a `JsonResponse` on a 404 — controllers must check `instanceof JsonResponse` and return it as an error passthrough (see `BlogController::index`/`detail`).

3. **Contact and newsletter forms bypass this app entirely.** `assets/vue/app/forms/*` POST to Contentio `/lead/create` via `useContentioApi` from `megio-frontils`. `router/rest.php` contains only the two OpenAI routes. "The contact form is broken" is never a local PHP bug.

The only thing in the local database is auth (`user`, `admin`, `auth_role`, `auth_resource`, `auth_token`) — SQLite `db.sqlite3` by default, Postgres commented out in `.env.example` and `docker-compose.yml`.

## Megio conventions

**Routing.** `router/app.php` imports, in order: `rest.php` → `web.php` → megio-core's own `router/app.php` (which registers `/app{uri}` admin panel, `/api` overview, and the `/megio/**` REST API). Route options:
- `auth => false` — no JWT required (all routes in `web.php`/`rest.php` use it)
- `inResources => false` — keep the route out of the auth-resource registry

**Page controllers** extend `Megio\Http\Controller\Base\Controller`: `render(Path::viewDir() . '/controller/x.latte', [...])`, `json()`, `error()`, `redirect($routeName)`, `sendFile()`. Route params and services are injected as method arguments (`index(int $page, ContentioClient $client, Request $request, LinkResolver $resolver)`).

**API endpoints** extend `Megio\Http\Request\Request` and are invokable classes. Declare `schema()` with `Nette\Schema\Expect`, implement `process(array $data)`. `__invoke` validates first and returns `error()` on failure, so `process()` always receives validated data.

**Recipes are auto-discovered.** `RecipeFinder` scans `app/Recipe` (and megio-core's `src/Recipe`) — a new `App\Recipe\*Recipe` needs **no** entry in `config/app.neon`. Recipes define the admin CRUD read columns and write forms for the `/app` panel. `config/app.neon` only registers services that need explicit DI wiring (`EntityManager`, console commands, `ContentioClient`) plus event subscribers under `events:`.

**Views.** Latte templates in `view/`: `@layout.latte` (blocks `head`, `ogimage`, `assets`, `top`, `bottom`, `modal`), `view/controller/*.latte` per page, `view/component/*.latte` for includes. Megio adds three Latte functions: `vite()`, `route()`, `thumbnail()`.

**Frontend entrypoints** (declared in `vite.config.ts`): `assets/app.ts` (public site — SCSS, Vue islands, `megio-frontils` helpers), `assets/panel.ts` (mounts `megio-panel` for `/app`), `assets/particles.ts` (homepage only, loaded via the `bottom` block). Vue components are mounted as islands onto `#vue-*` elements; the OpenAI chat/translator apps are dynamically imported only when their mount point exists. Every static image must be `import`ed in `assets/images.ts` to end up in the build.

## Gotchas

- **`vite()` throws without a build.** It resolves through `temp/vite.hot` (dev) or `www/temp/manifest.json` (prod). `www/temp` is gitignored, so a fresh clone with neither `yarn dev` running nor `yarn build` done 500s on every page.
- **`.env.example` is incomplete.** It omits `JZ_API_KEY`, `OPENAI_API_KEY` and `OPENAI_ORGANIZATION_ID`. Following the readme's `cp .env.example .env` leaves both `/api/utils/open-ai/*` routes broken.
- **The readme's `bin/console user:create-admin` does not exist** — use `admin` or `app:user:create-admin`.
- The OpenAI routes are `auth => false` but not open: `ChatBotRequest`/`TranslatorRequest` compare a client-supplied `apiKey` field against `$_ENV['JZ_API_KEY']` and return 403 on mismatch.
- Local PHP is 8.4 while the project targets 8.3; `bin/console` floods stderr with `E_DEPRECATED` from vendor. Filter with `php -d error_reporting="E_ALL & ~E_DEPRECATED" bin/console …` when reading output.
- Deployment runs `docker-entrypoint.sh`: migrate → generate proxies → `app:auth:resources:update`, then php-fpm + nginx. The Docker build compiles assets in a `node:18-alpine` stage and copies `www/temp` into the PHP image.
