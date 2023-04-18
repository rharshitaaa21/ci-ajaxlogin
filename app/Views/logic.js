
$(document).ready(function() {
    $("#register-frm").submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('register/do_register'); ?>",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.status == "success") {
                    alert(response.message);
                    window.location.href = "<?php echo base_url('login'); ?>";
                } else {
                    var errorHTML = '';
                    $.each(response.message, function(key, value) {
                        errorHTML += '<div class="alert alert-danger">' + value + '</div>';
                    });
                    $('#errorMessages').html(errorHTML);
                }
            }
        });
    });
});