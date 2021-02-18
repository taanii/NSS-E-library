<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js  " /> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kmlpandey77/bootnavbar/css/bootnavbar.css"/> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="stylesheet" href="../../css/nav.css" /><meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Student Login</title>
</head>


<body>
    <div class="container pt-4">
    <nav class="navbar navbar-expand-lg navbar-dark bg-cerulean d-print" id="navbar">

<a class="navbar-brand" id="logo_n_brandname" href="#"><img src="../../img/new_logo.png"
        id="logo" />ज्ञानभंडार</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item mar">
            <a class="nav-link" href="../../users/landing_page/index.php">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item dropdown mar">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Library Section
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../../users/audio/audiosection.php">Audio Stories</a></li>
                <li><a class="dropdown-item" href="../../users/books/bookSection.php">Books</a></li>

                <li class="nav-link dropdown">
                    <a href="#" class="dropdown-item dropdown-toggle" data-toggle="dropdown">
                        Books
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Educational Books</a></li>
                        <li><a class="dropdown-item" href="#">Story books</a></li>
                        <li><a class="dropdown-item" href="#">Picture books</a></li>

                    </ul>
                </li>
                
                <li><a class="dropdown-item" href="#">Poems</a></li>
            </ul>
        </li>
        <li class="nav-item active mar">
            <a class="nav-link" href="../../admin/landing_page/login.php">Log In</a>
        </li>
        <li class="nav-item  mar">
            <a class="nav-link" href="#">About us</a>
        </li>
        </li>
    </ul>
</div>

</nav>
    </div>


    <div class="d-flex justify-content-center align-items-center login-container">
        <form class="login-form text-center">
            <h1 style="color:white;" style="font-family:verdana;" class="mb-5 font-weight-light text-uppercase">Faculty Login</h1>
            <div class="form-group">
                <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Password">
            </div>
            <div class="forgot-link form-group d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label style="color:white;" class="form-check-label" for="remember">Remember Password</label>
                </div>
                <a style="color:white;" href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Log in</button>
	    
        </form>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kmlpandey77/bootnavbar/js/bootnavbar.js"></script>
        <script>
          $('navbar').bootnavbar();
      </script>
</body>

</html>