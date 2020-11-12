@extends('layouts.app')

@section('content')
    <div class="container">
      
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Image</th>
                <th scope="col">Content</th>
                <th scope="col">Tag</th>
                <th scope="col">Azioni</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($articles as $article)
                <tr>
                    <td>{{$article->title}}</td>
                    <td>{{$article->slug}}</td>
                    <td>{{$article->image}}</td>
                    <td>{{$article->content}}</td>
                    <td>{{$article->tag}}</td>
                    <td>
                        <a href="{{route('admin.posts.show', $article->slug)}}">View </a>
                        <a href="{{route('admin.posts.create', $article->slug)}}">Create</a>
                        <a href="{{route('admin.posts.edit', $article->slug)}}">Edit</a>
                        <a href="{{route('admin.posts.destroy', $article->slug)}}">Delete</a>
                    </td>

                </tr>
              @endforeach
          </table>
    </div>
@endsection