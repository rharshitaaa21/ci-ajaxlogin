

$(document).ready(function(){
    $('#register-frm').on('submit', function(e){
      e.preventDefault();
      var name = $('#name').val();
      var email = $('#email').val();
      var password = $('#password').val();
      var confirmpassword = $('#confirmpassword').val();
      $.ajax({
        type: "POST",
        url: $(this).attr('action'),
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
  });
