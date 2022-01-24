<script>
$(document).ready(function() {
    var lead_table = $('#lead_table').DataTable({

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
            "url": "<?php echo base_url('get_lead_data'); ?>",
            "type": "POST",
        },
        "columnDefs": [{
            targets: -1,
            "orderable": false,
        }, ],
    });
    $('#blog_type_model').click(function() {
        $('.blog_category_form')[0].reset();
        $('#blog_category_name').val('');
        $('#edit_id').val('');
        $('#status_div').css('display', 'none');
        $('#blogcat_title').text('Add Blog Category');
        $('#btn_submit').text('Submit');
        $("#addblogcat_model").modal('show');

    });
    $(document).on('submit', '#lead_form', function(event) {
        event.preventDefault();
        var parts_description = $('#parts_description').val();
        var contact_information = $('#contact_information').val();
        var email = $('#email').val();
        if (parts_description == '') {
            toastr["error"]("Part Description is required!");
            return false;
        }
        if (contact_information == '') {
            toastr["error"]("Contact Information is required!");
            return false;
        }
        if (email == '') {
            toastr["error"]("Email is required!");
            return false;
        }

        $.ajax({
            url: "<?php echo base_url() ?>addledadata",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                if (data) {
                    toastr["success"]("Lead Details Added Successfully!");
                    window.location.href = "<?php echo base_url(); ?>lead_list";

                } else {
                    toastr["error"]("Lead Details added failed! Please try again.");
                    return false;
                }
            }
        });

    });

    $(document).on('submit', '#edit_lead_form', function(event) {
        event.preventDefault();
        var id = $('#edit_id').val();
        var parts_description = $('#parts_description').val();
        var contact_information = $('#contact_information').val();
        var email = $('#email').val();
        console.log(id);
        var status = $('#status').val();

        if (parts_description == '') {
            toastr["error"]("Product Description is required!");
            return false;
        }
        if (contact_information == '') {
            toastr["error"]("Contact Information is required!");
            return false;
        }
        if (email == '') {
            toastr["error"]("Email is required!");
            return false;
        }
        if (status == '') {
            toastr["error"]("Please Select Status!");
            return false;
        }
        if (id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>update_lead_data",
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    if (data) {
                        toastr["success"]("Lead Details Updated Successfully!");
                        window.location.href = "<?php echo base_url(); ?>lead_list";
                    } else {
                        toastr["error"]("Lead Details Update failed! Please try again.");
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
                title: "Do you want delete this Blog Category Data?",
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
                        url: "<?php echo base_url() . 'delete_blogcategory'?>",
                        method: "POST",
                        data: {
                            category_id: id,
                            <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'".$this->security->get_csrf_hash()."'"; ?>
                        },
                        success: function(resp) {
                            window.location.href =
                                "<?php echo base_url(); ?>blog_type";
                            // product_type_table.ajax.reload();  
                        }
                    });
                }
                return false;
            });
    });
    $('#cancel').click(function()
    {
        window.location.href = "<?php echo base_url(); ?>lead_list";
    })
    });
</script>