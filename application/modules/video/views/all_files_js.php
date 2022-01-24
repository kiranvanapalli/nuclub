<script>
   function previewFile(input){  
       $("#form__img").show();
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
   
   var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
       csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
   
   
    var video_table = $('#video_table').DataTable({});

    $(document).on('submit', '#video_form', function(event) {
        event.preventDefault();
        var movie_id =  $('#movie_id').val();
        var title = $('#video_title').val();
        var released_date = $('#date').val();
        var youtube_link = $('#youtube_link').val();
        var image = $('#video_image').val();
        if (movie_id == '') {
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
            url: "<?php echo base_url() ?>save_video",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                if (data) {
                    console.log(data);
                    toastr["success"]("Video Details Added Successfully!");
                    window.location.href = "<?php echo base_url(); ?>videos";

                } else {
                    toastr["error"]("Video Details added failed! Please try again.");
                    return false;
                }
            }
        });

    });

     $(document).on('click', '#modaldelete', function(event) {
            event.preventDefault();
            var id = $(".delete").attr('id');
            $.ajax({
                url: "<?php echo base_url() . 'delete_video' ?>",
                method: "POST",
                data: {
                    video_id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("Video Details  Deleted Successfully!");
                        window.location.href = "<?php echo base_url(); ?>videos";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });

   });
</script>