<body class="bg-gradient-primary">

  <div class="container">

<div class="container col-md-8">
<div class=" card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="<?=base_url('auth/registration');?>">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="firstName" name="firstName" placeholder="First Name" value="<?=set_value('firstName');?>">
                    <?=form_error('firstName', '<small class="text-danger pl-3">', '</small>');?>
                  </div>


                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="lastName" name="lastName" placeholder="Last Name" value="<?=set_value('lastName');?>">
                    <?=form_error('lastName', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?=set_value('email');?>">
                  <?=form_error('email', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" value="<?=set_value('password');?>">
                    <?=form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password" value="<?=set_value('password2');?>">
                    <?=form_error('password2', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?=base_url();?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

  </div>

