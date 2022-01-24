<style type="text/css">
    .wallet-wrapper
    {
    text-align: center;
    }
    .float-lg-right
    {
        color: green !important;
    }
    .verify_otp
    {
        text-align: center;
        color: orange !important;
    }
    .resend_otp
    {
        color:red !important;
        float: right;
    }
    .smsCode {
                text-align: center;
                line-height: 30px;
                font-size: 30px;
                border: solid 1px #ccc;
                box-shadow: 0 0 5px #ccc inset;
                width:100%;
                outline: none;
                border-radius: 3px;
                margin-left: 150%;
            }

    .table
    {
        text-align: center;
    }
    .container{
    display: flex;
    flex-flow: column;
    height: 100%;
    align-items: space-around;
    justify-content: center;
}

.userInput{
    display: flex;
    justify-content: center;
}
.container input{
    margin: 10px;
    height: 35px;
    width: 65px;
    border: none;
    border-radius: 5px;
    text-align: center;
    font-family: arimo;
    font-size: 1.2rem;
    background: #eef2f3;

}


    
</style>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">User Details</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item active">User Details</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right">
                    <button class="btn btn-primary round btn-min-width mr-1 mb-1" type="button" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#iconModal" id="user_model"><i class="ft-plus"></i>  <i class="la la-user"></i> Add User</button>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">User Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle" name="user_table" id="user_table">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Pin</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- END: Content-->
<!-- Modal -->
<div class="modal fade text-left" id="iconModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2"><i class="la la-road2"></i> User Registration</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-content collpase show">
                    <div class="card-body">
                        <form class="form" method="post" name="add_user_form" id="add_user_form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="form-group col-6 mb-2">
                                        <label for="fisrt_name">Fisrt Name</label>
                                        <input type="text" id="fisrt_name" class="form-control" placeholder="Fisrt Name" name="first_name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="First Name">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" id="last_name" class="form-control" placeholder="Last Name" name="last_name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Last Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 mb-2">
                                        <label for="email_id">Email</label>
                                        <input type="text" id="email_id" class="form-control" placeholder="Email" name="email_id" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 mb-2">
                                        <label for="mobile_number">Mobile Number</label>
                                        <input type="text" id="mobile_number" class="form-control" placeholder="Mobile Number" name="mobile_number" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Mobile Number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 form-group m-lg-n1 mb-2"> <a class="float-lg-right"> Send OTP</a>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="form-group col-12 mb-2 ">
                                        <label for="otp">OTP</label>
                                        <div id="SMSArea" class="row SMSArea">
                                            <div class="col-2">
                                                <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                                            </div>
                                            <div class="col-2">
                                                <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                                            </div>
                                            <div class="col-2">
                                                <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                                            </div>
                                            <div class="col-2">
                                                <input type="text" maxlength="1" size="1" min="0" max="9" pattern="[0-9]{1}" class="smsCode text-center rounded-lg" />
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="form-group col-12 mb-2 ">
                                        <label for="otp">OTP</label>
                                        <div class="container">
                                            <div class="text-white userInput">
                                                <input type="text" id='ist' maxlength="1"  size="1" min="0" max="9" pattern="\d{0,9}" onkeyup="clickEvent(this,'sec')" onkeypress=" return isNumber(event)">
                                                <input type="text" id="sec" maxlength="1"  size="1" min="0" max="9" pattern="[0-9]" onkeyup="clickEvent(this,'third')" onkeypress=" return isNumber(event)">
                                                <input type="text" id="third" maxlength="1"  size="1" min="0" max="9" pattern="[0-9]" onkeyup="clickEvent(this,'forth')" onkeypress=" return isNumber(event)">
                                                <input type="text" id="forth" maxlength="1"  size="1" min="0" max="9" pattern="[0-9]" onkeypress=" return isNumber(event)">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                

                                <div class="row">
                                    <div class="col-6 form-group mb-2 verify_otp"> 
                                        <a class="verify_otp">Verify Otp</a>
                                    </div>
                                     <div class="col-6 form-group mb-2 resend_otp"> 
                                        <a class="resend_otp">Resend Otp</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6 mb-2">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" class="form-control" placeholder="Password" name="password" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Password">
                                    </div>
                                    <div class="form-group col-6 mb-2">
                                        <label for="conf_password">Confirm Password</label>
                                        <input type="password" id="conf_password" class="form-control" placeholder="Confirm Password" name="conf_password" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Confirm Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1"> <i class="ft-x"></i> Cancel</button>
                                <button type="submit" class="btn btn-primary"> <i class="la la-check-square-o"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function clickEvent(first,last){
            if(first.value.length){
                document.getElementById(last).focus();
            }

        }
    function isNumber(evt)
         {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true; }     
</script>