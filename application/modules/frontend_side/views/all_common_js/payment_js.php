<script>
    $(document).ready(function() {
        $(document).on('submit', '#payment_form', function(e) {
            e.preventDefault();
            var UTR_Transaction_value = $('#UTR_Transaction_value').val();
            if ($('input[type=radio][name=transaction_type]:checked').length == 0) {
                toastr["error"]("Please Select Transaction Type");
                return false;
            }
            if (UTR_Transaction_value == '') {
                toastr["error"]("Please Enter Transaction Number Or UTR Number");
                return false;
            }
            $.ajax({
                url: "<?php echo base_url() ?>saveTranscation",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data) {

                        toastr["success"]("Thank you Payment Admin Contact You Later");
                        window.location.href = "<?php echo base_url(); ?>user_logout";

                    } else {
                        toastr["error"]("Some Thing Went Wrong");
                        return false;
                    }
                }
            });
        })
    });
</script>