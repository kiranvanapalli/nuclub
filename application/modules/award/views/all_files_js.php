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
        $("#year").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true //to close picker once year is selected
        });
        var award_table = $('#award_table').DataTable({});
        $('#award_type').select2();
        $(document).on('submit', '#award_form', function(event) {
            event.preventDefault();
            var award_title = $('#award_title').val();
            var award_year = $('#year').val();
            var award_type = $('#award_type').val();
            var link = $('#link').val();
            var award_image = $('#award_image').val();
            if (award_title == '') {
                toastr["error"]("Award Title Name is required!");
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
            $.ajax({
                url: "<?php echo base_url() ?>award/saveawarddetails",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        console.log(data);
                        toastr["success"]("Award Details Added Successfully!");
                        window.location.href = "<?php echo base_url(); ?>award";

                    } else {
                        toastr["error"]("Award Details added failed! Please try again.");
                        return false;
                    }
                }
            });
        });
        $(document).on('click', '#modaldelete', function(event) {
            event.preventDefault();
            var id = $(".delete").attr('id');

            $.ajax({
                url: "<?php echo base_url() ?>award/delete_award_details",
                method: "POST",
                data: {
                    award_id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("Award Details Deleted Successfully!");
                        window.location.href = "<?php echo base_url(); ?>award";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });

    });
</script>