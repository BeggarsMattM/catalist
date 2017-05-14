<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CATALIST {{ $user }}</title>

    <!-- Bootstrap CSS served from a CDN -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"
    rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">CATALIST</a>
              @if ($user)
              <div class="navbar-brand">Logged in as: {{ $user }}</div>
              @endif
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <form class="navbar-form navbar-right" action="login" method="POST">
                {{ Form::token() }}
                <div class="form-group">
                  <input name="email" type="text" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                  <input name="password" type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
              </form>
            </div><!--/.navbar-collapse -->
          </div>
        </nav>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
          <div class="container">
            <h1>Your one-stop shop for animal pics.</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <form action="register" method="POST">
              {{ Form::token() }}
              <div class="form-group">
                <input name="username" type="text" placeholder="Username" class="form-control">
              </div>
              <div class="form-group">
                <input name="email" type="text" placeholder="Email" class="form-control">
              </div>
              <div class="form-group">
                <input name="password" type="password" placeholder="Password" class="form-control">
              </div>
              <div class="form-group">
                <input name="confirm-password" type="password" placeholder="Confirm Password" class="form-control">
              </div>
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                  {{ $error }}
                </div>
              @endforeach
              <button type="submit" class="btn btn-primary btn-lg">Register &raquo;</button>
            </form>
          </div>
        </div>

          <footer>
            <p>&copy; 2017 The Cat Cabal</p>
          </footer>
        </div> <!-- /container -->

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
