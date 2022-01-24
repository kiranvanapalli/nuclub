<script>
$(document).ready(function(){
            var user_table = $('#user_table').DataTable({

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
                    "url": "<?php echo base_url('get_users'); ?>",
                    "type": "POST",
                },
                "columnDefs": [{
                    targets: -1,
                    "orderable": false,
                }, ],
            });
            $(document).on('submit', '#add_user_form', function(event) {
                event.preventDefault();
                var first_name = $('#first_name').val();
                var last_name = $('#last_name').val();
                var email = $('#email_id').val();
                var mobile_number = $('#mobile_number').val();
                var password = $('#password').val();
                var conf_password = $('#conf_password').val();
                if (first_name == '') {
                    toastr["error"]("First Name is required!");
                    return false;
                }
                if (last_name == '') {
                    toastr["error"]("Last Name is required!");
                    return false;
                }
                if (email == '') {
                    toastr["error"]("Email Id is required");
                    return false;
                }
                if (mobile_number == '') {
                    toastr["error"]("Mobile Number is required!");
                    return false;
                }
                if (password == '') {
                    toastr["error"]("Password Felid is required!");
                    return false;
                }
                if (conf_password == '') {
                    toastr["error"]("Confirm Password Felid is required!");
                    return false;
                }
                if (password != conf_password) {
                    toastr["error"]("Password & Confirm Password Not Matched");
                    return false;
                }
                $.ajax({
                    url: "<?php echo base_url() ?>adduser",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data) {
                            console.log(data);
                            $('#add_user_form')[0].reset();
                            toastr["success"]("User Details Added Successfully!");
                            window.location.href = "<?php echo base_url(); ?>user_details";

                        } else {
                            toastr["error"]("User Details added failed! Please try again.");
                            return false;
                        }
                       

                    }
                });

              });
              $(document).on('click', '.delete_user', function(event){
                      event.preventDefault();
                      var id = $(this).attr("id");
                      swal({
                              title:"Do you want delete this User?",
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
                                      url: "<?php echo base_url() . 'delete_user'?>",
                                      method:"POST",
                                      data:{user_id:id,<?php echo $this->security->get_csrf_token_name(); ?> : <?php echo "'".$this->security->get_csrf_hash()."'"; ?>},
                                      success: function(resp){
                                        window.location.href = "<?php echo base_url(); ?>user_details";
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

    });
</script>