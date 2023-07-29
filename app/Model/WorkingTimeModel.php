<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

class WorkingTimeModel
{
    /**
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function get(): array
    {
        $workingZone = new \DateTimeZone('America/Edmonton');
        $clientZone = new \DateTimeZone('Europe/Prague');
    
        $current = new \DateTime('now', $workingZone);
        $workingFrom = clone $current;
        $workingTo = clone $current;
    
        $workingFrom->setTime(9, 0);
        $workingTo->setTime(0, 0);
        
        return [
            'workingZone' => $workingZone->getName(),
            'isWorkingTime' => $current >= $workingFrom && $current <= $workingTo,
            'local' => [
                'from' => $workingFrom->format('H:i'),
                'to' => $workingTo->format('H:i'),
            ],
            'target' => [
                'from' => $workingFrom->setTimezone($clientZone)->format('H:i'),
                'to' => $workingTo->setTimezone($clientZone)->format('H:i'),
            ]
        ];
    }
}