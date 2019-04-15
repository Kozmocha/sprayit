<?php require APP_ROOT . '/views/inc/header.php'; ?>
<div class="row" style="padding-top: 25px;">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h3><?php echo MOTTO; ?></h3>
    </div>
    <div class="col-lg-3"></div>
</div>

<div class="container">
    <form action="<?php echo URL_ROOT; ?>/users/client_register" method="post" style="padding-top: 25px;">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-sm">
                <input type="text" class="form-control <?php echo (!empty($_data['fname_err'])) ? 'is-invalid' : ''; ?>"
                       placeholder="First Name" value="<?php echo $_data['fname']; ?>">
                <span class="invalid-feedback"><?php echo $_data['fname_err']; ?></span>
                <br>
                <input type="text" class="form-control" id="lname" placeholder="Last Name" <?php echo (!empty($_data['lname_err']))
                    ? 'is-invalid' : '';?> value="<?php echo $_data['lname']; ?>">
                <span class="invalid-feedback"><?php echo $_data['lname_err']; ?></span>
                <br>
                <input type="text" class="form-control" id="address" placeholder="Street Address"<?php echo (!empty($_data['address_err']))
                    ? 'is-invalid' : '';?> value="<?php echo $_data['address']; ?>">
                <span class="invalid-feedback"><?php echo $_data['address_err']; ?></span>
                <br>
                <div class="row">
                    <div class="col-sm">
                        <input type="text" class="form-control" id="city" placeholder="City"<?php echo (!empty($_data['city_err']))
                            ? 'is-invalid' : '';?> value="<?php echo $_data['city']; ?>">
                        <span class="invalid-feedback"><?php echo $_data['city_err']; ?></span>
                    </div>
                    <div class="col-sm">
                        <input type="text" class="form-control" id="state" placeholder="State"<?php echo (!empty($_data['state_err']))
                            ? 'is-invalid' : '';?> value="<?php echo $_data['state']; ?>">
                        <span class="invalid-feedback"><?php echo $_data['state_err']; ?></span>
                    </div>
                    <div class="col-sm">
                        <input type="text" class="form-control" id="zip" placeholder="Zip"<?php echo (!empty($_data['zip_err']))
                            ? 'is-invalid' : '';?> value="<?php echo $_data['zip']; ?>">
                        <span class="invalid-feedback"><?php echo $_data['zip_err']; ?></span>
                    </div>
                </div>
                <br>
                <!-- Phone number is not automatically validated by the form type. -->
                <input type="tel" class="form-control" id="phone" placeholder="Phone Number"<?php echo (!empty($_data['phone_err']))
                    ? 'is-invalid' : '';?> value="<?php echo $_data['phone']; ?>">
                <span class="invalid-feedback"><?php echo $_data['phone_err']; ?></span>
            </div>
            <div class="col-sm">
                <input type="email" class="form-control" id="email" placeholder="Email"<?php echo (!empty($_data['email_err']))
                    ? 'is-invalid' : '';?> value="<?php echo $_data['email']; ?>">
                <span class="invalid-feedback"><?php echo $_data['email_err']; ?></span>
                <br>
                <input type="email" class="form-control" id="confirm_email" placeholder="Retype Email"<?php echo (!empty($_data['confirm_email_err']))
                    ? 'is-invalid' : '';?> value="<?php echo $_data['confirm_email']; ?>">
                <span class="invalid-feedback"><?php echo $_data['confirm_email_err']; ?></span>
                <br>
                <input type="password" class="form-control" id="password" placeholder="Password"<?php echo (!empty($_data['password_err']))
                    ? 'is-invalid' : '';?> value="<?php echo $_data['password']; ?>">
                <span class="invalid-feedback"><?php echo $_data['confirm_email_err']; ?></span>
                <br>
                <input type="password" class="form-control" id="confirm_password" placeholder="Verify Password"<?php echo (!empty($_data['confirm_password_err']))
                    ? 'is-invalid' : '';?> value="<?php echo $_data['confirm_password']; ?>">
                <span class="invalid-feedback"><?php echo $_data['confirm_email_err']; ?></span>
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
