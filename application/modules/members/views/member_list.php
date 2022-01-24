<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row mb-2">
                <!-- main title -->
                <div class="col-6">
                    <div class="main__title">
                        <h2>Members List</h2>
                    </div>
                </div>

                <div class="col-6">
                    <div class="main__title">
                        <a href="<?php echo base_url() ?>add_member" class="main__title-link w-50">Add Member</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0 text-center membertable">
                                    <thead>
                                        <tr>
                                            <th>Sl.no</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Member Code</th>
                                            <th>STATUS</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        foreach($all_members as $all_members)
                                        {?>

                                            <tr>
                                            <td>
                                                <div class="main__table-text"><?php echo $i++; ?></div>
                                            </td>
                                            <td>
                                                <div class="main__table-text"><?php echo $all_members['fullname']; ?></div>
                                            </td>
                                            <td>
                                                <div class="main__table-text"><?php echo $all_members['mobilenumber']; ?></div>
                                            </td>
                                            <td>
                                                <div class="main__table-text"><?php echo $all_members['member_code']; ?></div>
                                            </td>
                                            <td>
                                                <div class="main__table-text main__table-text--green"><?php echo $all_members['status']; ?></div>
                                            </td>
                                            <td>
                                                <div class="main__table-btns">
                                                    <!-- <a data-toggle="modal" data-target="#modalstatus" class="main__table-btn main__table-btn--banned open-modal">
                                                        <i class="las la-unlock-alt"></i>
                                                    </a> -->
                                                    <a href="detailviewpage.html" target="_blank" class="main__table-btn main__table-btn--view">
                                                        <i class="lar la-eye"></i>
                                                    </a>
                                                    <a href="pereditpage.html" target="_blank" class="main__table-btn main__table-btn--edit">
                                                        <i class="las la-edit"></i>
                                                    </a>
                                                    <a data-toggle="modal" data-target="#modaldelete" class="main__table-btn main__table-btn--delete open-modal">
                                                        <i class="las la-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                            
                                       <?php }
                                        
                                        ?>
                                       
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