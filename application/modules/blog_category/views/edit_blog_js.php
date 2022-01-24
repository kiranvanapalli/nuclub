<script>
$(document).ready(function() {

    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    $(document).on('submit', '#edit_blog_form', function(event) {
        event.preventDefault();

    
       if ($('#blog_category').val() == '') {
            toastr["error"]("Please Select Blog Category");
            return false;
        }
        if ($('#blog_title').val() == '') {
            toastr["error"]("Please Enter Blog Title");
            return false;
        }
        if ($('#blog_image').val() == '') {
            toastr["error"]("Please Select Blog Image");
            return false;
        }
        if ($('#blog_message').val() == '') {
            toastr["error"]("Please Enter Blog Message");
            return false;
        }
        
        

        $.ajax({  
             url:"<?php echo base_url() ?>update_blog",  
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
                    
                    toastr["success"]("Blog Updated Successfully!");
                    window.location.href = "<?php echo base_url(); ?>blog_list";
                }
                else
                {
                      toastr["error"]("Blog updated failed! Please try again.");
                      return false;
                }     
                  
             }  
        });;
    });
   
});
</script>