<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row" style="padding-top: 25px;">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h3><?php echo $data['description']; ?></h3>
        <br>
        <h3><?php echo $data['instructions']; ?></h3>
        <br>
        <br>
        <form action="<?php echo URLROOT; ?>/users/user_type" method="post" style="padding-top 25px;">
            <div class="radio">
                <label><input type="radio" name="user_type" checked> Client</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="user_type"> Contractor</label>
            </div>
            <br>
            <div class="col">
                <input type="submit" value="Create Account">
            </div>
            <br>
            <h6><a href="<?php echo URLROOT; ?>/users/login">Have an account? Login</a></h6>
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
