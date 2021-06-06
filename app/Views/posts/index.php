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

                <div class="jumbotron">
                    <h3 class="display-4"><?= $post->title ?></h3>
                    <small>Created by: <?= $post->name ?> <br> <?= Validation::convertDate($post->date) ?></small>
                    <hr class="my-4">
                    <p><?= $post->text ?></p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="<?= URL . "/posts/show/" . $post->id_post ?>" role="button">Read more</a>
                    </p>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
</div>