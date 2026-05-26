<?php

namespace App\Enums;

enum TaskPriority: string
{
    case LOW = 'low';
    case MEDUIM = 'meduim';
    case HIGH = 'high';
}