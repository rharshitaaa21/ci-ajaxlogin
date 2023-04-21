
<div class="card"> 
  <div class="card-body">
    <h1>Register Here</h1>
    <hr>
   
<div class="alert alert-danger" id="error_message"><strong id="result"></strong></div>
<div class="alert alert-success" id="success_message"><strong id="result"></strong></div>  
 <form method="post" action="/register/do_register" id="register-form">
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


      <button type="submit" class="btn btn-primary register-btn" id="save-btn" >Register</button>
    </form>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.js'); ?>"></script>


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
          error_confirmpassword= 'Please Re-enter Your Password';
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

       $(".register-btn").click(function(e){
    if(document.getElementById('register-form').checkValidity()){
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url('register/do_register')?>",
            method: 'post',
            data: $("#register-form").serialize()+'&action=register',
            success: function(response){
                console.log('inside success')
                console.log(response);
                if(response == "Okay"){
                    console.log('inside okay');
                    $(".alert-danger").hide();
                    $(".alert-success").show();
                    $("#success_message").html("User Registered Successfully! Please Login");
                }
                else {
          console.log(response.errors);
            console.log('inside error'); 
            console.log( response); 
        
            $(".alert-danger").show();
            $("#error_message").html(response);
        }
            },
            error: function(xhr, status, error) {
        console.log("inside error block");
        var errors = JSON.parse(xhr.responseText);
        var errorString = "";
        $.each(errors, function(index, value) {
            errorString += value + "<br>";
        });
        $("#alert-danger").show();
        
        $("#error_message").html(errorString);
    }                                            
        });
    }
    return true;
});
  });
 </script>