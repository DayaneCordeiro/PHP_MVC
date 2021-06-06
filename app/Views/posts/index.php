<div class="container py-5">
<?= Session::alert('posts') ?>
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h2>POSTS</h2>
            <div class="float-right">
                <a href="<?= URL ?>/posts/register" class="btn btn-success">Create post</a>
            </div>
        </div>
        <div class="card-body">
            <?php
            foreach($data['posts'] as $post) {
            ?>

                <div class="card my-5">
                    <div class="card-header">
                        <h3><?= $post->title ?></h3>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?= $post->text ?></p>
                        <a href="#" class="btn btn-primary float-right">Read more</a>
                    </div>
                    <div class="card-footer text-muted">
                        <small> Created by: <?= $post->name ?> <br> <?= date('Y/m/d H:i', strtotime($post->date_post)) ?></small>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
</div>