<?php

namespace App\Http\Controllers;

use App\Models\{Task, Category, Board, Comment};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Board $board
     * @return \Illuminate\Http\Response
     */
    public function index(Board $board)
    {
        //
        return view('boards.tasks.index', ['board' => $board]);

    }


    /**
     * Show the form for creating a new resource from a specific board.
     *
     * @param Board $board : le board pour lequel on crée une tâche
     * 
     * @return \Illuminate\Http\Response
     */
    public function create(Board $board, Task $task)
    {
        //
        $user = Auth::user();
        $categories = Category::all();
        return view('boards.tasks.comments.create', ["user" => $user, 'board' => $board, 'task' => $task]); 
    }

    /**
     * Store a newly created resource in storage for a given board.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Board $board le board depuis/pour lequel on créé la tâche
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Board $board, Task $task)
    {
        $validatedData = $request->validate([
            'text' => 'required|string|max:255',
        ]);
        $user = Auth::user();
        $validatedData['user_id'] = $user->id;
        $validatedData['task_id'] = $task->id;
        Comment::create($validatedData); // Nouvelle méthode création, sans avoir à affecter propriété par propriété
        return redirect()->route('tasks.show', [$board, $task]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Board $board
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board, Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Board $board
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board, Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Board $board
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Board $board
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board, Task $task)
    {
        //
        $task->delete();
        return redirect()->route('tasks.index', $board);
    }
}
