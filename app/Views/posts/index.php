<div class="container py-5">
<?= Session::alert('posts') ?>
    <div class="card">
        <div class="card-header bg-secondary text-white">
            POSTS
            <div class="float-right">
                <a href="<?= URL ?>/posts/register" class="btn btn-success">Create post</a>
            </div>
        </div>
        <div class="card-body">
            <p>List posts here.</p>
        </div>
    </div>
</div>