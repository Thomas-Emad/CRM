<?php

namespace App\Enums;

enum ActivityTypeEnum: string
{
    case Meetings = 'Meetings';
    case Calls = 'Calls';
    case Task = 'Task';
}
