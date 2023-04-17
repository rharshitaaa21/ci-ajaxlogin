<script>
    $(document).ready(function()){
        $('#register-frm').on('submit', function(e){
            e.preventDefault();
            $ajax({
                url: '',
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function(){
                    $('register-btn').attr('disabled','disabled');
                },
                success: function(data){
                    if(data.error){
                        if(data.error){
                            if(data.email_err != ' ' ){
                                $('#email_err').html(data.email_err);
                            }
                            else{ $('#email_err').html('');}
                            if(data.password_err != ' ' ){
                                $('#password_err').html(data.email_err);
                            }
                            else{ $('#password_err').html('');}
                            if(data.confirm_err != ' ' ){
                                $('#confirm_err').html(data.email_err);
                            }
                            else{ $('#confirm_err').html('');}
                            
                        }
                    }
                    if(data.success){

                        $('#success-msg').html(data.success);
                        $('#email_err').html('');
                        $('#password_err').html('');
                        $('#confirm_err').html('');
                        $('#register-frm')[0].reset();
                    }

                    $('register-btn').attr('disabled', false);


                }

            })

        })





    }





</script>