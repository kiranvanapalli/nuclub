<script>
    $(document).on('submit', '#user_login', function(e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        var checked = false;

        if (email == '') {
            toastr["error"]("Please Enter Email Id is required!");
            checked = true;
            return false;
        }
        if (password == '') {
            toastr["error"]("Please Enter Password");
            checked = true;
            return false;
        }
        if(checked == false) {
        $.ajax({
                url: "<?php echo base_url() ?>CheckUser",
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
</script>