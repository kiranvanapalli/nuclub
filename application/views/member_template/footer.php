<div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">NU Club</a> 2022</p>
                <p>Powered By <a href="http://adnectics.com/" target="_blank">Adnectics</a>.</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="member_assets/vendor/global/global.min.js"></script>
    <script src="member_assets/js/quixnav-init.js"></script>
    <script src="member_assets/js/custom.min.js"></script>

    <script src="member_assets/vendor/chartist/js/chartist.min.js"></script>

    <script src="member_assets/vendor/moment/moment.min.js"></script>
    <script src="member_assets/vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="member_assets/js/dashboard/dashboard-2.js"></script>
    <script src="member_assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="member_assets/js/plugins-init/datatables.init.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

    <!-- Circle progress -->

</body>
<script>


  <?php if($this->session->flashdata('success')) {  ?>
    
    toastr.success("<?php echo $this->session->flashdata('success'); ?>", "", {
    "closeButton": "true",
    "progressBar": "true",
    "timeOut": "5000",
    "extendedTimeOut": "2000"   
    });
    <?php  } elseif($this->session->flashdata('error')){ ?>
   
    toastr.error("<?php echo $this->session->flashdata('error'); ?>", "", {
    "closeButton": "true",
    "progressBar": "true"
    });
   
    <?php } ?>

    <?php 
    $err = validation_errors();
    $err_msg   = str_replace(array("\r","\n"), '\n', $err);
    if(isset($err_msg) &&  $err_msg != ""){?>
    toastr.error("<?php echo $err_msg; ?>", "", {
    "closeButton": "true",
    "progressBar": "true"
    });
    
    <?php  } ?> 
    
    toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "10000",
  "extendedTimeOut": "5000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
  }
</script>


</html>