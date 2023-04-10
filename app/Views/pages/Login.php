
    <div class="text-center container-sm">
    <h1 class="text-center mb-5">Please Login..</h1>
    
    <h5 class="text-danger"> <?= session()->getFlashdata('error') ?></h5>
    <h5 class="text-danger"></h5>

    <form action="Pages/login" method="post" id="">

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