<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark mb-5" data-bs-theme="dark"">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">Docker</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php 

            if(session('loggedIn')){
                echo '<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/logout">Logout</a>
              </li>';
            }else{
                echo '<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/signup">Signup</a>
              </li>';
                echo '<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/login">Login</a>
              </li>';
            }
        ?>
      </ul>
      
    </div>
  </div>
</nav>