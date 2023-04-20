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
    <div class="alert alert-danger" id="error_message"><strong id="result"></strong></div>
            

 <form method="post" id="register-frm" action="<?= base_url("register/do_register"); ?>">
      <div class="form-group mb-3">
        <label for="name">Full Name</label><span id="error_name" class="text-danger ms-3"></span>
        <input name="name" type="text" class="form-control"  id="name" placeholder="John Doe" required>
      </div>

      <div class="form-group mb-3">
        <label for="email">Email address</label><span id="error_email" class="text-danger ms-3"></span>
        <input name="email" type="email" id="email" class="form-control" id="email" placeholder="johndoe@gmail.com" required>
      </div>


      <div class="form-group mb-3">
        <label for="password">Password</label><span id="error_password" class="text-danger ms-3"></span>
        <input name="password" id="password" type="password" class="form-control" id="password"  placeholder="12345" required>
      </div>
      

      <div class="form-group mb-3">
        <label for="confirmpassword">Confirm Password</label><span id="error_confirmpassword" class="text-danger ms-3"></span>
        <input name="confirmpassword" id="confirmpassword" type="password" class="form-control" id="confirmpassword" placeholder="12345" required>
      </div>


      <button type="submit"  class="btn btn-primary register-btn" id="submit-btn" >Register</button>
    </form>
  </div>
</div>



<script>
   $(".alert").hide();
  $(document).ready(function(){
     $(document).on('click','.register-btn', function(){
      if($.trim($('#email').val()).length == 0){
        error_name= 'Please Enter Full Name';
             $('#error_name').text(error_name);
         }
         else{
          error_name= '';
             $('#error_name').text(error_name);
         }
         if($.trim($('#email').val()).length == 0){
             error_email= 'Please Enter Email Address';
             $('#error_email').text(error_email);
         }
         else{
             error_email= '';
             $('#error_email').text(error_email);
         }

         if($.trim($('#password').val()).length == 0){
             error_password= 'Please Enter Password';
             $('#error_password').text(error_password);
         }
         else{
             error_password= '';
             $('#error_password').text(error_password);
         }

         if($.trim($('#password').val()).length == 0){
          error_confirmpassword= 'Please Enter Re-enter Password';
             $('#error_confirmpassword').text(error_confirmpassword);
         }
         else{
          error_confirmpassword= '';
             $('#error_confirmpassword').text(error_confirmpassword);
         }

         if(error_name != '' || error_email != '' || error_password != '' || error_confirmpassword != '') {
             return false;
         }
       });

           $("#submit-btn").click(function(e){
                 if(document.getElementById('login-form').checkValidity()){
                     e.preventDefault();
                     $.ajax({
                         url: "<?php echo base_url('login/do_login')?>",
                         method: 'post',
                         data: $("#login-form").serialize()+'&action=login',
                         success: function(response){
                           console.log('inside success')
                           console.log(response);
                             if(response == "Okay"){
                               console.log('inside okay')
                                 window.location.href="/dashboard";
                             }
                             else{
                               console.log('inside error display')
                                 $(".alert").show();
                                 $("#error_message").html(response);
                             }                         }
                   }).fail(function(xhr, status, error) {
                       console.log('inside error');
                         var errors = JSON.parse(xhr.responseText);
                         var errorString = "";
                         $.each(errors, function(index, value){
                             errorString += value + "<br>";
                         });
                        
                        $("#error_message").html(errorString);
                     });
                 }
              
                 return true;
               });
     });


 </script>