<?php

namespace App\Enums;

enum TaskStatus: string
{
    case COMPLETED = 'completed';
    case ACTIVE = 'active';
}