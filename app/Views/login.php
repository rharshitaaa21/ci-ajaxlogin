
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="./logic.js">

<script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.js'); ?>"></script>


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
<h1>Login Here</h1>
<hr>
<div id="error"></div>
<div class="col-lg-4 offset-lg-4" id="alert" style="display:none"  >
                <div class="alert alert-primary">
                    <strong id="result"></strong>
                </div>
 </div>

<form method="post" action="/login/do_login" id="login-form">
<?= csrf_field() ?>
  <div class="form-group mb-3">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email"  aria-describedby="emailHelp" placeholder="Enter email" required>
    <!-- <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group mb-3">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password    " name="password"
      aria-describedby="emailHelp" placeholder="Enter Password" required>
  </div>
   <button type="submit" class="btn btn-primary" value="Login" >Login</button>
</form>
<div id="error-message" class="text-danger" style="display: none;"></div>
</div>
</div>