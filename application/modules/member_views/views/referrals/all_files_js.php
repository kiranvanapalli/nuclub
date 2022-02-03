<script>
    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
    $(document).ready(function() {
        var membertabel = $('.ref_table').DataTable({});
        $(document).on('submit', '#ref_form', function(event) {
            event.preventDefault();
            var full_name = $('#fullname').val();
            var email_id = $('#email').val();
            var mobile_number = $('#mobilenumber').val();
            if (full_name == '') {
                toastr["error"]("Full Name is required!");
                return false;
            }
            if (email_id == '') {
                toastr["error"]("Email Id is required!");
                return false;
            }
            if (mobile_number == '') {
                toastr["error"]("Please Enter Mobile Number!");
                return false;
            }
            $.ajax({
                url: "<?php echo base_url() ?>member_views/Member/saveRefferData",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data) {
                        $("#ref_form").trigger("reset");
                        $('#ref_model').modal('hide');
                        toastr["success"]("Referral Send Successfully!");
                        // window.location.href = "<?php echo base_url(); ?>Referralse";
                        
                    } else {
                        toastr["error"]("Referral Send Fail");
                        return false;
                    }
                }
            });

        }); 
    });
</script>