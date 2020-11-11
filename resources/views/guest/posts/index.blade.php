<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <style>
      .fixed-top{
          position: relative;
      }
  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  </nav>
  <STYLE>
    .navbar{
      height: 50px;
    }
  </STYLE>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-12">

        <h1 class="my-4">Blog</h1>

        <!-- Blog Post -->

        @foreach ($articles as $article)
        <div class="card mb-4">
            <img class="card-img-top" src="{{asset('storage/'.$article->image)}}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{$article->title}}</h2>
              <p class="card-text">{{$article->content}}</p>
              <a href="{{route('posts.show', $article->slug)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              {{$article->user->name}}
              {{$date}}
            </div>
          </div>
        @endforeach
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>

    <style>
      footer{
        padding: 0;
        height: 50px;
      }
    </style>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>