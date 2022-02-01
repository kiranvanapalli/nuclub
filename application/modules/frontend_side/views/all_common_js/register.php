<script>
     $(document).ready(function() {
     $("#date").datepicker({
            format: 'mm/dd/yyyy',
            endDate: '-3d',
            autoclose: true //to close picker once year is selected
        });
    $(document).on('submit', '#reg_from', function(e) {
        e.preventDefault();
        var fullname = $('#fullname').val();
        var mobilenumber = $('#mobilenumber').val();
        var email = $('#email').val();
        var date = $('#date').val();
        var gender = $('#gender').val();
        var state = $('#state').val();
        var city = $('#city').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();


        var checked = false;

        if (fullname == '') {
                toastr["error"]("Full Name is required!");
                return false;
                checked = true;
            }
           
            if (mobilenumber == '') {
                toastr["error"]("Please Enter Mobile Number!");
                return false;
                checked = true;
            }
            if (email == '') {
                toastr["error"]("Email Id is required!");
                return false;
                checked = true;
            }
            if (gender == '') {
                toastr["error"]("Please Select Gender");
                return false;
                checked = true;
            }
            if (date == '') {
                toastr["error"]("Please Select Date Of Birth");
                return false;
                checked = true;
            }
            if (state == '') {
                toastr["error"]("Please Select State");
                return false;
                checked = true;
            }
            if (city == '') {
                toastr["error"]("Please Enter City Name");
                return false;
                checked = true;
            }
            if (password == '') {
                toastr["error"]("Please Enter Password");
                return false;
                checked = true;
            }
            if (confirm_password == '') {
                toastr["error"]("Please Enter Confirm password");
                return false;
                checked = true;
            }
            
            if(password.length < 6)
            {
                toastr["error"]("Password Should Be At Least 6 Letters");
                return false;
                checked = true;

            }
            if(confirm_password.length < 6)
            {
                toastr["error"]("Confirm Password Should Be At Least 6 Letters");
                return false;
                checked = true;
            }
            if(password != confirm_password)
            {
                toastr["error"]("Please Password & Confirm Password Not Match");
                return false;
                checked = true;

            }
        if(checked == false) {
        $.ajax({
                url: "<?php echo base_url() ?>saveUser",
        		data:$(this).serialize(),
        		type:"POST",
        		dataType:"JSON",
        		success: function(res) {
        			console.log(res);
        			if(res.status == "failure") {
        			     toastr["error"](res.message);
        			} 
                    else {
        			      var url = "<?php echo base_url(); ?>"+res.redirect_url;
                        window.setTimeout(function() {
                            window.location.href = url;
                        });
        			}
        		}
        	});
        }
    });
});
</script>