<script>
    function previewFile(input) {
        form__img.src = URL.createObjectURL(event.target.files[0]);
        // $('.label_name').hide();
    }
    $(document).ready(function() {
        var movie_table = $('#gallery_table').DataTable({});
        $(document).on('submit', '#add_gallery_form', function(event) {
            event.preventDefault();
            var gallery_img = $('.gallery_img').val();
            var movie_title = $('#movie_title').val();
          

             if (gallery_img == '') {
                toastr["error"]("Please Upload Gallery Image");
                return false;
            }
             if (movie_title == '') {
                toastr["error"]("Please Select Movie Title");
                return false;
            }
        
            $.ajax({
                url: "<?php echo base_url() ?>gallery/savegallery",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        console.log(data);
                        toastr["success"]("Gallery Details Added Successfully!");
                        window.location.href = "<?php echo base_url(); ?>gallery";

                    } else {
                        toastr["error"]("Gallery Details added failed! Please try again.");
                        return false;
                    }
                }
            });
        });
        $(document).on('click', '#modaldelete', function(event) {
            event.preventDefault();
            var id = $(".delete").attr('id');

            $.ajax({
                url: "<?php echo base_url() ?>gallery/delete_gallery_details",
                method: "POST",
                data: {
                    gallery_id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("Gallery Details  Deleted Successfully!");
                        window.location.href = "<?php echo base_url(); ?>gallery";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });
  });
</script>