<script>
$(document).ready(function() {

    var manufactured_table = $('#manufactured_table').DataTable({

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
            "url": "<?php echo base_url('getmanufactured'); ?>",
            "type": "POST",
        },
        "columnDefs": [{
            targets: -1,
            "orderable": false,
        }, ],
    });
    $('#manufactured_model').click(function() {
        $('.manufactured_form')[0].reset();
        $('#manufactured_name').val('');
        $('#edit_id').val('');
        $('#status_div').css('display', 'none');
        $('.addman').text('Add Manufactured');
        $('#btn_submit').text('Submit');
        $("#addmanufactured").modal('show');

    });
    $(document).on('submit', '#manufactured_form', function(event) {
        event.preventDefault();
        var manufactured_name = $('#manufactured_name').val();
        if (manufactured_name == '') {
            toastr["error"]("Manufactured Name is required!");
            return false;
        }

        $.ajax({
            url: "<?php echo base_url() ?>add_manufactured",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                if (data) {
                    console.log(data);
                    $('.manufactured_form')[0].reset();
                    $('#addmanufactured').modal('hide');
                    toastr["success"]("Manufactured Details Added Successfully!");
                    // window.location.href = "<?php echo base_url(); ?>product_type";
                    manufactured_table.ajax.reload();

                } else {
                    toastr["error"]("Manufactured Details added failed! Please try again.");
                    return false;
                }
            }
        });
    });
    $(document).on('click', '.edit', function() {
        var id = $(this).attr("id");
        console.log(id);
        $.ajax({
            url: "<?php echo base_url(); ?>edit_manufactured_details",
            method: "POST",
            data: {
                manufactured_id: id
            },
            dataType: "json",
            success: function(data) {
                $('.manufactured_form')[0].reset();
                $('#edit_id').val(data.manufactured_id);
                $('.addman').attr('id', "update_manufactured");
                $('#update_manufactured').text("Update Manufactured Details");
                $('#btn_save').text("Update");
                $("#status_div").css('display', 'block');
                $("#status").val(data.status);
                $('#manufactured_form').attr('id', "update_manufactured_form");
                if (data.manufactured_name != '') {
                    $('#manufactured_name').val(data.manufactured_name);
                }
                $('#addmanufactured').modal('show');

            }
        });
    });

    $(document).on('submit', '#update_manufactured_form', function(event) {
        event.preventDefault();
        var id = $('#edit_id').val();
        var manufactured_name = $('#manufactured_name').val();
        console.log(id);
        var status = $('#status').val();

        if (manufactured_name == '') {
            toastr["error"]("Please Enter Manufactured Name!");
            return false;
        }
        if (status == '') {
            toastr["error"]("Please Select Status!");
            return false;
        }
        if (id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>update_manufactured",
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    if (data) {
                        $('#addmanufactured').modal('hide');
                        $('#update_manufactured_form')[0].reset();
                        $('#update_manufactured_form').attr('id',
                            'manufactured_form');
                        toastr["success"](
                            "Manufactured Details Updated Successfully!");
                        manufactured_table.ajax.reload();
                    } else {
                        toastr["error"](
                            "Manufactuted Details Update failed! Please try again.");
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
                title: "Do you want delete this Manufactuted Details?",
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
                        url: "<?php echo base_url() . 'delete_manfactured'?>",
                        method: "POST",
                        data: {
                            manufactured_id: id,
                            <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'".$this->security->get_csrf_hash()."'"; ?>
                        },
                        success: function(resp) {
                            window.location.href =
                                "<?php echo base_url(); ?>manufactured";
                            // product_type_table.ajax.reload();  
                        }
                    });
                }
                return false;
            });
    });
});
</script>