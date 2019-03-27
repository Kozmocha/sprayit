<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row" style="padding-top: 25px;">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h3><?php echo $_data['description']; ?></h3>
    </div>
    <div class="col-lg-3"></div>
</div>
<div class="container">
    <form action="" method="post" style="padding-top: 25px;">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-sm">
                <input type="text" class="form-control" id="companyname" placeholder="Company Name">
                <br>
                <!-- TODO: define services somewhere and make services a drop-down menu -->
                <input type="text" class="form-control" id="service" placeholder="Services">
                <br>
                <input type="text" class="form-control" id="address" placeholder="Street Address">
                <br>
                <div class="row">
                    <div class="col-sm">
                        <input type="text" class="form-control" id="city" placeholder="City">
                    </div>
                    <div class="col-sm">
                        <input type="text" class="form-control" id="state" placeholder="State">
                    </div>
                    <div class="col-sm">
                        <input type="text" class="form-control" id="zip" placeholder="Zip">
                    </div>
                </div>
                <br>
                <!-- Phone number is not automatically validated by the form type. -->
                <input type="tel" class="form-control" id="phone" placeholder="Phone Number">
            </div>
            <div class="col-sm">
                <input type="email" class="form-control" id="email" placeholder="Email">
                <br>
                <input type="email" class="form-control" id="confirm_email" placeholder="Retype Email">
                <br>
                <input type="text" class="form-control" id="password" placeholder="Password">
                <br>
                <input type="text" class="form-control" id="confirm_password" placeholder="Verify Password">
            </div>
            <div class="col-lg-3"></div>
        </div>
        <br>
        <div class="row" style="padding-top: 15px;">
            <div class="col-lg-4"></div>
            <input type="submit" value="Register" class="col-lg-4 btn btn-primary">
            <div class="col-lg-4"></div>
        </div>
    </form>
</div>
<div class="row" style="padding-top: 25px;">
    <div class="col-lg-4"></div>
    <div class="col-lg-4"><h5>Already have an account?</h5></div>
    <div class="col-lg-4"></div>
</div>
<div class="row" style="padding-bottom: 30px;">
    <div class="col-lg-4"></div>
    <div class="col-lg-4"><a href="<?php echo URLROOT; ?>/users/login" class="red">Login Here</a></div>
    <div class="col-lg-4"></div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
