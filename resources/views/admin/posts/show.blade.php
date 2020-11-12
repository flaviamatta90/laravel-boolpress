@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$article->title}}</h1>
        <div>
            <img src="{{asset('storage/'.$article->image)}}" alt="image">
        </div>
        <div>
            {{$article->content}}
        </div>
        <div>
            {{$article->tag}}
        </div>
        
        <a class="btn btn-success" href="{{route('admin.posts.index')}}" role="button">Torna ai Post </a>
        <style>
            .btn-success{
                margin:25px 0;
            }
        </style>
        <form action="{{route('admin.posts.destroy', $article->id)}}" method="POST">
            @csrf
            @method('DELETE')
              <input type="submit" value="Delete">
        </form>
    </div>
@endsection