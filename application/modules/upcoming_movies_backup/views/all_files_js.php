<script>
    function previewFile(input) {
        $("#form__img_cover").show();
        $(".old_img_gallery").hide();
        var file = $("input[type=file]").get(0).files[0];
        console.log(file);
        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#form__img_cover").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
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
    // function previewCast(input,id)
    // {
    //     var img_id = id;
    //     console.log(img_id);
    //     var data = "form__img_cast" + img_id;
    //     console.log(data);
    //     form__img_cast1.src=URL.createObjectURL(event.target.files[0]);

    // }
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
        // var movie_table = $('#upcoming_movies_table').DataTable({});

        $(document).on('submit', '#upcoming_movies_form', function(event) {
            event.preventDefault();
            var movie_cover = $('#movie_cover').val();
            var movie_banner = $('#form__img-upload_banner').val();
            var movie_title = $('#movie_title').val();
            var movie_released_date = $('#date').val();
            var link = $('#movie_link').val();
            var synopsis = $('#synopsis').val();
            var upload_cover1 = $('#upload_cover1').val();

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
                url: "<?php echo base_url() ?>Upcoming_movies/saveupcomingmoviedetails",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        console.log(data);
                        toastr["success"]("UpComing Movies Details Added Successfully!");
                        window.location.href = "<?php echo base_url(); ?>upcoming_movies";

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
                url: "<?php echo base_url() ?>Movies/delete_movie_deteials",
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


        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            console.log(button_id);
            $('#crew' + button_id + '').remove();
        });

        var i = 1;
        $('#add_cast_crew').click(function()
        {
            i++;
            $('#cast_crew').append(
                '<div class="cast_crew" id="crew'+i+'"><div class="col-lg-8" ><h3>'+i+') CAST & CREW</h3></div><br><div class="row"><div class="col-lg-9"><div class="row"><div class="col-lg-4"><select class="form-control form__gallery" name="role[]" id="role"><option value="">Select Role</option><?php foreach ($role_list as $roles) { ?> <option value = "<?php echo $roles['role_id']; ?>"><?php echo $roles['role_name']; ?></option><?php } ?> </select></div><div class = "col-lg-8"><input type = "text" class = "form__input" placeholder = "Name" name = "name[]" id = "name" /></div><div class="col-lg-8"><input type="text" class="form__input" placeholder="add a link" name="link[]" id="link"/></div><div class="col-lg-4"><select class="form-control form__gallery" name="fav[]" id="fav"><option value="">Please Select Favorite</option><option value = "yes"> Yes </option><option value="no">No</option></select></div></div></div><div class = "col-lg-3"><div class = "form__img" style = " height: 110px;"><label for = "cast'+i+'"> Upload Image </label><input id="cast'+i+'" name="cast_photo[]" type="file" accept=".png, .jpg, .jpeg" onchange="previewCast(this);" class="img" value="'+i+'"/><img id = "form__img_cast'+i+'"src = "#" alt = " " /></div><button class="btn btn-danger btn_remove" type="button" id = "'+i+'" style="float: left;" name="remove">Remove</button ></div></div></div>'
            );
        });
        



    });
</script>