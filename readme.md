# Web - Jiří Zapletal
Website built on [Megio panel](https://github.com/strategio-digital/megio-starter).

## Installation guide
1. `git clone git@github.com:strategio-digital/jz-strategio-dev.git`
2. `cp .env.example .env`
3. `composer i`
4. `bin/console migrate`
5. `bin/console user:create-admin <email> <password>`
6. `yarn && yarn build`
7. Visit: [http://localhost:8090](http://localhost:8090)