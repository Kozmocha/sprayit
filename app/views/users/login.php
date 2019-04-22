<!--Author: Ioannis Batsios-->
<?php require APP_ROOT . '/views/inc/header.php'; ?>
<div class="row" style="padding-top: 25px;">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <h3><?php echo MOTTO; ?></h3>
    </div>
    <div class="col-lg-2"></div>
</div>
<form action="<?php echo URL_ROOT . '/' . LOGIN_PATH; ?>" method="post" style="padding-top: 25px;">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="form-group col-lg-4">
            <input name="email" type="email" class="form-control" id="email" placeholder="email">
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
    <div class="row" style="padding-top: 15px;">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <button class="btn btn-primary" style="width: 100%;" type="submit">Sign In</button>
        </div>
        <div class="col-lg-4"></div>
    </div>
</form>
<div class="row" style="padding-top: 25px;">
    <div class="col-lg-4"></div>
    <br>
    <div class="col-lg-4"><h5>Don't have an account?</h5></div>
    <div class="col-lg-4"></div>
</div>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4"><a href="<?php echo URL_ROOT . '/' . REGISTER_PATH; ?>" class="red">Register Here</a></div>
    <div class="col-lg-4"></div>
</div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
