<footer id="footer" class="bg-2">
        <div class="container">
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <p>&copy; 2022 NU Club | All right reserved.</p>
                    </div>
                    <div class="col-lg-6 col-md-5 text-lg-right">
						<p>Powered By <a href="http://adnectics.com/" target="_blank" class="text-white">Adnectics</a>.</p>
<!--
                        <div class="footer-social text-right">
                            <ul>
                                <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                                <li><a href="#"><i class="icofont-twitter"></i></a></li>
                            </ul>
                        </div>
-->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--end footer-->
    <!--jQuery js-->
    <script src="user_assets/assets/js/jquery-3.3.1.min.js"></script>
    <!--proper js-->
    <script src="user_assets/assets/js/popper.min.js"></script>
    <!--bootstrap js-->
    <script src="user_assets/assets/js/bootstrap.min.js"></script>
    <!--counter js-->
    <script src="user_assets/assets/js/waypoints.js"></script>
    <script src="user_assets/assets/js/counterup.min.js"></script>
    <!--magnic popup js-->
    <script src="user_assets/assets/js/magnific-popup.min.js"></script>
    <!--owl carousel js-->
    <script src="user_assets/assets/js/owl.carousel.min.js"></script>
    <!--owl scrollIt js-->
    <script src="user_assets/assets/js/scrollIt.min.js"></script>
    <!--validator js-->
    <script src="user_assets/assets/js/validator.min.js"></script>
    <!--contact js-->
    <script src="user_assets/assets/js/contact.js"></script>
    <!--ajax newsletter js-->
    <script src="newsletter/ajax-newsletter-form.js"></script>
    <!--main js-->
    <script src="user_assets/assets/js/custom.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->


	<script>
	$ (document).ready (function () {
	$ (".modal a").not (".dropdown-toggle").on ("click", function () {
		$ (".modal").modal ("hide");
	});
});
	</script>

</body>
</html>


<!-- Sidebar Right -->
<div class="modal fade right" id="sidebar-right" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Refer & Earn</h4>
            </div>
            <div class="modal-body">
                <form class="login-signup-form pb-5 pt-5">
                                <div class="form-group">
                                    <label class="pb-1">Friend Name</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-user color-primary"></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Enter Your Name">
                                    </div>
                                </div>
					 <!-- Mobile Number -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="pb-1">Friend Mobile</label>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-phone color-primary"></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Enter Mobile Number">
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="pb-1"> Friend Email</label>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-email color-primary"></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="name@yourdomain.com">
                                    </div>
                                </div>


                                <!-- Submit -->
                                <button class="btn btn-block secondary-solid-btn border-radius mt-4 mb-2">
                                    Submit
                                </button>

                            </form>
            </div>
        </div>
    </div>
</div>
<script>
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
</script>