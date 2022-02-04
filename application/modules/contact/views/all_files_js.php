<script>
   
    $(document).ready(function() {
        var contact_us_table = $('.contact_us_table').DataTable({});
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
                url: "<?php echo base_url() ?>delete_contact_us",
                method: "POST",
                data: {
                    id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("Contact Us Data Deleted Successfully");
                        window.location.href = "<?php echo base_url(); ?>contact";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });
        $(document).on('click', '#close', function(event) {
            event.preventDefault();
            window.location.href = "<?php echo base_url(); ?>join_us";
        });
    });
</script>