<?= $this->extend('/auth/index'); ?>

<?= $this->section('auth_content'); ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Profile <?= $user['nama']; ?></h1>
                                </div>
                                <div class="card mb-3">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <!-- <img src="..." class="card-img" alt="..."> -->
                                            <i class="fas fa-10x fa-user mt-1" style="display: inline-block; width: 100%; height: 100%; text-align: center; vertical-align: bottom; color:#3B61D1;"></i>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <form class="" action="/profile/edit/changepassprocess" method="post">
                                                    <?= csrf_field(); ?>
                                                    <?php if (session()->getFlashdata('errorpass')) : ?>
                                                        <div class="alert alert-danger alert-dismissible mt-1">
                                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                            <strong>Error! </strong><?= session()->getFlashdata('errorpass'); ?>
                                                        </div>
                                                    <?php endif ?>
                                                    <div class="form-group row">
                                                        <label for="oldpass" class="col-sm-5 col-form-label">Old Password</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" name="oldpassword" class="form-control <?= $validation->hasError('oldpassword') ? 'is-invalid' : ''; ?>" id="oldpass">
                                                            <div class="invalid-feedback"><?= $validation->getError('oldpassword'); ?></div>
                                                            <input type="checkbox" onclick="spass('oldpass');" class="mt-1"> Show password
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="password1" class="col-sm-5 col-form-label">New Password</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control <?= $validation->hasError('password1') ? 'is-invalid' : ''; ?>" id="password1" name="password1">
                                                            <div class="invalid-feedback"><?= $validation->getError('password1'); ?></div>
                                                            <input type="checkbox" onclick="spass('password1');" class="mt-1"> Show password
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="password2" class="col-sm-5 col-form-label">Verify Password</label>
                                                        <div class="col-sm-7">
                                                            <input type="password" class="form-control <?= $validation->hasError('password2') ? 'is-invalid' : ''; ?>" id="password2" name="password2">
                                                            <div class="invalid-feedback"><?= $validation->getError('password2'); ?></div>
                                                            <input type="checkbox" onclick="spass('password2');" class="mt-1"> Show password
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary" value="Change" name="" id="">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <hr> -->
                                <div class="text-center">
                                    <a class="small" href="/profile">Cancel.</a>
                                </div>
                                <div class="text-center">
                                    <?php if ($user['role'] != 4) : ?>
                                        <a class="small" href="/user">Back to Home.</a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>