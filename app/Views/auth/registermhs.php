<?= $this->extend('/auth/index'); ?>

<?= $this->section('auth_content'); ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create a Student Account!</h1>
                </div>
                <?php if ($validation->getErrors()) : ?>
                  <div class="alert alert-danger alert-dismissible mt-1 textresponsif">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?= 'Error! '; ?></strong><?= "Silakan masukan kembali input yang sesuai."; ?>
                  </div>
                <?php endif ?>

                <form class="user" method="post" action="/createmhsprocess">
                  <?= csrf_field(); ?>

                  <div class="form-group">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= $mhs['nama'] ?>" id="nama" name="nama" placeholder="Name" title="Name" readonly>
                    <div class="invalid-feedback"><?= $validation->getError('nama'); ?></div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= $mhs['npm'] ?>" id="username" name="username" placeholder="Username" title="Username" readonly>
                    <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('fakultas')) ? 'is-invalid' : ''; ?>" value="<?= $mhs['fakultas'] ?>" id="fakultas" name="fakultas" placeholder="Fakultas" title="Fakultas" readonly>
                    <div class="invalid-feedback"><?= $validation->getError('fakultas'); ?></div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('prodi')) ? 'is-invalid' : ''; ?>" value="<?= $mhs['prodi'] ?>" id="prodi" name="prodi" placeholder="Prodi" title="Prodi" readonly>
                    <div class="invalid-feedback"><?= $validation->getError('prodi'); ?></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" class="form-control form-control-user <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" id="passwordid1" name="password1" placeholder="Password">
                      <div class="invalid-feedback"><?= $validation->getError('password1'); ?></div>
                    </div>
                    <div class="col-sm-6">
                      <input type="password" class="form-control form-control-user <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" id="passwordid2" name="password2" placeholder="Repeat Password">
                      <div class="invalid-feedback"><?= $validation->getError('password2'); ?></div>
                    </div>
                  </div>
                  <div class="form-group-row mb-2">
                    <input type="checkbox" class="ml-1" onclick="showpass(); showpass2()"> Show Password
                  </div>

                  <input class="form-check-input" type="hidden" id="role_0" name="role" value="4" checked>

                  <br>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Register Account
                  </button>

                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="/registermahasiswa">Cancel.</a>
                </div>
                <div class="text-center">
                  <a class="small" href="/user">Back to Home.</a>
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