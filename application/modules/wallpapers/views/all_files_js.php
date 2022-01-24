<script>
    function previewFile(input) {
        form__img.src = URL.createObjectURL(event.target.files[0]);
        // $('.label_name').hide();
    }
    $(document).ready(function() {
        var movie_table = $('#wallpaper_table').DataTable({});
        $(document).on('submit', '#add_wallpaper_form', function(event) {
            event.preventDefault();
            var wallpaper_img = $('.wallpaper_img').val();
            var movie_title = $('#movie_title').val();
          

             if (wallpaper_img == '') {
                toastr["error"]("Please Upload Wallpaper Image");
                return false;
            }
             if (movie_title == '') {
                toastr["error"]("Please Select Movie Title");
                return false;
            }
        
            $.ajax({
                url: "<?php echo base_url() ?>wallpapers/saveWallpaper",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        console.log(data);
                        toastr["success"]("Wallpaper Details Added Successfully!");
                        window.location.href = "<?php echo base_url(); ?>wallpapers";

                    } else {
                        toastr["error"]("Wallpaper Details added failed! Please try again.");
                        return false;
                    }
                }
            });
        });
        $(document).on('click', '#modaldelete', function(event) {
            event.preventDefault();
            var id = $(".delete").attr('id');

            $.ajax({
                url: "<?php echo base_url() ?>wallpapers/delete_wallpaper_details",
                method: "POST",
                data: {
                    wallpaper_id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("Wallpaper Details  Deleted Successfully!");
                        window.location.href = "<?php echo base_url(); ?>wallpapers";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });
  });
</script>