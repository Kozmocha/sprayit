<!--Author: Christopher Thacker-->
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
    <div class="row" style="padding-bottom: 25px;">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <button class="btn btn-secondary" style="width: 100%;" type="submit">Add Post</button>
        </div>
        <div class="col-lg-4"></div>
    </div>
            </form>
    <?php foreach($_data['posts'] as $post) : ?>
        <div class="row">
            <div class="card card-body mb-3">
            <div class="bg-light p-2 mb-3" style="text-align: left;">
                Written by <?php echo $post->fname; echo " " . $post->lname; ?> on <?php echo $post->postCreated; ?>
                <div class="delete" style="float: right;">
                    <div class="btn-group open">
                        <a class="btn btn-secondary" href="#"><i class="icon-user">Edit</i></a>
                        <a class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="icon-caret-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo URL_ROOT . '/' . EDIT_POST; ?>"><i class="icon-fixed-width icon-pencil"></i> Edit</a></li>
                            <li><a href="#"><i class="icon-fixed-width icon-trash"></i> Delete</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <h4 class="card-title"><?php echo $post->title; ?></h4>
            <p class="card-text">
                <?php echo $post->body; ?>
            </p>
            <a href="<?php echo URL_ROOT . '/' . POSTS_SHOW . '/' . $post->postId; ?>" class="btn btn-dark">More</a>
        </div>
        </div>
    <?php endforeach; ?>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
