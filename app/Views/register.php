<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<link type="text/javascript" href="./logic.js">
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.js'); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">29Kreativ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= site_url();?>">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url("login");?>">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url("register");?>">Register</a>
      </li>
    </ul>
  </div>
</nav>

<div class="card"> 
  <div class="card-body">
    <h1>Register Here</h1>
    <hr>

    <!-- <span id="success-msg"></span> -->
    <!-- <span id="error-msg"></span> -->
    <!-- <div class="row">
            <div class="col-lg-4 offset-lg-4" id="alert">
                <div class="alert alert-primary">
                    <strong id="result"></strong>
                </div>
            </div>
        </div> -->

        <div id="errorMessages"></div>
    <form method="post" id="register-frm" action="<?= base_url("register/do_register"); ?>">
      <div class="form-group mb-3">
        <label for="name">Full Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="John Doe" required>
      </div>

      <div class="form-group mb-3">
        <label for="email">Email address</label>
        <input name="email" type="email" id="email" class="form-control" id="email" placeholder="johndoe@gmail.com" required>
      </div>


      <div class="form-group mb-3">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" class="form-control" id="password"  placeholder="12345" required>
      </div>
      

      <div class="form-group mb-3">
        <label for="confirmpassword">Confirm Password</label>
        <input name="confirmpassword" id="confirmpassword" type="password" class="form-control" id="confirmpassword" placeholder="12345" required>
      </div>
      

      <button type="submit" id="register-btn" class="btn btn-primary" >Register</button>
    </form>
  </div>
</div>
