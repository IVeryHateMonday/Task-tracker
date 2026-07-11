<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Service\Task\TaskService;
use Illuminate\Routing\Controller;

class UpdateTaskController extends Controller
{
    public function __construct(public TaskService $taskService){

    }
    public function __invoke(){

    }
}
