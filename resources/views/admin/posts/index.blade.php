@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Content</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($articles as $article)
                <tr>
                    <td>{{$article->title}}}}</td>
                    <td>{{$article->slug}}}}</td>
                    <td>{{$article->content}}}}</td>
                </tr>
              @endforeach
          </table>
    </div>
@endsection