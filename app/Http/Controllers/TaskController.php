<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function create(Request $request)
    {
        $task = json_decode($request->getContent());
        $created_task = Task::create(['name' => $task->name, 'is_done' => 0]);

        return response()->json([
            'task' => $created_task
        ]);
    }

    public function update(Request $request)
    {
        $task_obj = json_decode($request->getContent());
        $task = Task::find($task_obj->id);
        $task->name = $task_obj->name;
        $task->is_done = $task_obj->is_done;
        $task->save();

        return response()->json([
            'message' => 'Successfully updated task!',
            'task' => var_dump($task)
        ]);
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return response()->json([
            'message' => 'Successfully deleted task!'
        ]);
    }
}
