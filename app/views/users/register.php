<!--Author: Ioannis Batsios-->
<?php require APP_ROOT . '/views/inc/header.php'; ?>
<div class="row" style="padding-top: 25px;">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h3><span class="green"> Fill</span> out this <span class="red"> form</span> to <span class="blue"> register</span> with <span class="orange"> us</span>.</h3>
    </div>
    <div class="col-lg-3"></div>
</div>
<form action="<?php echo URL_ROOT . '/' . REGISTER_PATH; ?>" method="post" style="padding-top: 25px;">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="form-group col-lg-4">
            <input type="name" class="form-control" id="fname" placeholder="First Name">
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="form-group col-lg-4">
            <input type="name" class="form-control" id="lname" placeholder="Last Name">
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="form-group col-lg-4">
            <input type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="form-group col-lg-4">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="form-group col-lg-4">
            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row" style="padding-top: 15px;">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <button class="btn btn-success" style="width: 100%;" type="submit">Register</button>
        </div>
        <div class="col-lg-4"></div>
    </div>
</form>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
