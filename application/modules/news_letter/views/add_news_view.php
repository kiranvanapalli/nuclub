<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">

            <div class="row mb-2">
                <div class="col-8">
                    <div class="main__title">
                        <h2>Add News</h2>
                    </div>
                </div>

                <div class="col-4">
                    <div class="main__title">
                        <a href="<?= base_url() ?>news" class="main__title-link">News List</a>
                    </div>
                </div>
            </div>

            <!--			--------------------body-------------------------->
            <div class="row">

                <div class="col-12">
                    <form action="#" class="form">
                        <div class="row row--form">
                            <div class="col-12 col-md-5 form__cover">
                                <div class="row row--form">
                                    <div class="col-12 col-sm-6 col-md-12">
                                        <div class="form__img">
                                            <label for="form__img-upload">Upload cover (270 x 400)</label>
                                            <input id="form__img-upload" name="form__img-upload" type="file" accept=".png, .jpg, .jpeg">
                                            <img id="form__img" src="#" alt=" ">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-7 form__content">
                                <div class="row row--form">
                                    <div class="col-12">
                                        <input type="text" class="form__input" placeholder="Title">
                                    </div>
                                    <div class="col-12">
                                        <textarea id="text" name="text" class="form__textarea" placeholder="Description"></textarea>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <input type="text" class="form__input" placeholder="year">
                                    </div>

                                    <div class="col-12 col-lg-8">
                                        <input type="text" class="form__input" placeholder="link">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a href="News-detail-page.html"><button type="button" class="main__title-link">publish</button></a>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
            <!--			--------------------body-------------------------->


        </div>
    </div>



</div>