
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

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
    <div class="jumbotron">
  <h1 class="display-4">Welcome </h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-warning btn-lg" href="<?= site_url("login");?>" role="button">Logout</a>
  </p>

</div>
    </div>
</div>