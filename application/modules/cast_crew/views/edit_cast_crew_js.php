<script>
    function previewFile(input) {
            $("#form__img").hide();
            $("#updated_image").show();
            $(".old_art_img").hide();
        updated_image.src = URL.createObjectURL(event.target.files[0]);
    }
     $(document).ready(function() {

        $(document).on('submit', '#edit_cast_crew_form', function(event) {
            event.preventDefault();
           var cast_crew_image = $('#cast_crew_image').val();
            var movie_title = $('#form__img-movie_title').val();
            var name = $('#name').val();
            var role = $('#role').val();
            var link = $('#link').val();
            var is_fav = $('#is_fav').val();
            var status = $('#status').val();

             if (cast_crew_image == '') {
                toastr["error"]("Please Upload Cast Crew` Image");
                return false;
            }
             if (movie_title == '') {
                toastr["error"]("Please Select Movie Title");
                return false;
            }
            if (name == '') {
                toastr["error"]("Name is required!");
                return false;
            }
            if (role == '') {
                toastr["error"]("Movie Role is required!");
                return false;
            }
            if (link == '') {
                toastr["error"]("Link is required!");
                return false;
            }
            if (is_fav == '') {
                toastr["error"]("Please Select Favorite Option");
                return false;
            }
            if (status == '') {
                 toastr["error"]("Please Select Status Option");
                return false;
            }
             $.ajax({  
             url:"<?php echo base_url() ?>cast_crew/update_cast_crew_details",  
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
                    
                    toastr["success"]("Cast & Crew Details Updated Successfully!");
                    window.location.href = "<?php echo base_url(); ?>cast_crew";
                }
                else
                {
                      toastr["error"]("Cast & Crew Details updated failed! Please try again.");
                      return false;
                }     
                  
             }  
        });
    });

});
</script>