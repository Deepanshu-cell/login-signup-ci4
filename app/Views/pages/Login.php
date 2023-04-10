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
    <div class="text-center container-sm">
    <h1 class="text-center mb-5">Please Login..</h1>
    
    <h5 class="text-danger"> <?= session()->getFlashdata('error') ?></h5>
    <h5 class="text-danger"><?php echo \Config\Services::validation()->listErrors() ?></h5>

    <form action="Pages/login" method="post">

    <?= csrf_field() ?>

    <div class="w-50 mb-3 mx-auto">
    <label for="email" class="form-label fs-4" >Email address</label>
    <input type="email" class="form-control" name="email" required>
  </div>
  <div class="w-50 mb-3 mx-auto">
    <label for="password" class="form-label fs-4">Password</label>
    <input type="password" class="form-control" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</body>
</html>