<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::query()->latest()->paginate(config('app.per-page'));

        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        $admins = adminsFromCache();
        $users = usersFromCache();// I use cache here with tag `users` and clear it in UserObserver

        return view('task.create', compact('admins', 'users'));
    }

    public function store(CreateTaskRequest $request)
    {
         Task::create($request->validated());

        return redirect()->route('tasks.index')->with('success', trans('task.created'));
    }

    public function show(Task $task)
    {
        //
    }

    public function edit(Task $task)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('message', trans('task.deleted'));
    }
}
