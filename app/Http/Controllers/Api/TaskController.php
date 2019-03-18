<?php

namespace App\Http\Controllers\Api;

use App\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * 
     */
    public function index()
    {
        $tasks = Task::all();

        return response($tasks, 200)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'charset' => 'utf8'
            ]);
    }

    public function uncompleted()
    {
        $uncompleted = Task::where('completed', 0)->get();

        return response($uncompleted, 200)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'charset' => 'utf8'
            ]);
    }

    public function completed()
    {
        $completed = Task::where('completed', 1)->get();
        
        return response($completed, 200)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'charset' => 'utf8'
            ]);
    }

    public function create(Request $request)
    {
        $task = Task::create([
            'name' => $request->input('name'),
        ]);

        return response($task, 200)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'charset' => 'utf8'
            ]);
    }

    public function complete($id)
    {
        $task = Task::where('id', $id)->first();

        if (!$task) {
            return response('', 404)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'charset' => 'utf8'
                ]);
        }

        $task->completed = 1;
        $task->save();

        return response($task, 200)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'charset' => 'utf8'
            ]);
    }

    public function uncomplete($id)
    {
        $task = Task::where('id', $id)->first();

        if (!$task) {
            return response('', 404)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'charset' => 'utf8'
                ]);
        }

        $task->completed = 0;
        $task->save();

        return response($task, 200)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'charset' => 'utf8'
            ]);
    }

    public function edit(Request $request, $id)
    {
        $task = Task::where('id', $id)->first();

        if (!$task) {
            return response('', 404)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'charset' => 'utf8'
                ]);
        }

        $task->name = $request->input('name');
        $task->save();

        return response($task, 200)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'charset' => 'utf8'
            ]);

    }

    public function destroy($id)
    {
        $task = Task::where('id', $id)->first();

        if (!$task) {
            return response('', 404)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'charset' => 'utf8'
                ]);
        }

        $task->delete();

        return response('', 204)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'charset' => 'utf8'
            ]);
    }
}
