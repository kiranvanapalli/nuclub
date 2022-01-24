<script>
$(document).ready(function(){
         $(document).on('submit', '#edit_user_form', function(event){
          event.preventDefault();
                var first_name = $('#first_name').val();
                var last_name = $('#last_name').val();
                var email = $('#email_id').val();
                var mobile_number = $('#mobile_number').val();
                var password = $('#password').val();
                var pancard = $('#pan_no').val();
                if (first_name == '') {
                    toastr["error"]("First Name is required!");
                    return false;
                }
                if (last_name == '') {
                    toastr["error"]("Last Name is required!");
                    return false;
                }
                if (email == '') {
                    toastr["error"]("Email Id is required");
                    return false;
                }
                if (mobile_number == '') {
                    toastr["error"]("Mobile Number is required!");
                    return false;
                }
                if (password == '') {
                    toastr["error"]("Password Felid is required!");
                    return false;
                }
               var PAN_Card_No = pancard.toUpperCase();
               var regex = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
               if (PAN_Card_No.length == 10) 
               {
                 if (PAN_Card_No.match(regex)) 
                    {
                 
                    }
               else
               {
                    toastr["error"]("Invalid Pan Number");
                    return false;
               }
            }
            else
            {
                    toastr["error"]("Enter Valid Pan Number");
                    return false;
            }


          $.ajax({  
               url:"<?php echo base_url() ?>update_user_admin",  
               method:'POST',  
               data:new FormData(this),
               contentType:false,  
               processData:false, 
               dataType:'JSON',
               success:function(data)  
               {  
                  if(data.status == 'success')
                  { 
                      
                      toastr["success"]("User Details Updated Successfully!");
                      window.location.href = "<?php echo base_url();?>user_details";
                  }
                  else
                  {    
                         toastr["error"]("User Details updated failed! Please try again.");
                         return false;
                        
                  }

                    
               }       
          });   
      });

  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

        

           




    });




</script>