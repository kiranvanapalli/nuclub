<script>
    $(document).ready(function() {
        var enquiry_table = $('#enquiry_table').DataTable({});

        $(document).on('click', '#modaldelete', function(event) {
            event.preventDefault();
            var id = $(".delete").attr('id');

            $.ajax({
                url: "<?php echo base_url() . 'Enquiry/delete_enquiry' ?>",
                method: "POST",
                data: {
                    enquiry_id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("Enquiry Details Deleted Successfully!");
                        window.location.href = "<?php echo base_url(); ?>enquiry";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });
        
        $(document).on('click', '.open', function(event) {
            // $('.modalstatus')[0].reset();
            var id = $(this).attr("id");
            console.log(id);
            $.ajax({
                url: "<?php echo base_url() . 'Enquiry/getenquiry' ?>",
                method: "POST",
                data: {
                    enquiry_id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'" ?>
                },
                dataType: "json",

                success: function(data) {
                    console.log(data),
                    // $('.modalstatus')[0].reset();
                   
                    $('#name').text(data.name);
                    $('#email').text(data.email);
                    $('#message').text(data.message);
                    $('#date').text(data.created_at);
                    $('#modalstatus')[0].reset();

                }
            })
        });

    });
</script>