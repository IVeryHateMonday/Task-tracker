<?php

namespace App\Service\Task;

use App\Service\Task\Dto\TaskDto;
use App\Service\Task\Repository\TaskRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class TaskService
{
    public function __construct(public TaskRepository $taskRepository){

    }
    public function all($userId): LengthAwarePaginator
    {
         return $this->taskRepository->get($userId);
    }

    public function find($taskId)
    {
        return $this->taskRepository->find($taskId);
    }

    public function store(TaskDto $taskDto)
    {
        $this->taskRepository->store($taskDto);
    }
}
