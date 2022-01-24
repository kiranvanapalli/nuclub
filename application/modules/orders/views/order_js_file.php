<script>
$(document).ready(function() {
    var order_table = $('#order_table').DataTable({

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
            "url": "<?php echo base_url('getorders'); ?>",
            "type": "POST",
        },
        "columnDefs": [{
            targets: -1,
            "orderable": false,
        }, ],
    });
 
    
    $(document).on('click', '.edit', function() {
        var id = $(this).attr("id");
        console.log(id);
        $.ajax({
            url: "<?php echo base_url(); ?>edit_status",
            method: "POST",
            data: {
                order_item_id: id
            },
            dataType: "json",
            success: function(data) {
                $('.order_form')[0].reset();
                $('#edit_id').val(data.order_item_id);
                $('.status_title_div').attr('id', "update_product_type");
                $('#update_product_type').text("Update Status");
                $('#btn_save').text("Update");
                $("#status_div").css('display', 'block');
                $("#status").val(data.status);
                $('#order_form').attr('id', "update_status");
                $('#editstatus').modal('show');

            }
        });
    });

    $(document).on('submit', '#update_status', function(event) {
        event.preventDefault();
        var id = $('#edit_id').val();
        // var product_type = $('#product_type').val();
        console.log(id);
        var status = $('#status').val();
        if (status == '') {
            toastr["error"]("Please Select Status!");
            return false;
        }
        if (id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>update_status",
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    if (data) {
                        $('#editstatus').modal('hide');
                        toastr["success"]("Status Updated Successfully!");
                        window.location.href ="<?php echo base_url(); ?>orders";
                        order_table.ajax.reload();
                    } else {
                        toastr["error"]("Status Update failed! Please try again.");
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
                title: "Do you want delete this Product Type Data?",
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
                        url: "<?php echo base_url() . 'delete_product_type'?>",
                        method: "POST",
                        data: {
                            product_type_id: id,
                            <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'".$this->security->get_csrf_hash()."'"; ?>
                        },
                        success: function(resp) {
                            window.location.href =
                                "<?php echo base_url(); ?>product_type";
                            // product_type_table.ajax.reload();  
                        }
                    });
                }
                return false;
            });
    });
});
</script>