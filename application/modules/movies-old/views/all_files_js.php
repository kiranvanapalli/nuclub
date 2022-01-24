<script>
    function previewFile(input) {
        $("#form__img").show();
        $(".old_img_gallery").hide();
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#form__img").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    $(document).ready(function() {
        var d = new Date();
        var year = d.getFullYear();
        $("#date").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true //to close picker once year is selected
        });
        var movie_table = $('#movie_table').DataTable({autoWidth: true});

        $(document).on('submit', '#movie_form', function(event) {
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
                url: "<?php echo base_url() ?>movies/savemoviedetails",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        console.log(data);
                        toastr["success"]("Movies Details Added Successfully!");
                        window.location.href = "<?php echo base_url(); ?>movies";

                    } else {
                        toastr["error"]("Movie Details added failed! Please try again.");
                        return false;
                    }
                }
            });
        });
        $(document).on('click', '#modaldelete', function(event) {
            event.preventDefault();
            var id = $(".delete").attr('id');

            $.ajax({
                url: "<?php echo base_url() ?>movies/delete_movie_deteials",
                method: "POST",
                data: {
                    movie_id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("Movie Details  Deleted Successfully!");
                        window.location.href = "<?php echo base_url(); ?>movies";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });

    });
</script>