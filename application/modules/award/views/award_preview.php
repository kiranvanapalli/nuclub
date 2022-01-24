<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="content-wrapper">
		<div class="content-body">
			<div class="col-12">
				<div class="profile__content">
					<!-- profile user -->
					<div class="profile__user">
						<div class="profile__avatar">
							<i class="h2 la-film las m-0 pb-1 pl-0 pr-0 pt-1 text-center text-white w-100"></i>
						</div>
						<!-- or red -->
						<div class="profile__meta profile__meta--green">
						<?php
                              foreach ($movie_list as $movie_list) {
                                 if ($movie_list['movie_id'] == $get_award['movie_id']) { ?>
                                    <h3 class="dtp text-center"><?php echo $movie_list['title']; ?></h3>
                              <?php }
                              }
                              ?>
						</div>
					</div>
					<!-- end profile user -->
					<!-- profile btns -->
					<div class="profile__actions">
						<a href="<?php echo base_url() ?>edit_award?id=<?php echo $get_award['award_id']; ?>" class="profile__action profile__action--banned open-modal">
						<i class="las la-edit"></i></a>
					</div>
					<!-- end profile btns -->
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
											<img src="<?php echo base_url(); ?>uploads/award_images/<?php echo $get_award['award_image']; ?>"  alt="">
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-7 form__content">
								<div class="row row--form">
									<div class="col-12 col-sm-6 col-lg-2">
										<h3 class="dtp text-center"><?php echo $get_award['award_year']; ?></h3>
									</div>
									<div class="col-12 col-sm-6 col-lg-10">
										<?php $award = explode(",", $get_award['award_type']);
											foreach($award as $award_list)
										{
										
										foreach ($award_type_list as $award_type)
										{
											if($award_list == $award_type['award_type_id'])
											{
										?>
										<h3 class="dtp text-center">
										<?php echo $award_type['award_name']; ?>
										
										</h3>
										<?php } } }
										?>
										
										
									</div>
									<div class="col-12 col-sm-6 col-lg-12">
										<h3 class="dtp text-center"><?php echo $get_award['award_link']; ?></h3>
									</div>
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