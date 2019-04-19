<!--Author: Christopher Thacker-->
<?php require APP_ROOT . '/views/inc/header.php'; ?>
    <br><br><br>
    <div class="row">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URL_ROOT . '/' . POSTS_ADD; ?>"  class="btn btn-primary pull-right">Add Post</a>
        </div>
    </div>
    <?php foreach($_data['posts'] as $post) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?php echo $post->title; ?></h4>
            <div class="bg-light p-2 mb-3">
                Written by <?php echo $post->fname; ?> on <?php echo $post->postCreated; ?>
            </div>
            <p class="card-text">
                <?php echo $post->body; ?>
            </p>
            <a href="<?php echo URL_ROOT . '/' . POSTS_SHOW . '/' . $post->postId; ?>" class="btn btn-dark">More</a>
        </div>
    <?php endforeach; ?>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
