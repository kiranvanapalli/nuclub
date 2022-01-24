<style type="text/css">
    .main__title-link
    {
        width: 170px !important;
    }
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row mb-2">
                <!-- main title -->
                <div class="col-8">
                    <div class="main__title">
                        <h2>Upcoming Movies</h2>
                    </div>
                </div>

                <div class="col-4">
                    <div class="main__title">
                        <a href="<?php echo base_url() ?>add_upcoming_movie" class="main__title-link">Add Upcoming Movie</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0 text-center" id="upcoming_movies_table">
                                    <thead>
                                        <tr>
                                            <th>Sl.no</th>
                                            <th>TITLE</th>
                                            <th>Image</th>
                                            <th>CRAETED DATE</th>
                                            <th>STATUS</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                        $i=1;

                                        foreach($list as $movie_list)
                                        {

                                         ?>
                                        <tr>
                                            <td>
                                                <div class="main__table-text"><?php echo $i++; ?></div>
                                            </td>
                                            <td>
                                                <div class="main__table-text"><?php echo $movie_list['title']; ?></div>
                                            </td>
                                            <td class="image text-center">
                                                <img src="<?php echo base_url() ?>uploads/upcoming_movies_images/cover_images/<?php echo $movie_list['cover_image']; ?>" />
                                            </td>
                                            <td>
                                                <div class="main__table-text"><?php echo $movie_list['created_at']; ?></div>
                                            </td>
                                            <?php if($movie_list['status'] == 1)
                                            {?>
                                                <td>
                                                    <div class="main__table-text main__table-text--green">Visible</div>
                                                </td>
                                            <?php }
                                            else
                                            { ?>
                                                <td>
                                                    <div class="main__table-text main__table-text--red">In Visible</div>
                                                </td>
                                           <?php } ?>
                                            
                                            <td>
                                                <div class="main__table-btns">
                                                    <!-- <a data-toggle="modal" data-target="#modalstatus" class="main__table-btn main__table-btn--banned open-modal">
                                                        <i class="las la-unlock-alt"></i>
                                                    </a> -->
                                                    <a href="<?php echo base_url(); ?>upcoming_movie_details?id=<?php echo $movie_list['upcoming_movie_id']; ?>"class="main__table-btn main__table-btn--view">
                                                        <i class="lar la-eye"></i>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>edit_upcoming_movie_details?id=<?php echo $movie_list['upcoming_movie_id']; ?>" target="_blank" class="main__table-btn main__table-btn--edit">
                                                        <i class="las la-edit"></i>
                                                    </a>
                                                    <a data-toggle="modal" data-target="#modaldelete" class="main__table-btn main__table-btn--delete open-modal">
                                                        <i class="las la-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
         var movie_table = $('#upcoming_movies_table').DataTable({});
    });
</script>
