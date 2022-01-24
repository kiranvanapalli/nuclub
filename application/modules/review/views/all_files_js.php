<script>
$(document).ready(function() {

    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
    if (($("#contact_us_table").length > 0)) {

        var dataTable = $('#contact_us_table').DataTable({

        });

    }

    $('.get_message').click(function() {
        var id = $(this).data('id');
        // console.log(id);
        var url = '<?php echo base_url(); ?>get_message_data';
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                id: id
            },
            dataType: 'json',
            success: function(json) {
                $('#msgshowmodel').modal('show');
                // console.log(json.message);
                $('#message').text(json.text);
            }

        });

    });
    $(document).on('click', '.delete', function(event) {
        event.preventDefault();
        var id = $(this).attr("id");
        swal({
                title: "Do you want delete this Contact Data?",
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
                        url: "<?php echo base_url() . 'delete_message'?>",
                        method: "POST",
                        data: {
                            id: id,
                            <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'".$this->security->get_csrf_hash()."'"; ?>
                        },
                        success: function(resp) {
                            window.location.href = "<?php echo base_url(); ?>contact_us";
                        }
                    });
                }
                return false;
            });
    });
});
</script>