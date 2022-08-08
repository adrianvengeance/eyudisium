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
                  <h1 class="h4 text-gray-900 mb-4">Search for the Student!</h1>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                  <div class="alert alert-danger alert-dismissible mt-1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?= session()->getFlashdata('pesan'); ?></strong>
                  </div>
                <?php endif ?>
                <?php if (session()->getFlashdata('createaccount')) : ?>
                  <div class="alert alert-success alert-dismissible mt-1">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?= session()->getFlashdata('createaccount'); ?></strong>
                  </div>
                <?php endif ?>
                <form action="/findmhs" method="post">
                  <?= csrf_field(); ?>
                  <div class="input-group textresponsif">
                    <input type="text" id="cari" name="cari" placeholder="Masukan NPM.." class="form-control" autofocus>
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </span>
                  </div>
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