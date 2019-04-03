<?php require APP_ROOT . '/views/inc/header.php'; ?>
<div class="row" style="padding-top: 25px;">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <h3><?php echo $_data['description']; ?></h3>
        <p>Hello, <?php echo $_SESSION['user_email']; ?></p>
    </div>
    <div class="col-lg-3"></div>
</div>
<div class="col-md-6">
    <!--
    <iframe src="https://calendar.google.com/calendar/embed?src=ioannisbatsios%40gmail.com&ctz=America%2FNew_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    -->
</div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>