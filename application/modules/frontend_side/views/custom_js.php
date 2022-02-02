<script>
    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

    $(document).ready(function() {
        $(document).on('submit', '#join_us_form', function(event) {
            event.preventDefault();
            var full_name = $('#full_name').val();
            var email_id = $('#email').val();
            var mobile_number = $('#mobile_number').val();


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
                url: "<?php echo base_url() ?>savejoinus",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data) {

                        toastr["success"]("Thank you Join Admin Contact You Later");
                        window.location.href = "<?php echo base_url(); ?>";

                    } else {
                        toastr["error"]("Some Thing Went Wrong");
                        return false;
                    }
                }
            });

        });

      

        $('#news_letter_submit').click(function(e) {
            if ($('#email').val() == '')

            {
                toastr["error"]("Email Address is required!");

                e.preventDefault();

            }
        });
    });

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "10000",
        "extendedTimeOut": "5000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    <?php if ($this->session->flashdata('success')) { ?>
            <
            script >
            toastr.success("<?php echo $this->session->flashdata('success'); ?>", "", {
                "closeButton": "true",
                "progressBar": "true",
                "positionClass": "toast-top-right",
                "timeOut": "5000",
                "extendedTimeOut": "1000"
            });
</script>
<?php }
    if ($this->session->flashdata('error')) { ?>
    <script type="text/javascript">
        toastr.error("<?php echo $this->session->flashdata('error'); ?>", "", {
            "closeButton": "true",
            "progressBar": "true",
            "positionClass": "toast-top-right"
        });
    </script>
<?php } ?>


// Enquiry Form Validation

</script>