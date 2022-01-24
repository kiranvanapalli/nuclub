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
    $(document).on('submit', '#video_edit_form', function(event) {
        event.preventDefault();
        
    
        var title = $('#video_title').val();
        var released_date = $('#date').val();
        var youtube_link = $('#youtube_link').val();
        var image = $('#video_image').val();

        if($('#movie_id').val() == '')
        {
            toastr["error"]("Please Select Movie Name");
            return false;
        }
        if (title == '') {
            toastr["error"]("Video Title Name is required!");
            return false;
        }

        if(released_date == '')
        {
             toastr["error"]("Video Released Date is required!");
             return false;

        }
        if(youtube_link == '')
        {
             toastr["error"]("Video Youtube Link is required!");
             return false;

        }
        if(image == '')
        {
             toastr["error"]("Image is required!");
             return false;

        }
        if ($('#status').val() == '') {
            toastr["error"]("Please Select Status");
            return false;
        }
        $.ajax({  
             url:"<?php echo base_url() ?>update_video_details",  
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
                    
                    toastr["success"]("Video Details Updated Successfully!");
                    window.location.href = "<?php echo base_url(); ?>videos";
                }
                else
                {
                      toastr["error"]("Video Details updated failed! Please try again.");
                      return false;
                }     
                  
             }  
        });
    });
   });

</script>