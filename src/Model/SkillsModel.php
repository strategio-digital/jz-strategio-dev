<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.digital, jz@strategio.digital)
 */
declare(strict_types=1);

namespace App\Model;

class SkillsModel
{
    /**
     * @param int|null $limit
     * @return string[]
     */
    public function get(int $limit = null) : array
    {
        $data = [
            'PHP 8.2',
            'Nette',
            'Symfony',
            'Laravel',
            'PHP Stan lvl 8',
            'Doctrine ORM',
            'Vite, Gulp',
            'TypeScript',
            'Vanilla JS',
            'Vue 3',
            'Vuetify 3',
            'Pinia JS',
            'Bootstrap 5',
            'Tailwind UI',
            'SCSS',
            'REST API',
            'JWT',
            'Postman',
            'Postgres',
            'MySQL',
            'MariaDB',
            'AWS Aurora',
            'RabbitMQ',
            'Redis',
            'Elastic',
            'MongoDB',
            'Docker',
            'CI / CD',
            'nGinX',
            'Apache',
            'Easypanel.io',
            'Google Cloud Platform',
            'Amazon Web Services',
            'Digital Ocean',
            'GitHub',
            'GitLab',
            'BitBucket',
            'PHP Storm',
            'Github Copilot',
            'JIRA / Scrum',
            'Slack',
            'TogglTrack',
            'Full Remote',
            'Google Meet',
            'Trello',
            'Node JS',
            'Playwright',
            'Apify SDK',
            'Pocketbase.io',
            'Google Firebase',
            'Shell Script',
            'Figma',
            'Affinity',
            'Golang'
        ];
        
        if ($limit !== null) {
            return array_slice($data, 0, $limit);
        }
        
        return $data;
    }
    
    public function count() : int
    {
        return count($this->get());
    }
}