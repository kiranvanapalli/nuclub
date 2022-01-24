<script>
$(document).ready(function() {
    var model_table = $('#model_table').DataTable({

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
            "url": "<?php echo base_url('getmodeldetails'); ?>",
            "type": "POST",
        },
        "columnDefs": [{
            targets: -1,
            "orderable": false,
        }, ],
    });
    $(document).on('submit', '#add_model', function(event) {
        event.preventDefault();
        var manufactured_id = $('.manufactured_name').val();
        var model_name = $('#model_name').val();
        if (manufactured_id == '') {
            toastr["error"]("Please Select Manfactured Name...!");
            return false;
        }
        if (model_name == '') {
            toastr["error"]("Please Enter Model name...!");
            return false;
        }

        $.ajax({
            url: "<?php echo base_url() ?>addmodeldetails",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                if (data) {
                    console.log(data);
                    toastr["success"]("Model Details Added Successfully!");
                    window.location.href = "<?php echo base_url(); ?>model";

                } else {
                    toastr["error"]("Model Details added failed! Please try again.");
                    return false;
                }
            }
        });

    });
    

    $(document).on('submit', '#edit_product_model_form', function(event) {
        event.preventDefault();
        var id = $('#edit_id').val();
        var model_name = $('#model_name').val();
        var manufactured_id = $('#manufactured').val();
        var status = $('#status').val();

        if (model_name == '') {
            toastr["error"]("Please Enter Model Name");
            return false;
        }
        if(manufactured_id == "")
        {
            toastr["error"]("Please Select Manfactured Name");
            return false;
        }
        if (status == '') {
            toastr["error"]("Please Select Status!");
            return false;
        }
        if (id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>update_model",
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    if (data) {
                        toastr["success"]("Product Model  Updated Successfully!");
                        window.location.href = "<?php echo base_url(); ?>model";
                    } else {
                        toastr["error"]("Product Model Update failed! Please try again.");
                        return false;
                    }

                }
            });
        } else {
            alert("Something went wrong. Please try again!");
            return false;
        }

    });


    $(document).on('click', '.delete_model', function(event) {
        event.preventDefault();
        var id = $(this).attr("id");
        swal({
                title: "Do you want delete this Product Model Data?",
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
                        url: "<?php echo base_url() . 'delete_product_model'?>",
                        method: "POST",
                        data: {
                            model_id: id,
                            <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'".$this->security->get_csrf_hash()."'"; ?>
                        },
                        success: function(resp) {
                            window.location.href =
                                "<?php echo base_url(); ?>model";
                            // product_type_table.ajax.reload();  
                        }
                    });
                }
                return false;
            });


    });
     $('#reset').click(function(){
          window.location.href = "<?php echo base_url(); ?>model";
    });
});
</script>