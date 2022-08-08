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
                  <h1 class="h4 text-gray-900 mb-4">Profile</h1>
                </div>
                <?php if (session()->getFlashdata('pass')) : ?>
                  <div class="alert alert-success alert-dismissible mt-1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success! </strong><?= session()->getFlashdata('pass'); ?>
                  </div>
                <?php endif ?>
                <div class="card mb-3">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <i class="fas fa-10x fa-user mt-1" style="display: inline-block; width: 100%; height: 100%; text-align: center; vertical-align: bottom; color:#3B61D1;"></i>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <dl class="row">
                          <dt class="col-sm-4">Name</dt>
                          <dd class="col-sm-8"><?= $user['nama']; ?></dd>

                          <dt class="col-sm-4">Username</dt>
                          <dd class="col-sm-8"><?= $user['username']; ?></dd>

                          <dt class="col-sm-4">Role</dt>
                          <dd class="col-sm-8"><?php switch ($user['role']) {
                                                  case 1:
                                                    echo "Admin BAAk";
                                                    break;
                                                  case 2:
                                                    echo "Admin Fakultas";
                                                    break;
                                                  case 3:
                                                    echo "Admin Prodi";
                                                    break;
                                                  case 4:
                                                    echo "Mahasiswa";
                                                    break;
                                                  default:
                                                    echo "";
                                                } ?></dd>
                          <?php if ($user['role'] == 3) : ?>
                            <dt class="col-sm-4">Prodi</dt>
                            <dd class="col-sm-8"><?= $user['roleprodi']; ?></dd>
                          <?php endif; ?>
                          <?php if ($user['role'] == 2) : ?>
                            <dt class="col-sm-4">Fakultas</dt>
                            <dd class="col-sm-8"><?= $user['rolefakultas']; ?></dd>
                          <?php endif; ?>

                        </dl>
                        <a href="/profile/edit" class="btn btn-secondary btn-sm py-0">Change password</a>
                        <a href="" data-toggle="modal" data-target="#logoutModalNew" class="btn btn-danger btn-sm py-0 inline">Logout</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <hr> -->
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