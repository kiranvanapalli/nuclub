<script>
    $(document).ready(function() {
        var asset_table = $('.membertable').DataTable({});
        var d = new Date();
        var year = d.getFullYear();
        $("#date").datepicker({
            format: 'mm/dd/yyyy',
            endDate: '-3d',
            autoclose: true //to close picker once year is selected
        });
        
        $(document).on('submit', '#add_member', function(event) {
            event.preventDefault();
            var full_name = $('#full_name').val();
            var email_id = $('#email_id').val();
            var mobile_number = $('#mobile_number').val();
            var gender = $('#gender').val();
            var date = $('#date').val();
            var state = $('#state').val();
            var city = $('#city').val();
            var pay_via = $('#pay_via').val();
            var password = $('#password').val();
            var conf_password = $('#conf_password').val();
            var nu_points = $('#nu_points').val();

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
            if (gender == '') {
                toastr["error"]("Please Select Gender");
                return false;
            }
            if (date == '') {
                toastr["error"]("Please Select Date Of Birth");
                return false;
            }
            if (state == '') {
                toastr["error"]("Please Select State");
                return false;
            }
            if (city == '') {
                toastr["error"]("Please Enter City Name");
                return false;
            }
            if (pay_via == '') {
                toastr["error"]("Please Select Pay Via");
                return false;
            }
            if (password == '') {
                toastr["error"]("Please Enter Password");
                return false;
            }
            if (conf_password == '') {
                toastr["error"]("Please Enter Confirm password");
                return false;
            }
            if(password != conf_password)
            {
                toastr["error"]("Please Password & Confirm Password Not Match");
                return false;

            }
            if (nu_points == '') {
                toastr["error"]("Please Enter Points");
                return false;
            }
            // var datastring = $("#asset_form").serialize();
            $.ajax({
                url: "<?php echo base_url() ?>save_member",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    if (status="success") {
                        toastr["success"]("Member Details Added Successfully!");
                        window.location.href = "<?php echo base_url(); ?>members";

                    } else if(status="error") {
                        toastr["error"]("Member Details added failed! Please try again.");
                        return false;
                    }


                }
            });

        });


        $(document).on('submit', '#update_member', function(event) {
            event.preventDefault();
            var full_name = $('#full_name').val();
            var email_id = $('#email_id').val();
            var mobile_number = $('#mobile_number').val();
            var gender = $('#gender').val();
            var date = $('#date').val();
            var state = $('#state').val();
            var city = $('#city').val();
            var pay_via = $('#pay_via').val();
            var password = $('#password').val();
            var conf_password = $('#conf_password').val();
            var nu_points = $('#nu_points').val();

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
            if (gender == '') {
                toastr["error"]("Please Select Gender");
                return false;
            }
            if (date == '') {
                toastr["error"]("Please Select Date Of Birth");
                return false;
            }
            if (state == '') {
                toastr["error"]("Please Select State");
                return false;
            }
            if (city == '') {
                toastr["error"]("Please Enter City Name");
                return false;
            }
            if (pay_via == '') {
                toastr["error"]("Please Select Pay Via");
                return false;
            }
            if (password == '') {
                toastr["error"]("Please Enter Password");
                return false;
            }
            if (conf_password == '') {
                toastr["error"]("Please Enter Confirm password");
                return false;
            }
            if(password != conf_password)
            {
                toastr["error"]("Please Password & Confirm Password Not Match");
                return false;

            }
            if (nu_points == '') {
                toastr["error"]("Please Enter Points");
                return false;
            }
            if($('#status').val() == '')
            {
                toastr["error"]("Please Select Status");
                return false;
            }
             $.ajax({  
             url:"<?php echo base_url() ?>update_member",  
             method:'POST',  
             data:new FormData(this),
             contentType:false,  
             processData:false, 
             dataType:'JSON',
             success:function(data)  
             {  
              console.log(data);
                if(data.status == 'success')
                {
                    
                    toastr["success"]("Member Details Updated Successfully!");
                    window.location.href = "<?php echo base_url(); ?>members";
                }
                else
                {
                      toastr["error"]("Member Details updated failed! Please try again.");
                      return false;
                }     
                  
             }  
        });
    });

    $(document).on('click', '#modaldelete', function(event) {
            event.preventDefault();
            var id = $(".delete").attr('id');

            console.log(id);

            $.ajax({
                url: "<?php echo base_url() ?>delete_member",
                method: "POST",
                data: {
                    member_id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("Cast & Crew Details  Deleted Successfully!");
                        window.location.href = "<?php echo base_url(); ?>members";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });
        $(document).on('click', '#close', function(event) {
            event.preventDefault();
            window.location.href = "<?php echo base_url(); ?>members";
        });
    });
</script>