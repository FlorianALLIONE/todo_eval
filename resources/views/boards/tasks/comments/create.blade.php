@extends('layouts.main')

@section('title', "Add a comment for a task")


@section('content')
    <h2>Ajouter un commentaire</h2>
    <form action="{{route('comments.store', [$board, $task])}}" method="POST">
        @csrf
        <label for="text">Text</label>
        <input type="text" name='text' id ='text' required><br>
        <br>

        <button type="submit">Save</button>
    </form>
@endsection