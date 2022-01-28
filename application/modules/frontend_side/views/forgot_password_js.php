<script>

    $(document).ready(function() {
    $(document).on('submit', '#forgot_password', function(event) {
            event.preventDefault();
            var email_id = $('#email').val();



            if (email_id == '') {
                toastr["error"]("Email Id is required!");
                return false;
            }
           
            $.ajax({
                url: "<?php echo base_url() ?>forgotpasswordmail",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                // dataType:'JSON',
                success: function(data) {
                    
                    var obj = jQuery.parseJSON(data);
                    console.log(data);
                    if (obj['status'] == "success") {

                        toastr["success"]("Password Send Your Registered Mail");
                        window.location.href = "<?php echo base_url(); ?>";

                    }
                    else if(obj['status'] == "fail")
                    {
                        toastr["error"]("MailId Not Registered");
                        return false;
                    }
                }
            });

        });
    });

    


    // Enquiry Form Validation

</script>