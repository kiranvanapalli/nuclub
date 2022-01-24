<!--     ---------------------------------  Menu  ----------------------------------->
<div class="breadcumb-wrapper breadcumb-layout1 pt-60 pb-50" data-bg-src="user_assets/img/breadcumb/breadcumb-1.jpg" data-overlay>
   <div class="container z-index-common">
      <div class="breadcumb-content text-center">
         <h1 class="breadcumb-title h1 text-white my-0">Contact Us</h1>
         <h2 class="breadcumb-bg-title">connect</h2>
         <ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
            <li><a href="<?= base_url(); ?>"><i class="fal fa-home"></i>Home</a></li>
            <li class="active">Contact Us</li>
         </ul>
      </div>
   </div>
</div>
<section class="vs-contact-wrapper">
   <div class="container">
      <div class="row gx-60 mb-30">
         <div class="col-8 mt-60">
            <div class="position-relative">
               <div class="map-wrap">
                  <div>
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d121804.28702274377!2d78.35493285010783!3d17.441326900000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb91641bc4ee5f%3A0x65c63ebb57501ed0!2sMythri%20movie%20makers!5e0!3m2!1sen!2sin!4v1634643542270!5m2!1sen!2sin" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                  </div>
               </div>
               <div class="info-box3 bg-dark position-absolute start-0 bottom-0 px-40 py-40">
                  <h3 class="h4 text-white text-normal mb-2">MYTHRI MOVIE MAKERS</h3>
                  <p class="text-white"><i class="fas fa-map-marker-alt me-2"></i>Sushrutha, #330/1, Rd. No.25, Jubilee Hills, Hyderabad – 500 033</p>
                  <div class="row mt-lg-4">
                     <div class="col-sm-5 mb-10 mb-sm-0">
                        <div class="d-flex">
                           <span class="icon-btn3 me-3"><i class="fas fa-phone-alt"></i></span>
                           <div class="media-body align-self-center">
                              <h4 class="h5 text-white font-theme text-normal mb-0">Get In Touch</h4>
                              <a href="tel:+914023551866" class="text-white d-inline-block">+91 40 23551866</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-7">
                        <div class="d-flex">
                           <span class="icon-btn3 me-3"><i class="fal fa-envelope"></i></span>
                           <div class="media-body align-self-center">
                              <h4 class="h5 text-white font-theme text-normal mb-0">Mail Us</h4>
                              <a href="mailto:info@mythrimoviemakers.com" class="text-white d-inline-block">info@mythrimoviemakers.com</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4">
            <form action="<?= base_url() ?>save_enquiry" method="POST"  class="contact-form-style1 bg-smoke mt-60 border-0">
               <div class="col-12 mb-30">
                  <h3 class="text-normal mb-2">Send Us a Message</h3>
                  <p class="fs-18">Your email address will not be published*</p>
               </div>
               <div class="form-group mb-20"><input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name"> <i class="fal fa-user"></i></div>
               <div class="form-group mb-20"><input type="text" id="email" name="email" class="form-control" placeholder="Enter Your Email"> <i class="fal fa-envelope"></i></div>
               <div class="form-group mb-20"><textarea class="form-control" id="message" rows="5" cols="50" name="message" placeholder="Your Message"></textarea> <i class="fal fa-pencil-alt"></i></div>
               <div class="form-group mb-0">
                  <button type="submit" class="vs-btn gradient-btn" name="enquiry_form" id="enquiry_form">Submit Your Quote</button>
                  <p class="form-messages mt-20 mb-0"></p>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>