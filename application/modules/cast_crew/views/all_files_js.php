<script>
    function previewFile(input) {
        form__img.src = URL.createObjectURL(event.target.files[0]);
        // $('.label_name').hide();
    }
    $(document).ready(function() {
        var movie_table = $('#cast_crew_table').DataTable({});
        $(document).on('submit', '#cast_crew_form', function(event) {
            event.preventDefault();
            var cast_crew_image = $('#cast_crew_image').val();
            var movie_title = $('#form__img-movie_title').val();
            var name = $('#name').val();
            var role = $('#role').val();
            var link = $('#link').val();
            var is_fav = $('#is_fav').val();

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
            $.ajax({
                url: "<?php echo base_url() ?>cast_crew/savecastcrew",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        console.log(data);
                        toastr["success"]("Cast & Crew Details Added Successfully!");
                        window.location.href = "<?php echo base_url(); ?>cast_crew";

                    } else {
                        toastr["error"]("Cast & Crew Details added failed! Please try again.");
                        return false;
                    }
                }
            });
        });
        $(document).on('click', '#modaldelete', function(event) {
            event.preventDefault();
            var id = $(".delete").attr('id');

            $.ajax({
                url: "<?php echo base_url() ?>cast_crew/delete_cast_crew_details",
                method: "POST",
                data: {
                    cast_crew_id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("Cast & Crew Details  Deleted Successfully!");
                        window.location.href = "<?php echo base_url(); ?>cast_crew";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });
  });
</script>