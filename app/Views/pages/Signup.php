
    <div class="text-center container-sm">
    <h1 id="signup-heading" class="mb-5">Please Signup..</h1>

    
    <?= session()->getFlashdata('error') ?>
    <h5 class="text-danger"><?= $error ?></h5>

    <form  id="signup-form">

    <?= csrf_field() ?>

    <div class="w-50 mb-3 mx-auto">
    <label for="username" class="form-label fs-4" >User Name</label>
    <input type="text" class="form-control" name="username" required>
  </div>

  <div class="w-50 mb-3 mx-auto">
    <label for="email" class="form-label fs-4" >Email address</label>
    <input type="email" class="form-control" name="email" required>
  </div>

  <div class="w-50 mb-3 mx-auto">
    <label for="password" class="form-label fs-4 ">Password</label>
    <input type="password" class="form-control" name="password" required>
  </div>

  <div class="w-50 mb-3 mx-auto">
    <label for="confirm_password" class="form-label fs-4">Confirm Password</label>
    <input type="password" class="form-control" name="confirm_password" required>
  </div>

  <button type="submit" class="btn btn-primary ">Submit</button>

    </form>
    </div>

</body>

<script src="app\Views\pages\jquery.js"></script>
<script type="text/javascript"> 
    $('document').ready(()=>{
        $('#signup-form').on('submit',(e)=>{
          e.preventDefault();

          console.log('form submitted');
        })
    })
</script>
</html>