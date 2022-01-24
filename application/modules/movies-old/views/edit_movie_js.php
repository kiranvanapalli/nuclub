<script>

     function previewFile(input)
    {  
        $("#updated_image").show();
        $(".old_img_gallery").hide();
        $("#cover_label").hide();
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
        $("#date").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true //to close picker once year is selected
        });
        $(document).on('submit', '#edit_movie_from', function(event) {
            event.preventDefault();
            var movie_title = $('#movie_title').val();
            var movie_released_date = $('#date').val();
            var link = $('#movie_link').val();
            var movie_image = $('#movie_image').val();

            if (movie_title == '') {
                toastr["error"]("Movie Title Name is required!");
                return false;
            }
            if (movie_released_date == '') {
                toastr["error"]("Movie Released Date is required!");
                return false;
            }
            if (link == '') {
                toastr["error"]("Movie Link is required!");
                return false;
            }
            if (movie_image == '') {
                toastr["error"]("Movie Banner Image is required!");
                return false;
            }
             $.ajax({  
             url:"<?php echo base_url() ?>movies/update_movie_details",  
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
                    
                    toastr["success"]("Movie Details Updated Successfully!");
                    window.location.href = "<?php echo base_url(); ?>movies";
                }
                else
                {
                      toastr["error"]("Movie Details updated failed! Please try again.");
                      return false;
                }     
                  
             }  
        });
        });
    });
</script>