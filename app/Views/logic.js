
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
                           }
                       }
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
