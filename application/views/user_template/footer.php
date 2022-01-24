<footer class="footer-wrapper footer-layout2 bg-fluid pt-10" data-bg-src="user_assets/img/shape/footer-bg-2-1.jpg">
    <div class="footer-copyright">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <div class="copyright-shape bg-light-dark">
                        <p class="text-light fw-bold text-bold mb-0">
                            &copy; 2021 <a class="text-white" href="index.html">Mythri Movie Maker</a> By <a
                                class="text-white" href="http://adnectics.com/" target="_blank">Adnectics</a>. All
                            Rights Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<a href="#" class="scrollToTop icon-btn3"><i class="far fa-angle-up"></i></a>
<div class="vs-cursor"></div>
<div class="vs-cursor2"></div>
<script src="user_assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="user_assets/js/app.min.js"></script>
<script src="user_assets/js/vscustom-carousel.min.js"></script>
<script src="user_assets/js/vs-cursor.min.js"></script>
<script src="user_assets/js/vsmenu.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
<script src="user_assets/js/map.js"></script>
<script src="user_assets/js/ajax-mail.js"></script>
<script src="user_assets/js/main.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<div class="socialmedia">
    <div class="">
        <ul>
            <li class="facebook"><a href="https://www.facebook.com/MythriMovieMakers/" target="_blank"><i
                        class="fab fa-facebook"></i></a></li>

            <li class="instagram"><a href="https://www.instagram.com/mythriofficial/" target="_blank"><i
                        class="fab fa-instagram"></i></a></li>

            <li class="twitter"><a href="https://twitter.com/MythriOfficial" target="_blank"><i
                        class="fab fa-twitter"></i></a></li>

            <li class="pinterest"><a href="https://www.pinterest.com/mythrimoviemakers/" target="_blank"><i
                        class="fab fa-pinterest"></i></a></li>

            <li class="youtube"><a href="https://www.youtube.com/channel/UCKZSn5C-RzrLjuWJF8wWiDw" target="_blank"><i
                        class="fab fa-youtube"></i></a></li>

            <li class="whatsapp"><a href="https://api.whatsapp.com/send?phone=+914023551866" target="_blank"><i
                        class="fab fa-whatsapp"></i></a></li>
        </ul>
    </div>
</div>

<div id="back-to-top" class="show">
    <a class="top" href="https://api.whatsapp.com/send?phone=+914023551866" target="_blank" id="top"> <i
            class="fab fa-whatsapp"></i> </a>
</div>

<?php if($this->session->flashdata('success')) {  ?>
<script type="text/javascript">
toastr.success("<?php echo $this->session->flashdata('success'); ?>", "", {
"closeButton": "true",
"progressBar": "true",
"positionClass": "toast-top-right",
 "timeOut": "5000",
 "extendedTimeOut": "1000"  
});
</script> 
<?php  } if($this->session->flashdata('error')){ ?>
<script type="text/javascript">
toastr.error("<?php echo $this->session->flashdata('error');?>", "", {
"closeButton": "true",
"progressBar": "true",
"positionClass": "toast-top-right"
});
</script> 
<?php } ?>  
 
<script type="text/javascript">       
    <?php 
        $err = validation_errors('', ',');
        $error_msg = explode(',',$err);                    
        if(isset($error_msg, $err) && !empty($error_msg) && (count($error_msg) > 0)  ){           
            foreach($error_msg as $error){
                if($error != ""){
    ?>          
    toaster("<?php echo trim(str_replace("<p>","",$error)); ?>");      
<?php } } } ?> 

function toaster(err_msg)
{
    if(err_msg){
        toastr.error(err_msg, "", {
         "closeButton": "true",
         "progressBar": "true"
     }); 
    }
    
} 
</script>

</body>

</html>