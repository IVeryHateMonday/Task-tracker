<?php

namespace App\Http\Controllers\Task;

use App\Service\Task\TaskService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IndexTaskController extends Controller
{
    public function __construct(public TaskService $taskService){

    }
    public function __invoke(Request $request){
        return response()->json(
            $this->taskService->all($request->user())
        );

    }
}
