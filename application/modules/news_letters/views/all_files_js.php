<script>
   
    $(document).ready(function() {
        var news_list = $('.news_letter_table').DataTable({});
    $(document).on('click', '.delete', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            $('.modaldelete').attr('value',id);
            $('.delete_member').attr('value',id);


    })

    $(document).on('click', '.delete_member', function(event) {
            event.preventDefault();
            var id = $(this).attr('value');
            console.log(id);
            $.ajax({
                url: "<?php echo base_url() ?>delete_news_letter_sub",
                method: "POST",
                data: {
                    id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("News Letter Subscription Data Deleted Successfully");
                        window.location.href = "<?php echo base_url(); ?>news_letter_subscription";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });
        $(document).on('click', '#close', function(event) {
            event.preventDefault();
            return false;
        });
    });
</script>