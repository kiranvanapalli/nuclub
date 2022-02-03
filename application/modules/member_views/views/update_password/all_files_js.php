<script>
    function onlyNumberKey(evt) {

          // Only ASCII character in that range allowed
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
              return false;
          return true;
      }
    $(document).ready(function() {
        var asset_table = $('.membertable').DataTable({});
        var d = new Date();
        var year = d.getFullYear();
        $("#date").datepicker({
            format: 'mm/dd/yyyy',
            endDate: '-3d',
            autoclose: true //to close picker once year is selected
        });
        $(document).on('submit', '#update_password', function(event) {
            event.preventDefault();
           
            var password = $('#password').val();
            var conf_password = $('#confirm_password').val();
       

           
            if (password == '') {
                toastr["error"]("Please Enter Password");
                return false;
            }
            if (conf_password == '') {
                toastr["error"]("Please Enter Confirm password");
                return false;
            }
            
            if(password.length < 6)
            {
                toastr["error"]("Password Should Be At Least 6 Letters");
                return false;

            }
            if(conf_password.length < 6)
            {
                toastr["error"]("Confirm Password Should Be At Least 6 Letters");
                return false;
            }
            if(password != conf_password)
            {
                toastr["error"]("Please Password & Confirm Password Not Match");
                return false;

            }
           
            $.ajax({
                url: "<?php echo base_url() ?>member_views/Member/updatePassword",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data) {

                        toastr["success"]("Password Updated Successfully!");
                         window.location.href = "<?php echo base_url(); ?>member_dashboard";

                    }
                    else
                    {
                        toastr["error"]("Password Updated Fail");
                        return false;
                    }
                }
            });

        });
    });
</script>