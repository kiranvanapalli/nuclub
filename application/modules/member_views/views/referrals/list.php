<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-header">
                                <h4 class="card-title">Referrals Details</h4>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <a class="btn-google float-right mr-3 mt-3 p-2 pl-3 pr-3" href="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal">
                                Referral your Friend</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Ref Name</th>
                                        <th>Ref Mobile No</th>
                                        <th>Email ID</th>
                                        <th>Status</th>
                                        <th>Earned Points</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($refer_list as $refer_list){ ?>
                                    <tr>
                                        <td><?php echo $refer_list['fullname']; ?></td>
                                        <td><?php echo $refer_list['mobilenumber']; ?></td>
                                        <td><?php echo $refer_list['email']; ?></td>
                                        <td><span class="badge badge-success"><?php echo $refer_list['status']; ?></span></td>
                                        <td>-00-</td>
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

<div class="modal fade" id="basicModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Referral your Friend</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ref_form" name="ref_form" method="POST">
                    <div class="form-row">
                    <div class="form-group col-md-12">
                            <label>Full Name</label>
                            <input type="text" placeholder="Full Name" class="form-control" name="fullname" id="fullname" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Email</label>
                            <input type="email" placeholder="Email" class="form-control" name="email" id="email" />
                        </div>
                        <div class="form-group col-md-12">
                            <label>Mobile Number</label>
                            <input type="text" placeholder="Mobile Number" class="form-control" name="mobilenumber" id="mobilenumber" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="ref_btn" id="ref_btn">Refer</button>
            </div>
        </div>
    </div>
</div>