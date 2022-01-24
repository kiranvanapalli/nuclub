<script>

     function previewFile(input)
    {  
        $("#updated_image").show();
        $(".old_img_gallery").hide();
        $("#cover_label").hide();
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#updated_image").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
    $(document).ready(function() {
        $("#date").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true //to close picker once year is selected
        });
        $('#award_type').select2();
        $(document).on('submit', '#edit_award_form', function(event) {
            event.preventDefault();
            var award_title = $('#movie_id').val();
            var award_year = $('#year').val();
            var award_type = $('#award_type').val();
            var link = $('#link').val();
            var award_image = $('#award_image').val();
            var status = $('#status').val();
            if (award_title == '') {
            toastr["error"]("Please Select Movie Name");
                return false;
            }
            if (award_year == '') {
                toastr["error"]("Award Year is required!");
                return false;
            }
            if (award_type == '') {
                toastr["error"]("Please Select Award");
                return false;
            }
            if (link == '') {
                toastr["error"]("Award Link is required!");
                return false;
            }
             if (award_image == '') {
                toastr["error"]("Award Image is required!");
                return false;
            }
            if(status == '')
            {
                 toastr["error"]("Status is required!");
                 return false;
            }
             $.ajax({  
             url:"<?php echo base_url() ?>award/update_award_details",  
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
                    window.location.href = "<?php echo base_url(); ?>award";
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