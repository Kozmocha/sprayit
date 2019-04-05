<?php require APP_ROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-12">
        <div class="error-template">
            <br><br><br>
            <h2>404 Not Found</h2>
            <div class="error-details">
                Sorry, an error has occurred, Requested page not found!
            </div>
            <br><br><br>
            <div class="error-actions">
                <a href="<?php echo URL_ROOT; ?>/users/login" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                    Back to Login </a>
            </div>
        </div>
    </div>
</div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
