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
function previewBackgroud(input) {
    $("#form__img_back").hide();
    $("#form__img_background").show();
    $(".old_img_gallery").hide();
    form__img_background.src = URL.createObjectURL(event.target.files[0]);
}
function previewcover1(input) {
    $("#form__img_cover1").hide();
    $("#cover1").show();
    $(".old_img_gallery").hide();
    cover1.src = URL.createObjectURL(event.target.files[0]);
}
function previewcover2(input) {
    $("#form__img_cover2").hide();
    $("#cover2").show();
    $(".old_img_gallery").hide();
    cover2.src = URL.createObjectURL(event.target.files[0]);
}
function previewcover3(input) {
    $("#form__img_cover3").hide();
    $("#cover3").show();
    $(".old_img_gallery").hide();
    cover3.src = URL.createObjectURL(event.target.files[0]);
}
function previewcover4(input) {
    $("#form__img_cover4").hide();
    $("#cover4").show();
    $(".old_img_gallery").hide();
    cover4.src = URL.createObjectURL(event.target.files[0]);
}

$(document).ready(function () {
    $("#date").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true //to close picker once year is selected
    });
    $(document).on('submit', '#edit_movies_form', function (event) 
    {
        event.preventDefault();
        var movie_status = $('#movie_status').val();
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
        if(movie_status == '')
        {
            toastr["error"]("Movie Released Type is Required");
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
             url:"<?php echo base_url() ?>movies/update_movie_details",  
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
                    
                    toastr["success"]("Movie Details Updated Successfully!");
                    window.location.href = "<?php echo base_url(); ?>movies";
                }
                else
                {
                      toastr["error"]("Movie Details updated failed! Please try again.");
                      return false;
                }     
                  
             }  
        });

    });
        
}); 
</script>