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
                  <h1 class="h4 text-gray-900 mb-4">Create an Admin Account!</h1>
                </div>

                <?php if (session()->getFlashdata('register')) : ?>
                  <div class="alert alert-success alert-dismissible mt-1 textresponsif">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?= 'Success! '; ?></strong><?= session()->getFlashdata('register'); ?>
                  </div>
                <?php endif ?>

                <!-- action ke controler Auth/register -->
                <form class="user" method="post" action="/registerprocess">
                  <?= csrf_field(); ?>

                  <?php if ($validation->getErrors()) : ?>
                    <div class="alert alert-danger alert-dismissible mt-1 textresponsif">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong><?= 'Error! '; ?></strong><?= "Silakan masukan kembali input yang sesuai."; ?>
                    </div>
                  <?php endif ?>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= old('nama') ?>" id="nama" name="nama" placeholder="Name">
                    <div class="invalid-feedback"><?= $validation->getError('nama'); ?></div>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= old('username') ?>" id="username" name="username" placeholder="Username">
                    <div class="invalid-feedback"><?= $validation->getError('username'); ?></div>
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
                  <div class="form-group mb-2" style="<?= ($validation->hasError('role')) ? 'border: 2px solid #EE8277; border-radius: 20px;' : ''; ?> ">
                    <div class="form-row px-1">
                      <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="1">
                          <label class="form-check-label" for="inlineRadio1">BAAk</label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="2" data-role="datalistfakultas">
                          <label class="form-check-label" for="inlineRadio2">Fakultas</label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="role" id="inlineRadio3" value="3" data-role="datalistprodi">
                          <label class="form-check-label" for="inlineRadio3">Prodi</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <fieldset class="form-group roleadmin" id="datalistfakultas">
                    <div class="row">
                      <div class="col px-3">
                        <input class="form-control form-control-user" list="datalistOptions" name="rolefakultas" placeholder="Fakultas">
                        <datalist id="datalistOptions">
                          <?php foreach ($fakultas as $ye) : ?>
                            <option value="<?= $ye ?>">
                            <?php endforeach; ?>
                        </datalist>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset class="form-group roleadmin" id="datalistprodi">
                    <div class="row">
                      <div class="col px-3">
                        <input class="form-control form-control-user" list="datalistProdi" name="roleprodi" placeholder="Prodi">
                        <datalist id="datalistProdi">
                          <?php sort($prodi); ?>
                          <?php foreach ($prodi as $ya) : ?>
                            <option value="<?= $ya ?>">
                            <?php endforeach; ?>
                        </datalist>
                      </div>
                    </div>
                  </fieldset>

                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Register Account
                  </button>

                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="/user">Back.</a>
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