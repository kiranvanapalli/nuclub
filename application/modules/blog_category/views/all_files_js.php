<script>
$(document).ready(function() {
    var blog_category_table = $('#blog_category_table').DataTable({

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
            "url": "<?php echo base_url('get_blogcategories'); ?>",
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
    $(document).on('submit', '#blog_category_form', function(event) {
        event.preventDefault();
        var blog_category_name = $('#blog_category_name').val();
        if (blog_category_name == '') {
            toastr["error"]("Blog Category Name is required!");
            return false;
        }

        $.ajax({
            url: "<?php echo base_url() ?>add_blogcategory_details",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                if (data) {
                    console.log(data);
                    $('.blog_category_form')[0].reset();
                    $('#addblogcat_model').modal('hide');
                    toastr["success"]("Blog Category  Details Added Successfully!");
                    window.location.href = "<?php echo base_url(); ?>blog_type";

                } else {
                    toastr["error"]("Blog Category Details added failed! Please try again.");
                    return false;
                }
            }
        });

    });
    $(document).on('click', '.edit', function() {
        var id = $(this).attr("id");
        console.log(id);
        $.ajax({
            url: "<?php echo base_url(); ?>edit_blogcategory",
            method: "POST",
            data: {
                category_id: id
            },
            dataType: "json",
            success: function(data) {
                $('.blog_category_form')[0].reset();
                $('#edit_id').val(data.category_id);
                $('#blogcat_title').attr('id', "update_blog_title");
                $('#update_blog_title').text("Update Product Type");
                $('#btn_save').text("Update");
                $("#status_div").css('display', 'block');
                $("#status").val(data.status);
                $('#blog_category_form').attr('id', "update_blog_title_form");
                if (data.blog_category != '') {
                    $('#blog_category_name').val(data.category_name);
                }

                $('#addblogcat_model').modal('show');

            }
        });
    });

    $(document).on('submit', '#update_blog_title_form', function(event) {
        event.preventDefault();
        var id = $('#edit_id').val();
        var category_name = $('#category_name').val();
        console.log(id);
        var status = $('#status').val();

        if (category_name == '') {
            toastr["error"]("Please Enter Blog Category name!");
            return false;
        }
        if (status == '') {
            toastr["error"]("Please Select Status!");
            return false;
        }
        if (id != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>update_blogcategory",
                method: "POST",
                data: $(this).serialize(),
                success: function(data) {
                    if (data) {
                        $('#addblogcat_model').modal('hide');
                        $('#update_blog_title_form')[0].reset();
                        $('#update_blog_title_form').attr('id', 'blog_category_form');
                        toastr["success"]("Blog Category Updated Successfully!");
                        blog_category_table.ajax.reload();
                    } else {
                        toastr["error"]("Blog Category Update failed! Please try again.");
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
    });
</script>