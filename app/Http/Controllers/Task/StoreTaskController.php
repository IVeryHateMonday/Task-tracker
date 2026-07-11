<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Task\Request\StoreTaskRequest;
use App\Models\Task;
use App\Service\Task\TaskService;
use Illuminate\Routing\Controller;

class StoreTaskController extends Controller
{
    public function __construct(public TaskService $taskService){

    }
    public function __invoke(StoreTaskRequest $request){
        $this->taskService->store($request->toDto());

        return response()->json(['message' => 'Task created successfully'],201);
    }
}
