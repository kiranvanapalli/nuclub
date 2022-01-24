<script>
    function previewFile(input) {
        $("#form__img_cover").show();
        // $(".old_img_gallery").hide();
        var file = $("input[type=file]").get(0).files[0];
        console.log(file);
        alert("Hello");
        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#form__img_cover").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    function previewBackground(input) {
        $("#form__img_background").show();
        $(".old_img_gallery").hide();
        var file = $("input[type=file]").get(0).files[0];
        console.log(file);
        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#form__img_background").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    function previewcover(input)
    {
        form__img_cover.src = URL.createObjectURL(event.target.files[0]);
    }
    function previewcover1(input) {
        cover1.src = URL.createObjectURL(event.target.files[0]);
    }
     function previewcover2(input) {
        cover2.src = URL.createObjectURL(event.target.files[0]);
    }
     function previewcover3(input) {
        cover3.src = URL.createObjectURL(event.target.files[0]);
    }
     function previewcover4(input) {
        cover4.src = URL.createObjectURL(event.target.files[0]);
    }
    function previewBanner(input) {
        form__img_banner.src = URL.createObjectURL(event.target.files[0]);
    }
    function previewBackground(input) {
        form__img_background.src = URL.createObjectURL(event.target.files[0]);
    }

    function previewCast(input) {
        $("#form__img_cover").show();
        var file = $("input[type=file]").get(0).files[0];
        console.log(file);
        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#form__img_cast").attr("src", reader.result);
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
        var movie_table = $('#movies_table').DataTable({});
        var cast_table = $('#cast_crew_table').DataTable({});

        $(document).on('submit', '#movies_form', function(event) {
            event.preventDefault();
            var movie_status = $('#movie_status').val();
            var movie_cover = $('#movie_cover').val();
            var movie_banner = $('#form__img-upload_banner').val();
            var movie_title = $('#movie_title').val();
            var movie_released_date = $('#date').val();
            var link = $('#movie_link').val();
            var synopsis = $('#synopsis').val();
            var upload_cover1 = $('#upload_cover1').val();
            var background_img = $('#movie_background_image').val();
            if(movie_status == '')
            {
                toastr["error"]("Please Select Movie Release Status");
                return false;
            }

            if(background_img == '')
            {
                toastr["error"]("Please Select Background Image");
                return false;
            }

             if (movie_cover == '') {
                toastr["error"]("Please Upload Movie Cover Image");
                return false;
            }
             if (movie_banner == '') {
                toastr["error"]("Please Upload Movie Banner Image");
                return false;
            }
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
            if (synopsis == '') {
                toastr["error"]("Movie Synopsis is required!");
                return false;
            }
            if (upload_cover1 == '') {
                toastr["error"]("Movie Cover Image1 is required!");
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
            console.log(id);
            $.ajax({
                url: "<?php echo base_url() ?>movies/delete_movie_deteials",
                method: "POST",
                data: {
                    movie_id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("Movie Details Deleted Successfully!");
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