<?php

namespace App\Enums;

enum TaskPriority: string
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';

    public function colorClass(): string
    {
        return match($this) {
           self::HIGH => 'bg-error-container text-on-error-container',
            self::MEDIUM => 'bg-surface-variant text-on-secondary-fixed-variant',
            self::LOW => 'bg-secondary-container text-on-secondary-fixed-variant',
        };
    }
}