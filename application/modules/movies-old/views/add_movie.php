<div class="app-content content">
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <!-- main title -->
            <div class="col-8">
               <div class="main__title">
                  <h2>Add Movie</h2>
               </div>
            </div>
            <div class="col-4">
               <div class="main__title">
                  <!--						<a href="Upcomingmovies.html" class="main__title-link">Save</a>-->
               </div>
            </div>
         </div>
         <!--			--------------------body-------------------------->
         <div class="row">
            <div class="col-12">
               <form action="" class="form" name="movie_from" id="movie_form" autocomplete="off">
                  <div class="row row--form">
                     <div class="col-12 col-md-5 form__cover">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-md-12">
                              <div class="form__img">
                                 <label for="form__img-upload">Upload cover (270 x 400)</label>
                                 <input id="form__img-upload" name="movie_image" id="movie_image" type="file" accept=".png, .jpg, .jpeg" onchange="previewFile(this);">
                                 <img id="form__img" src="#" alt=" ">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-7 form__content">
                        <div class="row row--form">
                           <div class="col-12">
                              <input type="text" class="form__input" placeholder="Title" name="movie_title" id="movie_title">
                           </div>
                           <div class="col-12 col-sm-6 col-lg-4">
                              <input type="text" class="form__input" placeholder="Release Date" id="date" name="date">
                           </div>
                           <div class="col-12 col-sm-6 col-lg-8">
                              <input type="text" class="form__input" placeholder="Link" id="movie_link" name="movie_link">
                           </div>
                        </div>
                        <div class="col-12">
                         <button type="submit" class="main__title-link">Save</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>