<script>
    function onlyNumberKey(evt) {

          // Only ASCII character in that range allowed
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
              return false;
          return true;
      }
    $(document).ready(function() {
        var tran_table = $('.transcationtable').DataTable({});
        $(document).on('submit', '#update_transction', function(event) {
            event.preventDefault();
            
            if($('#transcation_status').val() == '')
            {
                toastr["error"]("Please Select Transcation Status");
                return false;
            }
             $.ajax({
             url:"<?php echo base_url() ?>updateTranscation",
             method:'POST',
             data:new FormData(this),
             contentType:false,
             processData:false,
             dataType:'JSON',
             success:function(data)
             {
              console.log(data);
                if(data.status == 'success')
                {

                    toastr["success"]("Transcation Details Updated Successfully!");
                    window.location.href = "<?php echo base_url(); ?>transcations";
                }
                else
                {
                      toastr["error"]("Transcation Details updated failed! Please try again.");
                      return false;
                }

             }
        });
    });

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
                url: "<?php echo base_url() ?>delete_member",
                method: "POST",
                data: {
                    member_id: id,
                    <?php echo $this->security->get_csrf_token_name(); ?>: <?php echo "'" . $this->security->get_csrf_hash() . "'"; ?>
                },
                success: function(data) {
                    if (data) {
                        toastr["success"]("Member Deleted Successfully");
                        window.location.href = "<?php echo base_url(); ?>members";
                    } else {
                        toastr["error"]("Delete failed! Please try again.");
                        return false;
                    }
                }
            })
        });
        $(document).on('click', '#close', function(event) {
            event.preventDefault();
            asset_table.ajax.reload();
        });
    });
</script>