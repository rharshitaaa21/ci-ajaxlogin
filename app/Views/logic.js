$(document).ready(function() {
    $('#register-form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: '/do_register',
            type: 'POST',
            data: $('#register-form').serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                    window.location.href = '/login';
                } else {
                    alert(response.message.email);
                    alert(response.message.password);
                    // display error messages for other fields
                }
            }
        });
    });
});
