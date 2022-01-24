<script type = "text/javascript">
    function previewFile(input) {
        $("#form__img").hide();
        $("#form__img_cover").show();
        $(".old_img_gallery").hide();
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $("#form__img_cover").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }

function previewBanner(input) {
    $("#form__img1").hide();
    $("#form__img_banner").show();
    $(".old_img_gallery").hide();
    form__img_banner.src = URL.createObjectURL(event.target.files[0]);
}
$(document).ready(function () {
    $("#date").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true //to close picker once year is selected
    });
    $(document).on('submit', '#edit_upcoming_movies_form', function (event) 
    {
        event.preventDefault();
        var movie_cover = $('#movie_cover').val();
        var movie_banner = $('#form__img-upload_banner').val();
        var movie_title = $('#movie_title').val();
        var movie_released_date = $('#date').val();
        var link = $('#movie_link').val();
        var synopsis = $('#synopsis').val();
        var upload_cover1 = $('#upload_cover1').val();
        var status  = $('#status').val();
        //  if (movie_cover == '') {
        //     toastr["error"]("Please Upload Movie Cover Image");
        //     return false;
        // }
        //  if (movie_banner == '') {
        //     toastr["error"]("Please Upload Movie Banner Image");
        //     return false;
        // }
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
        // if (upload_cover1 == '') {
        //     toastr["error"]("Movie Cover Image1 is required!");
        //     return false;
        // }
        if(status == '')
        {
            toastr["error"]("Please Select Status");
            return false;
        }
        $.ajax({  
             url:"<?php echo base_url() ?>Upcoming_movies/update_upcoming_movie_details",  
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
                    
                    toastr["success"]("Upcoming Movie Details Updated Successfully!");
                    // window.location.href = "<?php echo base_url(); ?>upcoming_movies";
                }
                else
                {
                      toastr["error"]("UpcomingMovie Details updated failed! Please try again.");
                      return false;
                }     
                  
             }  
        });

    });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            console.log(button_id);
            $('#crew' + button_id + '').remove();
        });
        var id = $(".c_c").last().attr("id");
        var i = id.replace(/[^\d.-]/g, '');
        $('#add_cast_crew').click(function()
        {
            i++;
            $('#cast_crew').append(
                '<div class="cast_crew" id="crew'+i+'"><div class="col-lg-8" ><h3>CAST & CREW</h3></div><br><div class="row"><div class="col-lg-9"><div class="row"><div class="col-lg-4"><select class="form-control form__gallery" name="role[]" id="role"><option value="">Select Role</option><?php foreach ($role_list as $roles) { ?> <option value = "<?php echo $roles['role_id']; ?>"><?php echo $roles['role_name']; ?></option><?php } ?> </select></div><div class = "col-lg-8"><input type = "text" class = "form__input" placeholder = "Name" name = "name[]" id = "name" /></div><div class="col-lg-8"><input type="text" class="form__input" placeholder="add a link" name="link[]" id="link"/></div><div class="col-lg-4"><select class="form-control form__gallery" name="fav[]" id="fav"><option value="">Please Select Favorite</option><option value = "yes"> Yes </option><option value="no">No</option></select></div></div></div><div class = "col-lg-3"><div class = "form__img" style = " height: 110px;"><label for = "cast'+i+'"> Upload Image </label><input id="cast'+i+'" name="cast_photo[]" type="file" accept=".png, .jpg, .jpeg" onchange="previewCast(this);" class="img" value="'+i+'"/><img id = "form__img_cast'+i+'"src = "#" alt = " " /></div><button class="btn btn-danger btn_remove" type="button" id = "'+i+'" style="float: left;" name="remove">Remove</button ></div></div></div>'
            );
        });
}); 
</script>