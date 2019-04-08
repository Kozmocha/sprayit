<?php require APP_ROOT . '/views/inc/header.php'; ?>
<div class="row" style="padding-top: 25px;">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h3><?php echo MOTTO ?></h3>
        <br>
        <h3><?php echo TYPE_INSTRUCTIONS ?></h3>
        <br>
        <br>
        <form action="<?php echo URL_ROOT; ?>/users/user_type" method="post" style="padding-top 25px;">
            <div class="radio">
                <label><input type="radio" name="user_type" value="client"> Client</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="user_type" value="contractor"> Contractor</label>
            </div>
            <br>
            <div class="row" style="padding-top: 15px;">
                <div class="col-lg-4"></div>
                <input type="submit" value="Create Account" class="col-lg-4 btn btn-primary">
                <div class="col-lg-4"></div>
            </div>
            <br>
            <h6><a href="<?php echo URL_ROOT; ?>/users/login">Have an account? Login</a></h6>
        </form>
    </div>
</div>

<?php require APP_ROOT . '/views/inc/footer.php'; ?>
