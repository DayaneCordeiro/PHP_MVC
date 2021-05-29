<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-header">
            <h2>Register</h2>
        </div>
        <div class="card-body">
            <p class="card-text"><small>Fill out the form below to register.</small></p>

            <form name="form_user_register" method="POST" action="" class="mt-4">
                <div class="form-group">
                    <label for="name">Name: <sup class="text-danger">*</sup></label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail: <sup class="text-danger">*</sup></label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup class="text-danger">*</sup></label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm the Password: <sup class="text-danger">*</sup></label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>

                <divc class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-info btn-block">
                    </div>
                    <div class="col">
                        <a href="#">Do you already have an account? Sign in.</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>