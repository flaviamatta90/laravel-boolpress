@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="title">Titolo</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Insert title">
            </div>
            <div class="form-group">
              <label for="slug">Slug</label>
              <input type="text" class="form-control" id="slug" name='slug' placeholder="Insert slug">
            </div>
            <div class="form-group">
                <label for="image">Inserisci un immagine</label>
                <input type="file" class="form-control-file" name="image" id="image" placeholder="Insert image" accept="image/*">
              </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" id="content"  cols="20" rows="10"></textarea>
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