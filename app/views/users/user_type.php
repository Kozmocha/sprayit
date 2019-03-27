<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row" style="padding-top: 25px;">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h3><?php echo $_data['description']; ?></h3>
        <br>
        <h3><?php echo $_data['instructions']; ?></h3>
        <br>
        <br>
        <form action="" method="post" style="padding-top 25px;" onsubmit="checkRadio()">
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
            <h6><a href="<?php echo URLROOT; ?>/users/login">Have an account? Login</a></h6>
        </form>
    </div>
</div>
<script>
    function checkRadio() {
        <?php
        if($_POST["user_type"] == "client")
        {
            header("Location: client_register");
            exit;
        }

        if($_POST["user_type"] == "contractor")
        {
            header("Location: contractor_register");
            exit;
        }
        ?>
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
