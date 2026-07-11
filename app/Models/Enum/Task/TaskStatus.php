<?php

namespace App\Models\Enum\Task;

enum TaskStatus: string
{
    case DONE = 'done';
    case START = 'start';
    case CANCEL = 'cancel';
    case PENDING = 'pending';

}
