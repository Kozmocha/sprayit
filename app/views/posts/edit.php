<!--Author: Ioannis Batsios-->
<?php require APP_ROOT . '/views/inc/header.php'; ?>
<h2><span class="blue">Water</span><span class="green">cooler</span></h2>
<form action="<?php echo URL_ROOT . '/' . POSTS_EDITED . '/' . $_data['posts']->post_uuid; ?>" method="post" style="padding-top: 25px;">
    <div class="row" style="margin-bottom: -40px;">
        <div class="form-group col-lg-12">
            <input name="title" class="form-control" id="title" value="<?php echo $_data['posts']->title; ?>">
            <br>
            <input name="body" class="form-control" id="body" value="<?php echo $_data['posts']->body; ?>">
        </div>
    </div>
    <div class="row" style="padding-bottom: 25px;"><div class="col-lg-12"></div> </div>
    <div class="row" style="padding-bottom: 25px;"><div class="col-lg-12"></div> </div>
    <div class="row" style="padding-bottom: 25px;">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <button class="btn btn-secondary" style="width: 100%;" type="submit">Edit Post</button>
        </div>
        <div class="col-lg-4"></div>
    </div>
</form>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
