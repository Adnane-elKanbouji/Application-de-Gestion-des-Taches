<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks=Task::with('category')->paginate(5);
        $categories=Category::has('tasks')->get();
        return Inertia::render('Task/Index',[
            'tasks' => $tasks,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $categories = Category::all();
        return Inertia::render('Task/CreateForm',[
            'categories' => $categories,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {

        $request->validated();
        Task::create([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);
       return  redirect()->route('home')->with([
        'message' => 'add Task succefully',
        'class' => 'alert alert-success'
       ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
        $categories = Category::all();
        return Inertia::render('Task/EditForm',[
            'categories' => $categories,
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        //
        $request->validated();
        $task->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'done' => $request->done,
        ]);
        return redirect()->route('home')->with([
            'message' => 'Update Task succssfuly',
            'class' => 'alert alert-success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

       return  to_route('home')->with([
        'message' => 'add Task succefully',
        'class' => 'alert alert-success'
       ]);
    }

    public function getTaskByCategory(Category $category){

      $categories = Category::has('tasks')->get();
      $tasks = $category->tasks()->with('category')->paginate();

       return Inertia::render('Task/Index',[
        'tasks' => $tasks,
        'categories' => $categories,
      ]);

    }

    public function getTaskOrderBy($colums,$direction){
        $categories = Category::has('tasks')->get();
        $tasks = Task::with('category')->orderBy($colums,$direction)->paginate(5);
        return Inertia::render('Task/Index',[
            'tasks' => $tasks,
            'categories' => $categories,
        ]);

    }
    public function search(Request $request){

        $tasks = Task::with('category')
        ->where('title','like','%'.$request->term.'%')
        ->orWhere('body', 'like','%'.$request->term.'%')
        ->orwhere('id','like','%'.$request->term.'%')
        ->paginate(5);
        $categories = Category::has('tasks')->get();
        return Inertia::render('Task/Index',[
            'tasks' => $tasks,
            'categories' => $categories,
        ]);
    }
}
