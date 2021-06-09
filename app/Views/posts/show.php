<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $data['post']->title ?></li>
        </ol>
    </nav>

    <div class="jumbotron">
        <h3 class="display-4"><?= $data['post']->title ?></h3>
        <small>Created by: <?= $data['post']->name ?> <br> <?= Validation::convertDate($data['post']->date) ?></small>
        <hr class="my-4">
        <p><?= $data['post']->text ?></p>

        <?php
        if ($data['post']->id_user == $_SESSION['user_id']) {
        ?>

        <a href="<?= URL . '/posts/update/' . $data['post']->id_post ?>" class="btn btn-sm btn-warning">Edit</a>

        <?php
        }
        ?>
    </div>
</div>