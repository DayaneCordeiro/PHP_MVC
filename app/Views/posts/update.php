<div class="col-md-8 mx-auto p-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h2>Edit Post</h2>
        </div>
        <div class="card-body">
            <form name="form_posts_edit" method="POST" action="<?= URL ?>/posts/update/<?= $data['id_post'] ?>" class="mt-4">
                <div class="form-group">
                    <label for="title">Title: <sup class="text-danger">*</sup></label>
                    <input type="text" name="title" value="<?= $data['title'] ?>" class="form-control <?=(isset($data["title_error"])) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= isset($data['title_error']) ? $data['title_error'] : null ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">Text: <sup class="text-danger">*</sup></label>
                    <textarea class="form-control <?=(isset($data["text_error"])) ? 'is-invalid' : '' ?>" name="text" rows="5">
                        <?= $data['text'] ?>
                    </textarea>
                    <div class="invalid-feedback">
                        <?= isset($data['text_error']) ? $data['text_error'] : null ?>
                    </div>
                </div>

                <divc class="row">
                    <div class="col-md-2">
                        <input type="submit" value="Save" class="btn btn-info btn-block">
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>