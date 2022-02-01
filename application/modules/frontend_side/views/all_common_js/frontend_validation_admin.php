<script>
   function onlyNumberKey(evt) {

// Only ASCII character in that range allowed
var ASCIICode = (evt.which) ? evt.which : evt.keyCode
if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
    return false;
return true;
}
$(document).ready(function() { 
intRegex = /[0-9 -()+]+$/;
intRegex_spc = /^[A-Za-z0-9]+$/;
$('#admin_login').click(function(e) 
{  
    var adv_email = $('#admin_email').val();
    if($('#admin_email').val() == '')
    {
      toastr["error"]("Email field is required!");
      e.preventDefault();
    }

    if($('#admin_email').val() != '')
    {
        if (!validateEmail(adv_email)) 
        {
          toastr["error"]("Invalid email address!");
          e.preventDefault();
        }
    }

    if($('#admin_pass').val() == '')
    {
      toastr["error"]("Password field is required!");
      e.preventDefault();
    }   
});

$('#password_update').click(function(e) 
{  
    if($('#new_pass').val() != $('#confirm_pass').val())
    {
           toastr["error"]("Confirm password is not match!");
           e.preventDefault(); 
    }  
});




  $('#phone_update').click(function(e) 
  { 
      if($('#phone_one').val() != '')
      {
        if($('#phone_one').val().length != 10 )
        {
          toastr["error"]("Phone number must be 10 numbers!");
          e.preventDefault(); 
        }
      }

      if($('#phone_two').val() != '')
      {
        if($('#phone_two').val().length != 10 )
        {
          toastr["error"]("Phone number must be 10 numbers!");
          e.preventDefault(); 
        }
      }
  }); 


   $(document).on('submit', '#article_form', function(event){
       event.preventDefault();  
       var article_name = $('#article_name').val();
       var category_name = $('#category_name').val(); 
       var message = $('#textarea1').val();  

       if(article_name == '') {
        toastr["error"]("Article Name is required!");
        return false;
       }

       if(category_name == '') {
        toastr["error"]("Category Name is required!");
        return false;
       }

       if(message == '') {
        toastr["error"]("Message is required!");
        return false;
       }

       if($('input[type=radio][name=is_intersted]:checked').length == 0) {
        toastr["error"]("Please select atleast one favourite radio button!");
        return false;
       }

      if($('#article_image').val() == '') {
        toastr["error"]("Article Image field is required!");
        return false;
      }       

       if($('#article_image').val() != '')
        {
           var extension_profile = $('#article_image').val().split('.').pop().toLowerCase();  
           if(jQuery.inArray(extension_profile, ['gif','png','jpg','jpeg']) == -1)  
           {  
              toastr["error"]('Article image not allowed! Please choose a gif, png, jpg, jpeg format files only.');
              return false;
           }  
        }
        
        $.ajax({  
             url:"<?php echo base_url() ?>add_article",  
             method:'POST',  
             data:new FormData(this),
             contentType:false,  
             processData:false, 
             success:function(data)  
             {  
                if(data)
                {
                    $('#article_form')[0].reset();  
                    toastr["success"]("Article Added Successfully!"); 
                }
                else
                {
                      toastr["error"]("Article added failed! Please try again.");
                      return false;
                }     
                  
             }  
        });   
  });

  $(document).on('submit', '#edit_article_form', function(event){
       event.preventDefault();
       // alert("Hello");return false;  
       var article_name = $('#article_name').val();
       var category_name = $('#category_name').val(); 
       var message = $('#textarea1').val();  
       var status = $('#status').val();  

       if(article_name == '') {
        toastr["error"]("Article Name is required!");
        return false;
       }

       if(category_name == '') {
        toastr["error"]("Category Name is required!");
        return false;
       }

       if(message == '') {
        toastr["error"]("Message is required!");
        return false;
       }

       if($('input[type=radio][name=is_intersted]:checked').length == 0) {
        toastr["error"]("Please select atleast one favourite radio button!");
        return false;
       }

       if($('#article_image').val() != '')
        {
           var extension_profile = $('#article_image').val().split('.').pop().toLowerCase();  
           if(jQuery.inArray(extension_profile, ['gif','png','jpg','jpeg']) == -1)  
           {  
              toastr["error"]('Article image not allowed! Please choose a gif, png, jpg, jpeg format files only.');
              return false;
           }  
        }
        
        $.ajax({  
             url:"<?php echo base_url() ?>update_article",  
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
                    $('#edit_article_form')[0].reset();  
                    toastr["success"]("Article Updated Successfully!");
                }
                else
                {
                      toastr["error"]("Article updated failed! Please try again.");
                      return false;
                }     
                  
             }  
        });   
  });


  $('#add_apartment').click(function(e) 
  {  
      
        if($('#apartment').val() == '')
        {
          toastr["error"]("Apartment name is required!");
          e.preventDefault();
        }

        if($('#area').val() == '')
        {
          toastr["error"]("Apartment area is required!");
          e.preventDefault();
        }

        if($('#apartment_img_old').val() == '')
        {
            if($('#apart_img').val() == '')
            {
              toastr["error"]("Apartment image is required!");
              e.preventDefault();
            }
        }  

        if($('#pincode').val() == '')
        {
          toastr["error"]("Pincode is required!");
          e.preventDefault();
        }

        
        if($('#address').val() == '')
        {
          toastr["error"]("Address is required!");
          e.preventDefault();
        }

        if($('#apart_img').val() != '')
        {
           var extension_profile = $('#apart_img').val().split('.').pop().toLowerCase();  
           if(jQuery.inArray(extension_profile, ['gif','png','jpg','jpeg']) == -1)  
           {  
              toastr["error"]('Apartment image not allowed! Please choose a gif, png, jpg, jpeg format files only.');
              e.preventDefault(); 
           }  
        } 
  });  


function validateEmail(email) {
  var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
  if (filter.test(email)) 
  {
    return true;
  }
  else 
  {
    return false;
  }
}

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
});

</script>