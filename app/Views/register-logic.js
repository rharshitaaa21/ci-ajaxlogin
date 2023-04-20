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

     $("#save-btn").click(function(e){
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