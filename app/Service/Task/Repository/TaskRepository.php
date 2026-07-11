<?php

namespace App\Service\Task\Repository;

use App\Models\Enum\Task\TaskStatus;
use App\Models\Task;
use App\Models\User;
use App\Service\Task\Dto\TaskDto;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskRepository
{
    public function get(User $user): LengthAwarePaginator
    {
        return $user->tasks()
            ->orderBy('created_at', 'desc')
            ->paginate();
    }

    public function find($taskId): ?Task
    {
        return Task::query()->findOrFail($taskId);
    }

    public function store(TaskDto $taskDto): void{
        Task::create([
           'title' => $taskDto->title,
           'description' => $taskDto->description,
            'user_id' => $taskDto->user_id,
            'status' => $taskDto->status,

        ]);
    }
}
