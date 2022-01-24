<script>
      function previewFile(input){  
        $("#form__img").show();
        $(".old_img_gallery").hide();
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#form__img").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
$(document).ready(function() {
    var news_list = $('#news_list').DataTable({

        
    });


    $(document).on('submit', '#news_form', function(event) {
        event.preventDefault();
        var movie_id = $('#movie_id').val();
        var title = $('#title').val();
        var description = $('#description').val();
        var image = $('#news_image').val();
        if(movie_id == '')
        {
            toastr["error"]("Please Select Movie");
            return false;
        }
        if (title == '') {
            toastr["error"]("News Title Name is required!");
            return false;
        }

        if(description == '')
        {
             toastr["error"]("News Description is required!");
             return false;

        }


        // if(image == '')
        // {
        //     toastr["error"]("News Image Is Required");
        //     return false;
        // }

        //  if($('#news_image').val() != '')
        // {
        //    var extension_profile = $('#news_image').val().split('.').pop().toLowerCase();  
        //    if(jQuery.inArray(extension_profile, ['gif','png','jpg','jpeg']) == -1)  
        //    {  
        //       toastr["error"]('Banner image not allowed! Please choose a gif, png, jpg, jpeg format files only.');
        //       return false;
        //    }  
        // }

        $.ajax({
            url: "<?php echo base_url() ?>news/add_news_details",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                if (data) {
                    console.log(data);
                    toastr["success"]("News Details Added Successfully!");
                    window.location.href = "<?php echo base_url(); ?>news";

                } else {
                    toastr["error"]("News Details added failed! Please try again.");
                    return false;
                }
            }
        });

    });


        $(document).on('click', '#modaldelete', function(event) {
            event.preventDefault();
            var id = $(".delete").attr('id');
            $.ajax({
                url: "<?php echo base_url() . 'delete_resent_news' ?>",
                method: "POST",
                data: {
                    news_id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("News Details  Deleted Successfully!");
                        window.location.href = "<?php echo base_url(); ?>news";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });
});
</script>