<script>
$(document).ready(function() {
    var promotion_table = $('#promotion_table').DataTable({

        'searching': true,
        'paging': true,
        "responsive": true,
        "processing": true,
        // "serverSide": true,
        'lengthChange': true,
        // "dom": 'Bfrtip',

        "buttons": [
            'csv', 'excel', 'pdf', 'print'
        ],

        "order": [],
        "ajax": {
            "url": "<?php echo base_url('getpromotions'); ?>",
            "type": "POST",
        },
        "columnDefs": [{
            targets: -1,
            "orderable": false,
        }, ],
    });
    $('#promotion_model').click(function() {
        $('.promotions_form')[0].reset();
        $('#promotion_name').val('');
        $('#edit_id').val('');
        $('#status_div').css('display', 'none');
        $('#addpromotions_title').text('Add Promotions');
        $('#btn_submit').text('Submit');
        $("#addpromotions").modal('show');

    });
    $(document).on('submit', '#promotions_form', function(event) {
        event.preventDefault();
        var promotion_name = $('#promotions').val();
        if (promotion_name == '') {
            toastr["error"]("Promotion Name is required!");
            return false;
        }

        $.ajax({
            url: "<?php echo base_url() ?>add_promotion",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                if (data) {
                    console.log(data);
                    $('.promotions_form')[0].reset();
                    $('#addpromotions').modal('hide');
                    toastr["success"]("Promotion Details Added Successfully!");
                    // window.location.href = "<?php echo base_url(); ?>promotions";
                    promotion_table.ajax.reload();

                } else {
                    toastr["error"]("Promotion Details added failed! Please try again.");
                    return false;
                }
            }
        });

    });
    $(document).on('click', '.edit', function() {
        var id = $(this).attr("id");
        console.log(id);
        $.ajax({
            url: "<?php echo base_url(); ?>edit_promotion_details",
            method: "POST",
            data: {
                promotion_id: id
            },
            dataType: "json",
            success: function(data) {
                $('.promotions_form')[0].reset();
                $('#edit_id').val(data.promotion_id);
                $('.addpromotions_title').attr('id', "update_promotion");
                $('#update_promotion').text("Update Promotion");
                $('#btn_save').text("Update");
                $("#status_div").css('display', 'block');
                $("#status").val(data.status);
                $('#promotions_form').attr('id', "update_promotion_form");
                if (data.promotion_name != '') {
                    $('#promotions').val(data.promotion_name);
                }
                $('#addpromotions').modal('show');

            }
        });
    });
    $(document).on('submit', '#update_promotion_form', function(event) {
        event.preventDefault();
        var id = $('#edit_id').val();
        var promotions = $('#promotions').val();
        console.log(id);
        var status = $('#status').val();

        if (promotions == '') {
            toastr["error"]("Please Enter Promotions!");
            return false;
        }
        if (status == '') {
            toastr["error"]("Please Select Status!");
            return false;
        }
        if (id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>update_promotion",
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    if (data) {
                        $('#addpromotions').modal('hide');
                        $('#update_promotion_form')[0].reset();
                        $('#update_promotion_form').attr('id', 'promotion_form');
                        toastr["success"]("Promotion Updated Successfully!");
                        promotion_table.ajax.reload();
                    } else {
                        toastr["error"]("Promotion Update failed! Please try again.");
                        return false;
                    }

                }
            });
        } else {
            alert("Something went wrong. Please try again!");
            return false;
        }

    });


    $(document).on('click', '.delete', function(event) {
        event.preventDefault();
        var id = $(this).attr("id");
        swal({
                title: "Do you want delete this Promotion Data?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo base_url() . 'delete_promotion'?>",
                        method: "POST",
                        data: {
                            promotion_id: id,
                            <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'".$this->security->get_csrf_hash()."'"; ?>
                        },
                        success: function(resp) {
                            window.location.href =
                                "<?php echo base_url(); ?>promotions";
                            // product_type_table.ajax.reload();  
                        }
                    });
                }
                return false;
            });
    });
});
</script>