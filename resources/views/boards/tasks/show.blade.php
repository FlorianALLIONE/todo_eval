@extends('layouts.main')
@section('title', "Board's tasks")

@section('content')
    <p>Ici on va afficher les infos de la tache {{$task->title}}.</p>
    <p>{{$task->description}}</p>
    <p>A faire pour le {{$task->due_date}}</p>
    <p>status {{$task->state}}</p>
    <div>Les utilisateurs assignés à la taches : </div>
    @foreach ($task->assignedUsers as $users)
        <p>{{$user->email}} : {{$user->name}}</p>
    @endforeach
    <br />
    <br />
    <br />
    <h2>Les commentaires :</h2>
    @foreach ($comments as $comment)
        <p>{{$comment->text}}</p>
    @endforeach
    <a href="{{route('comments.create', [$board,$task])}}">Ajouter un commentaire</a>
@endsection