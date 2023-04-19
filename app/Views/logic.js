$(document).ready(function(){
    $('#register-frm').on('submit', function(e){
      e.preventDefault();
      var name = $('#name').val();
      var email = $('#email').val();
      var password = $('#password').val();
      var confirmpassword = $('#confirmpassword').val();

      $.ajax({
        type: "POST",
        url: 'register/do_register',
        data: {name:name, email:email, password:password, confirmpassword:confirmpassword},
        success: function(response){
          if(response.status == 'error'){
            $('.print-error-msg').html('');
            $.each(response.error, function(key, value){
              $('.print-error-msg').show();
              $('.print-error-msg').append('<p>'+value+'</p>');
            });
          }else{
            $('.print-error-msg').hide();
            $('#register-frm')[0].reset();
            alert('Registration successful');
          }
        }
      });
    });



    // $("#login-form").submit(function(e) {
    //     e.preventDefault();
    //     var form = $(this);
    //     var url = form.attr("action");
    //     $.ajax({
    //         type: "POST",
    //         url: 'login/do_login',
    //         data: form.serialize(), 
    //         success: function(response) {
    //             if (response.status == "success") {
    //                 // window.location = "dashboard.php";
    //                 // do something else on success, like show a success message
    //             } else if (response.status == "error") {
    //                 $("#error-message").html(response.message).show();
    //             }
    //         }
    //     })
    //     // .fail(function(xhr,status,error){
    //     //     var errors = JSON.parse(xhr.responseText);
    //     //     var errorString = "";
    //     //     $.each(errors, function(index, value){
    //     //         errorString += value + "<br>";
    //     //     });
    //     //     $("#alert").show();
    //     //     $("#result").html(errorString);
    //     // });
    // });


    $("#login-btn").click(function(e){
        if(document.getElementById('login-form').checkValidity()){
            e.preventDefault();
            $.ajax({
                url: 'login.php',
                method: 'post',
                data: $("#login-frm").serialize()+'&action=login',
                success: function(response){
                    if(response === "Okay"){
                        window.location='dashboard.php';
                    }
                    else{
                        $("#alert").show();
                        $("#result").html(response);
                    }
                }
            }).fail(function(xhr, status, error) {
                var errors = JSON.parse(xhr.responseText);
                var errorString = "";
                $.each(errors, function(index, value){
                    errorString += value + "<br>";
                });
                $("#alert").show();
                $("#result").html(errorString);
            });
        }
      
        return true;
      });
    
    })
 