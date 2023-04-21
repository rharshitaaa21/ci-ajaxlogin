 <div class="card"> 
    <div class="card-body">
<h1>Login Here</h1>
<hr>
<div class="alert alert-danger" id="error_message"><strong id="result"></strong></div>   
<form method="post" action="/login/do_login" id="login-form">
  <div class="form-group mb-3">
    <label for="email">Email address</label> <span id="error_email" class="text-danger ms-3"></span>
    <input type="email" class="form-control " id="email"  name="email" placeholder="Enter email" required>
  </div>
  <div class="form-group mb-3">
    <label for="password">Password</label> <span id="error_password" class="text-danger ms-3"></span>
    <input type="password" class="form-control " id="password" name="password" placeholder="Enter Password" required>
  </div>
   <button type="submit" class="btn btn-primary login-btn" id="submit-btn">Login</button>
</form>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.js'); ?>"></script>
<script type="text/javascript" src="./javascript/login-logic.js"></script> 

  <script>
   $(".alert").hide();
  $(document).ready(function(){ 
     $(document).on('click','.login-btn', function(){
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

         if(error_email != '' || error_password != '') {
             return false;
         }
       });

           $(".login-btn").click(function(e){
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