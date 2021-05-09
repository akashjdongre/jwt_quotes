<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quotes, Messages, Thoughts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="dist/needsharebutton.min.css">
    <link rel="stylesheet" href="bseditor.css">
    <script src="ckeditor/ckeditor.js"></script>
</head>

<body>
    <div id="p-banner">

        <!--/.Navbar-->
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top o-page" id="nav1">
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="index.php"><img src="img/final-logo.png" alt="logo"></a>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <!--li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li-->
                        <li class="nav-item"><a class="nav-link" href="messages.php">Messsages</a></li>
                        <li class="nav-item"><a class="nav-link" href="quotes.php">Quotes</a></li>
                        <li class="nav-item"><a class="nav-link" href="thoughts.php">Thoughts</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Log In</a></li>
                    </ul>
                </div>
            </div>
            <!-- Collapsible content -->
        </nav>

        <!--/.Navbar-->
    </div>
    <!---------------log in------------------>
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!---------Login------------>
       <div class="n-login">
        <div class="form-title text-center">
          <h4>Login</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form>
            <div class="form-group">
              <input type="email" class="form-control" id="email1"placeholder="Your email address...">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password1" placeholder="Your password...">
            </div>
            <button type="button" class="btn btn-info btn-block btn-round">Login</button>
          </form>
        </div>
        </div>
        <!---------Sign up------------>
        <div class="n-signup">
        <div class="form-title text-center">
          <h4>Sign Up</h4>
        </div>
        <div class="d-flex flex-column text-center">
          <form>
            <div class="form-group">
              <input type="email" class="form-control" id="email1"placeholder="Your email address...">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password1" placeholder="Your password...">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="password1" placeholder="Confirm password...">
            </div>
            <button type="button" class="btn btn-info btn-block btn-round">Sign Up</button>
          </form>

        </div>
        </div>
        <!---------Sign up------------>
        <hr>
         <div class="signup-section n-login text-center">Not a member yet? <a id="n-signup" href="#a" class="text-info"> Sign Up</a>.</div>
        <div class="signup-section n-signup text-center">Already have Account? <a id="n-login" href="#a" class="text-info"> Login</a>.</div>
      </div>
    </div>
  </div>
</div>

        <!---------------log in------------------>
