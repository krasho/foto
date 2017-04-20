@extends('layouts/app')

@section('content')
    <h1>{{$post->title}}</h1>

    <p>
        {{$post->content}}
    </p>

    <p>
        {{$post->user->name}}
    </p>

    <h4>Comentarios</h4>

    {!! Form::open(['route' => ['comments.store', $post], 'methdd'=>'POST']) !!}
       {!! Field::textarea('comment') !!}

       <button type="submit">
           Publicar Comentario
       </button>
    {!! Form::close() !!}
@endsection
