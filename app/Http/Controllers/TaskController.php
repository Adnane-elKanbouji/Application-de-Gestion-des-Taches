<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
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
}
