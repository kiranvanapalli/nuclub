<script>
$(document).ready(function(){
            var asset_table = $('#email_table').DataTable({

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
                    "url": "<?php echo base_url('get_emails'); ?>",
                    "type": "POST",
                },
                "columnDefs": [{
                    targets: -1,
                    "orderable": false,
                }, ],
            });
        $('#asset_model').click(function() {
        $('.asset_form')[0].reset();
        // $('#asset_title').val('');
        $('#asset_name').val('');
        $('.today_asset_price').val('');
        $('.in_or_de_asset_value').val('');
        $('.present_asset_value').val('');
        $('#edit_id').val('');
        $('#status_div').css('display','none');
        $('#asset_title').text('Add Asset');
        $('#btn_submit').text('Submit');
        $("#addassets").modal('show');

  });
            $(document).on('submit', '#asset_form', function(event) {
                event.preventDefault();
                var asset_name = $('#asset_name').val();
                var today_asset_price = $('#today_asset_price').val();
                var in_or_de_asset_value = $('#in_or_de_asset_value').val();
                
                if (asset_name == '') {
                    toastr["error"]("Asset Name is required!");
                    return false;
                }
                if (today_asset_price == '') {
                    toastr["error"]("Please Enter Today Asset Price!");
                    return false;
                }
                if (in_or_de_asset_value == '') {
                    toastr["error"]("Please Enter Increase Or Decrease Asset Price");
                    return false;
                }
                // var datastring = $("#asset_form").serialize();
                $.ajax({
                    url: "<?php echo base_url() ?>addassets",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data) {
                            console.log(data);
                            $('.asset_form')[0].reset();
                            $('#addassets').modal('hide');  
                            toastr["success"]("Asset Details Added Successfully!");
                            window.location.href = "<?php echo base_url(); ?>asset";

                        } else {
                            toastr["error"]("Asset Details added failed! Please try again.");
                            return false;
                        }
                       

                    }
                });

              });
            $(document).on('click', '.edit', function(){
                 var id = $(this).attr("id");
                  console.log(id);
                  $.ajax({
                    url:"<?php echo base_url(); ?>editassets",
                    method:"POST",
                    data:{asset_id:id},
                    dataType:"json",
                    success:function(data)
                    {

                         $('.asset_form')[0].reset();
                         $('#edit_id').val(data.asset_id);
                         $('#asset_title').attr('id',"update_asset");
                         $('#update_asset').text("Update Asset");
                         $('#btn_submit').text("Update");
                         $("#status_div").css('display','block');
                         $("#status").val(data.status);
                         $('#asset_form').attr('id',"update_asset_form");
                         if (data.asset_name != '') 
                         {
                             $('#asset_name').val(data.asset_name);
                         }
                          if (data.today_value != '') 
                         {
                             $('#today_asset_price').val(data.today_value);
                         }
                          if (data.incr_decr != '') 
                         {
                              $('#in_or_de_asset_value').val(data.incr_decr);
                         }
                          if (data.prasent_value != '') 
                         {
                             $('#present_asset_value').val(data.prasent_value);
                         }
                        
                         $('#addassets').modal('show');

                    }
                  });
            });
            
            $(document).on('submit','#update_asset_form',function(event)
            {
                event.preventDefault();  
                var id = $('#edit_id').val();
                var asset_name = $('#asset_name').val();
                console.log(id);
                var today_asset_price = $('#today_asset_price').val();
                var in_or_de_asset_value = $('#in_or_de_asset_value').val();
                var present_asset_value = $('#present_asset_value').val();
                var status = $('#status').val();

                if (asset_name == '') 
                {
                         toastr["error"]("Please Enter Asset Name!");
                         return false;
                }
                if(today_asset_price == '')
                {
                    toastr["error"]("Please Enter Asset Price!");
                    return false;
                }
                if (in_or_de_asset_value == '') 
                {
                    toastr["error"]("Please Enter Increase Or Decrease Asset Price!");
                    return false;
                }
                if (status=='') 
                {
                     toastr["error"]("Please Select Status!");
                     return false;
                }
                if (id!='') 
                {
                    $.ajax({
                        url:"<?php echo base_url(); ?>update_asset",
                        method:"POST",
                        data:$(this).serialize(),
                        success:function(data)
                        {
                            if(data)
                            {
                                $('#addassets').modal('hide');
                                $('#update_asset_form')[0].reset();
                                $('#update_asset_form').attr('id','asset_form');
                                toastr["success"]("Asset Updated Successfully!");
                                asset_table.ajax.reload();  
                            }
                            else
                            {
                                toastr["error"]("Assets Update failed! Please try again.");
                                return false;
                            }

                        }



                    });
                }
                else
                {
                    alert("Something went wrong. Please try again!"); 
                    return false; 
                }
            
            });


              $(document).on('click', '.delete', function(event){
                      event.preventDefault();
                      var id = $(this).attr("id");
                      swal({
                              title:"Do you want delete this Email Subscribe Data?",
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
                          function(isConfirm){
                              if(isConfirm){
                                  $.ajax({
                                      url: "<?php echo base_url() . 'delete_email_sub'?>",
                                      method:"POST",
                                      data:{id:id,<?php echo $this->security->get_csrf_token_name(); ?> : <?php echo "'".$this->security->get_csrf_hash()."'"; ?>},
                                      success: function(resp){
                                        window.location.href = "<?php echo base_url(); ?>email_subscribe";
                                      }
                                  });
                                  }
                              return false;
                          });
                    }); 
                $(".toggle-password").click(function() {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                    var input = $($(this).attr("toggle"));
                    if (input.attr("type") == "password") {
                        input.attr("type", "text");
                    } else {
                        input.attr("type", "password");
                    }
                });


            $(document).on("change keyup blur", "#in_or_de_asset_value", function() {
            $('#present_asset_value').text('');
            var today_asset_value = parseFloat($('#today_asset_price').val());
            var in_or_de_asset_value = $('#in_or_de_asset_value').val();
            var preset_asset_value = parseFloat((today_asset_value*in_or_de_asset_value)/100);
            var total = parseFloat(today_asset_value + preset_asset_value);
            $("#present_asset_value").val(total); 
        });

    });
</script>