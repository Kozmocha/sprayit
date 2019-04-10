<?php require APP_ROOT . '/views/inc/header.php'; ?>
<div class="row" style="padding-top: 25px;">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h3><?php echo MOTTO; ?></h3>
    </div>
    <div class="col-lg-3"></div>
</div>
<?php
$_data = ['coname'=>''];
?>
<div class="container">
    <form action="<?php echo URL_ROOT; ?>/users/contractor_register" method="post" style="padding-top: 25px;">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-sm">
                <input type="text" class="form-control <?php echo (!empty($_data['coname_err'])) ? 'is-invalid' : ''; ?>"
                       placeholder="Company Name" value="<?php echo $_data['coname']; ?>">
                <span class="invalid-feedback"><?php echo $_data['coname_err']; ?></span>
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
            <button type="submit" class="col-lg-4 btn btn-primary">Register</button>
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
    <div class="col-lg-4"><a href="<?php echo URL_ROOT; ?>/users/login" class="red">Login Here</a></div>
    <div class="col-lg-4"></div>
</div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
