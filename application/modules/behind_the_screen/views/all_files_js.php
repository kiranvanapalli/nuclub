<script>
    function previewFile(input) {
        form__img.src = URL.createObjectURL(event.target.files[0]);
        // $('.label_name').hide();
    }
    $(document).ready(function() {
        var movie_table = $('#behind_screen_table').DataTable({});
        $(document).on('submit', '#add_behind_screen_form', function(event) {
            event.preventDefault();
            var behind_screen_img = $('.behind_screen_img').val();
            var movie_title = $('#movie_title').val();
          

             if (behind_screen_img == '') {
                toastr["error"]("Please Upload Behind Screen Image");
                return false;
            }
             if (movie_title == '') {
                toastr["error"]("Please Select Movie Title");
                return false;
            }
        
            $.ajax({
                url: "<?php echo base_url() ?>behind_the_screen/saveBehindScreen",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        console.log(data);
                        toastr["success"]("Behind Screen Details Added Successfully!");
                        window.location.href = "<?php echo base_url(); ?>behind_screen";

                    } else {
                        toastr["error"]("Behind Screen Details added failed! Please try again.");
                        return false;
                    }
                }
            });
        });
        $(document).on('click', '#modaldelete', function(event) {
            event.preventDefault();
            var id = $(".delete").attr('id');

            $.ajax({
                url: "<?php echo base_url() ?>behind_the_screen/delete_behind_screen_details",
                method: "POST",
                data: {
                    behind_screen_id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("Behind Screen Details  Deleted Successfully!");
                        window.location.href = "<?php echo base_url(); ?>behind_screen";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });
  });
</script>