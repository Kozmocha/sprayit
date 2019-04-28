<!--Author: Ioannis Batsios-->
<?php require APP_ROOT . '/views/inc/header.php'; ?>
<h2><span class="blue">Water</span><span class="green">cooler</span></h2>
<div class="row" style="padding-bottom: 50px;">
    <div class="col-md-12">
        <form action="<?php echo URL_ROOT . '/' . POSTS_ADD; ?>" method="post" style="padding-top: 25px;">
            <div class="row" style="margin-bottom: -40px;">
                <div class="form-group col-lg-12">
                    <input name="title" class="form-control" id="title" placeholder="Title">
                    <br>
                    <input name="body" class="form-control" id="body" placeholder="Spray It">
                </div>
            </div>
    </div>
</div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>