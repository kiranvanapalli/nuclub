<script>
   
    $(document).ready(function() {
        var join_us_table = $('.join_us_table').DataTable({});
    $(document).on('click', '.delete', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            $('.modaldelete').attr('value',id)


    })

    $(document).on('click', '.modaldelete', function(event) {
            event.preventDefault();
            var id = $(this).attr('value');
            console.log(id);
            $.ajax({
                url: "<?php echo base_url() ?>delete_join_us",
                method: "POST",
                data: {
                    id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("Join US Data Deleted Successfully");
                        window.location.href = "<?php echo base_url(); ?>join_us";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });
        $(document).on('click', '#close', function(event) {
            event.preventDefault();
            join_us_table.ajax.reload();
        });
    });
</script>