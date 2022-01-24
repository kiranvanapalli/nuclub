<script>
$(document).ready(function() {
    var product_type_table = $('#product_type_table').DataTable({

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
            "url": "<?php echo base_url('getproduct_type'); ?>",
            "type": "POST",
        },
        "columnDefs": [{
            targets: -1,
            "orderable": false,
        }, ],
    });
    $('#product_type_model').click(function() {
        $('.product_type_form')[0].reset();
        $('#product_type').val('');
        $('#edit_id').val('');
        $('#status_div').css('display', 'none');
        $('#addproducttypes_title').text('Add Product Type');
        $('#btn_submit').text('Submit');
        $("#addproducttypes").modal('show');

    });
    $(document).on('submit', '#product_type_form', function(event) {
        event.preventDefault();
        var product_type = $('#product_type').val();
        if (product_type == '') {
            toastr["error"]("Product Type Name is required!");
            return false;
        }

        $.ajax({
            url: "<?php echo base_url() ?>addproduct_type",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                if (data) {
                    console.log(data);
                    $('.product_type_form')[0].reset();
                    $('#product_type_model').modal('hide');
                    toastr["success"]("Product Type  Details Added Successfully!");
                    window.location.href = "<?php echo base_url(); ?>product_type";

                } else {
                    toastr["error"]("Product Type Details added failed! Please try again.");
                    return false;
                }
            }
        });

    });
    $(document).on('click', '.edit', function() {
        var id = $(this).attr("id");
        console.log(id);
        $.ajax({
            url: "<?php echo base_url(); ?>editproducttype",
            method: "POST",
            data: {
                product_type_id: id
            },
            dataType: "json",
            success: function(data) {
                $('.product_type_form')[0].reset();
                $('#edit_id').val(data.product_type_id);
                $('.addproducttypes_title').attr('id', "update_product_type");
                $('#update_product_type').text("Update Product Type");
                $('#btn_save').text("Update");
                $("#status_div").css('display', 'block');
                $("#status").val(data.status);
                $('#product_type_form').attr('id', "update_product_type_form");
                if (data.product_type != '') {
                    $('#product_type').val(data.product_type);
                }

                $('#addproducttypes').modal('show');

            }
        });
    });

    $(document).on('submit', '#update_product_type_form', function(event) {
        event.preventDefault();
        var id = $('#edit_id').val();
        var product_type = $('#product_type').val();
        console.log(id);
        var status = $('#status').val();

        if (product_type == '') {
            toastr["error"]("Please Enter Product Type!");
            return false;
        }
        if (status == '') {
            toastr["error"]("Please Select Status!");
            return false;
        }
        if (id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>update_product_type",
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    if (data) {
                        $('#addproducttypes').modal('hide');
                        $('#update_product_type_form')[0].reset();
                        $('#update_product_type_form').attr('id', 'product_type_form');
                        toastr["success"]("Product Type  Updated Successfully!");
                        product_type_table.ajax.reload();
                    } else {
                        toastr["error"]("Product Type Update failed! Please try again.");
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