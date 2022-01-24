<script>
$(document).ready(function() {

    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    var blog_list = $('#blog_table').DataTable({

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
            "url": "<?php echo base_url('getblog'); ?>",
            "type": "POST",
        },
        "columnDefs": [{
            targets: -1,
            "orderable": false,
        }, ],
    });

    $(document).on('submit', '#add_blog', function(event) {
        event.preventDefault();

        if ($('#blog_category').val() == '') {
            toastr["error"]("Please Select Blog Category");
            return false;
        }
        if ($('#blog_title').val() == '') {
            toastr["error"]("Please Enter Blog Title");
            return false;
        }
        if ($('#blog_image').val() == '') {
            toastr["error"]("Please Select Blog Image");
            return false;
        }
        if ($('#blog_message').val() == '') {
            toastr["error"]("Please Enter Blog Message");
            return false;
        }
        
            $.ajax({
            url: "<?php echo base_url() ?>addblogdetails",
            data: new FormData(this),
            method: 'POST',
            contentType: false,
            processData: false,
            success: function(data) {

                if (data) {
                    $('#add_blog')[0].reset();
                    toastr["success"]("Blog Details Added Successfully!");
                    window.location.href = "<?php echo base_url(); ?>blog_list";
                } else {
                    toastr["error"]("Blog Details Added failed! Please try again.");
                    return false;
                }
            }
        });
    });

    $(document).on('click', '.delete_blog', function(event) {
        event.preventDefault();
        var id = $(this).attr("id");
        swal({
                title: "Do you want delete this Blog Data?",
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
                        url: "<?php echo base_url() . 'delete_blog'?>",
                        method: "POST",
                        data: {
                            blog_id: id,
                            <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'".$this->security->get_csrf_hash()."'"; ?>
                        },
                        success: function(resp) {
                            window.location.href =
                                "<?php echo base_url(); ?>blog_list";
                            // product_type_table.ajax.reload();  
                        }
                    });
                }
                return false;
            });
});   
});
</script>