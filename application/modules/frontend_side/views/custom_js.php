<script>
    $(document).ready(function() {
        $('#news_letter').click(function(e)

            {
                if ($('#email').val() == '')

                {

                    toastr["error"]("Email Address is required!");

                    e.preventDefault();

                }
            });
    });

    // Enquiry Form Validation


    $('#enquiry_form').click(function(e)
            {
                if ($('#name').val() == '')
                {
                    toastr["error"]("Name Field is required!");
                    e.preventDefault();
                }
                if ($('#email').val() == '')
                {
                    toastr["error"]("Email Field is required!");
                    e.preventDefault();
                }
            });
</script>