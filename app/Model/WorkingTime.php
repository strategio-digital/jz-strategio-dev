<?php
/**
 * Copyright (c) 2023 Strategio Digital s.r.o.
 * @author Jiří Zapletal (https://strategio.dev, jz@strategio.dev)
 */
declare(strict_types=1);

namespace App\Model;

class WorkingTime
{
    /**
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function get(): array
    {
        $workingZone = new \DateTimeZone('Europe/Prague');
        $clientZone = new \DateTimeZone('America/Edmonton');
    
        $current = new \DateTime('now', $workingZone);
        
        $workingFrom = clone $current;
        $workingFrom->setTime(9, 0);
        
        $workingTo = clone $workingFrom;
        $workingTo->modify('+7 hours');
        
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