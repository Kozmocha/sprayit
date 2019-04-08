<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row" style="padding-top: 25px;">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h3><?php echo MOTTO; ?></h3>
    </div>
    <div class="col-lg-3"></div>
</div>
<form action="<?php echo URLROOT; ?>/users/login" method="post" style="padding-top: 25px;">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="form-group col-lg-4">
            <input type="email" class="form-control" id="email">
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="form-group col-lg-4">
            <input type="password" class="form-control" id="password">
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row" style="padding-top: 15px;">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <button class="btn btn-primary" style="width: 100%;" type="submit">Sign In</button>
        </div>
        <div class="col-lg-4"></div>
    </div>
</form>
<div class="row">

    <div class="col-lg-4 col-md-4"></div>
    <div class="col-lg-4 col-md-4">
        <br>
        <form action="<?php echo URLROOT; ?>/users/google_login" method="post">
            <button class="btn btn-danger" style="width: 100%;" type="submit">
                <span class="fab fa-google"></span>&nbsp;&nbsp;<div class="vl"></div>&nbsp; Log In With Google
            </button>
        </form>
    </div>
    <div class="col-lg-4 col-md-4"></div>
</div>
<div class="row" style="padding-top: 25px;">
    <div class="col-lg-4"></div>
    <br>
    <div class="col-lg-4"><h5>Don't have an account?</h5></div>
    <div class="col-lg-4"></div>
</div>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4"><a href="<?php echo URLROOT; ?>/users/user_type" class="red">Register Here</a></div>
    <div class="col-lg-4"></div>
</div>
<div class="row" style="padding-top: 50px;">
    <div class="col-lg-4"></div>
    <div class="col-lg-4"><h6><a href="#">Forgot password?</a></h6></div>
    <div class="col-lg-4"></div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
