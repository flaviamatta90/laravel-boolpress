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
                    <td>
                        <a href="{{route('admin.posts.show', $article->slug)}}">View </a>
                        <a href="{{route('admin.posts.create', $article->slug)}}">Create</a>
                        <a href="{{route('admin.posts.destroy', $article->slug)}}">Delete</a>
                        Edit</td>

                </tr>
              @endforeach
          </table>
    </div>
@endsection