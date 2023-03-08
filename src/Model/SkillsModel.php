<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

class SkillsModel
{
    /**
     * @return array<string, array<int,string>>
     */
    public function get(): array
    {
        return [
            'PHP' => [
                'PHP 8.2',
                'Nette',
                'Symfony',
                'Laravel',
                'PHP Stan lvl 8',
                'Doctrine ORM',
                'Guzzle',
                'Nette Tester',
            ],
            'Node.js' => [
                'Node 18',
                'Strapi',
                'Crawlee',
                'Apify SDK',
                'Playwright',
                'Puppeteer',
                'Cheerio',
            ],
            'Frontend' => [
                'Vite',
                'TypeScript',
                'Vanilla JS',
                'Vue 3',
                'Vuetify 3',
                'Pinia JS',
                'React',
                'Bootstrap 5',
                'Tailwind UI',
                'SCSS',
                'Gulp'
            ],
            'DB & Storage' => [
                'Postgres',
                'MySQL',
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
                'Shell',
                'Nginx',
                'Apache',
                'PHP-FPM',
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
                'Easypanel',
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
            'Nástroje' => [
                'PHP Storm',
                'Github Copilot',
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
                'Golang',
            ]
        ];
    }
    
    public function count(): int
    {
        return count($this->get());
    }
}