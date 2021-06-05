<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h2>Register</h2>
        </div>
        <div class="card-body">
            <p class="card-text"><small>Fill out the form below to register.</small></p>

            <form name="form_user_register" method="POST" action="<?= URL ?>/users/register" class="mt-4">
                <div class="form-group">
                    <label for="name">Name: <sup class="text-danger">*</sup></label>
                    <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control <?=(isset($data["name_error"])) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= isset($data['name_error']) ? $data['name_error'] : null ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail: <sup class="text-danger">*</sup></label>
                    <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control <?=(isset($data["email_error"])) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                    <?= isset($data['email_error']) ? $data['email_error'] : null ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup class="text-danger">*</sup></label>
                    <input type="password" name="password" value="<?= $data['password'] ?>" class="form-control <?=(isset($data["password_error"])) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                    <?= isset($data['password_error']) ? $data['password_error'] : null ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm the Password: <sup class="text-danger">*</sup></label>
                    <input type="password" name="confirm_password" value="<?= $data['confirm_password'] ?>" class="form-control <?=(isset($data["confirm_password_error"])) ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= isset($data['confirm_password_error']) ? $data['confirm_password_error'] : null ?>
                    </div>
                </div>

                <divc class="row">
                    <div class="col-md-6">
                        <input type="submit" value="Register" class="btn btn-info btn-block">
                    </div>
                    <div class="col-md-6">
                        <a href="<?= URL ?>/users/login">Do you already have an account? Sign in.</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>