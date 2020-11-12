@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.update', $article->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="title">Titolo</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Insert title" value="{{old("title") ? old("title") : $article->title }}">
            </div>
            <div class="form-group">
              <label for="slug">Slug</label>
              <input type="text" class="form-control" id="slug" name='slug' placeholder="Insert slug" value="{{old("slug") ? old("slug") : $article->slug}}">
            </div>
            <div class="form-group">
                <label for="image">Inserisci un immagine</label>
                <input type="file" class="form-control-file" name="image" id="image" placeholder="Insert image" accept="image/*">
              </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" id="content"  cols="20" rows="10" placeholder="Insert Content" {{old("content") ? old("content") : $article->content }}></textarea>
            </div>
            <div class="form-group">
                <label for="tag">Tag</label>
                <input type="text" class="form-control" id="tag" name='tag' placeholder="Insert tag" value="{{old("tag")}}">
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </form>
    </div>
@endsection