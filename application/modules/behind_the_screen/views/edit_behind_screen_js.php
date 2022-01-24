<script>
    function previewFile(input) {
            $("#form__img").hide();
            $("#updated_image").show();
            $(".old_art_img").hide();
        updated_image.src = URL.createObjectURL(event.target.files[0]);
    }
     $(document).ready(function() {

        $(document).on('submit', '#edit_behind_screen_form', function(event) {
            event.preventDefault();
           var behind_screen_img = $('#behind_screen_img').val();
            var movie_title = $('#movie_title').val();
            var status = $('#status').val();

             if (behind_screen_img == '') {
                toastr["error"]("Please Upload Behind Screen Image");
                return false;
            }
             if (movie_title == '') {
                toastr["error"]("Please Select Movie Title");
                return false;
            }
            
            if (status == '') {
                 toastr["error"]("Please Select Status Option");
                return false;
            }
             $.ajax({  
             url:"<?php echo base_url() ?>behind_the_screen/update_behind_screen_details",  
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
                    
                    toastr["success"]("Behind Screen Details Updated Successfully!");
                    window.location.href = "<?php echo base_url(); ?>behind_screen";
                }
                else
                {
                      toastr["error"]("Behind Screen Details updated failed! Please try again.");
                      return false;
                }     
                  
             }  
        });
    });

});
</script>