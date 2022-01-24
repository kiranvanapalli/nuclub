<script>

     function previewFile(input)
    {  
        $("#updated_image").show();
        $(".old_img_gallery").hide();
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#updated_image").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }

$(document).ready(function() {
    var news_list = $('#news_list').DataTable({

        
    });
    $(document).on('submit', '#edit_news_form', function(event) {
        event.preventDefault();
        
        if ($('#movie_id').val() == '') {
            toastr["error"]("Please Select Movie Name");
            return false;
        }
       if ($('#title').val() == '') {
            toastr["error"]("Please Enter News Title");
            return false;
        }
        if ($('#description').val() == '') {
            toastr["error"]("Please Enter News Description");
            return false;
        }
         if ($('#date').val() == '') {
            toastr["error"]("Please Enter News Date");
            return false;
        }
        // if ($('#form__img-upload').val() == '') {
        //     toastr["error"]("Please Select News Image");
        //     return false;
        // }
         if ($('#status').val() == '') {
            toastr["error"]("Please Select Status");
            return false;
        }
        $.ajax({  
             url:"<?php echo base_url() ?>update_news",  
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
                    
                    toastr["success"]("News Details Updated Successfully!");
                    window.location.href = "<?php echo base_url(); ?>news";
                }
                else
                {
                      toastr["error"]("News Details updated failed! Please try again.");
                      return false;
                }     
                  
             }  
        });
    });
   
});
</script>