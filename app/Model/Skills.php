<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

class Skills
{
    /**
     * @return array<string, array<int,string>>
     */
    public function get(): array
    {
        return [
            'PHP' => [
                'PHP',
                'Symfony',
                'Laravel',
                'Nette',
                'Doctrine ORM',
                'Guzzle',
            ],
            'Go' => [
                'Go',
                'net/http',
                'Goroutines',
                'Wire (DI)',
                'sqlx',
                'Goose',
                'Cobra',
                'slog',
            ],
            'Node.js' => [
                'Node',
                'Nuxt',
                'Next',
                'SvelteKit',
                'Strapi',
                'Crawlee',
                'Apify SDK',
                'Puppeteer',
                'Cheerio',
            ],
            'Frontend' => [
                'Vite',
                'TypeScript',
                'Vanilla JS',
                'Vue',
                'Svelte',
                'React',
                'Tailwind',
                'Bootstrap',
                'SCSS',
            ],
            'Testing' => [
                'PHPUnit',
                'Codeception',
                'Nette Tester',
                'Vitest',
                'Playwright',
            ],
            'Code quality' => [
                'PHPStan',
                'PER-3',
                'Eslint',
                'GoArchLint',
                'GoLines',
                'knip',
                'commitlint',
            ],
            'DB & Storage' => [
                'Postgres',
                'MySQL',
                'SQLite',
                'MariaDB',
                'AWS Aurora',
                'RabbitMQ',
                'Redis',
            ],
            'API' => [
                'JWT',
                'OAuth',
                'REST',
                'GraphQL',
                'CURL',
                'Postman',
            ],
            'Dev-Ops' => [
                'Docker',
                'Kubernetes',
                'Shell',
                'Nginx',
                'Apache',
                'PHP-FPM',
                'Dokploy',
                'Easypanel',
                'Grafana',
                'Prometheus',
                'OTel',
                'Sentry',
            ],
            'Cloud' => [
                'Google Cloud',
                'AWS',
                'Digital Ocean',
                'AppRunner',
                'S3',
                'ECR',
                'RDS',
                'SES',
                'Apify platform',
            ],
            'GIT' => [
                'GitHub',
                'GitLab',
                'BitBucket',
            ],
            'UX / UI' => [
                'Figma',
                'Affinity',
                'Balsamiq Mockups',
            ],
            'AI Tools' => [
                'Claude CLI',
                'Claude',
                'Cursor',
                'Github Copilot',
                'MCPs',
                'Skills',
                'Anthropic API',
                'OpenAI API',
                'Gemini API',
            ],
            'Nástroje' => [
                'GoLand',
                'PHP Storm',
                'JIRA',
                'Scrum',
                'Slack',
                'TogglTrack',
                'Google Meet',
                'Trello',
            ],
            'Experimentálně' => [
                'Elastic',
                'MongoDB',
                'Pocketbase.io',
                'Google Firebase',
            ],
            'Hobby' => [
                'C#',
                'C++',
                'Unity',
                'Unreal Engine',
                'Three.js',
                'Game dev',
                'VR dev'
            ],
        ];
    }
    
    public function count(): int
    {
        return count($this->get());
    }
}