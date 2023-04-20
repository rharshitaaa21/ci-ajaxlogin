$(document).ready(function(){
    $(document).on('click', '.login-btn', function(){

        // alert("Hello");
        if($.trim($('.email').val()).length == 0){
            error_email = ' Please Enter Email Address';
            $('#error_email').text(error_name);
        }
        else{
            error_name = ' ';
            $('#error_email').text(error_email);
        }

        if($.trim($('.password').val()).length == 0){
            error_email = ' Please Enter Password';
            $('#error_password').text(error_password);
        }
        else{
            error_name = ' ';
            $('#error_password').text(error_password);
        }

        if( error_email != '' || error_password != '')
        {
            return false;
        }
        else{

        }
    })
}); 