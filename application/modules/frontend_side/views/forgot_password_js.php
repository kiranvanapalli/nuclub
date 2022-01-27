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
                success: function(data) {
                    let details = JSON.parse(data);
                    if (details.status == "Success") {

                        toastr["success"]("Password Send Your Registered Mail");
                        window.location.href = "<?php echo base_url(); ?>";

                    }
                    else if(details.status == "Fail")
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