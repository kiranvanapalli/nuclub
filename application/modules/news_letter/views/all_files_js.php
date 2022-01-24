<script>
    $(document).ready(function() {
        var news_letter = $('#news_letter').DataTable({});
        $(document).on('click', '#modaldelete', function(event) {
            event.preventDefault();
            var id = $(".delete").attr('id');

            $.ajax({
                url: "<?php echo base_url() . 'news_letter/delete_news_letter' ?>",
                method: "POST",
                data: {
                    id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("News Letter Deleted Successfully!");
                        window.location.href = "<?php echo base_url(); ?>news_letter";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });
    });
</script>