<?php

namespace App\Service\Task\Dto;

use App\Models\Enum\Task\TaskStatus;

readonly class TaskDto
{
    public function __construct(
        public ?string $title
        ,public ?string $description
        ,public ?string $user_id
        ,public ?string $status = TaskStatus::PENDING->value
    )
    {
    }
}
