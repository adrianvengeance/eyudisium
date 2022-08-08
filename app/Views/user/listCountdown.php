<?= $this->extend('user/layout/index'); ?>

<?= $this->section('isi'); ?>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py3">
      <h6 class="m-0 font-weight-bold text-primary">Periode Yudisium Fakultas</h6>
      <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success alert-dismissible mt-2 mb-0">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success! </strong><?= session()->getFlashdata('pesan'); ?>
        </div>
      <?php endif ?>
    </div>

    <div class="row justify-content-center">
      <?php if (!is_null($data)) : ?>
        <?php foreach ($data as $fk) : ?>
          <div class="col-md-6 card-body">
            <div class="card">
              <form action="#">
                <fieldset disabled="disabled">
                  <?= csrf_field(); ?>
                  <div class="card-header">
                    <h5 class="text-primary mb-0"><?= $fk['nama'] ?></h5>
                  </div>
                  <div class="card-body pb-1">
                    <dl class="row mb-0">
                      <dt class="col-sm-3">Status</dt>
                      <dd class="col-sm-9"> <?= $fk['status']; ?></dd>
                      <dt class="col-sm-3">Periode</dt>
                      <dd class="col-sm-9"><input class="text-wrap" type="datetime-local" name="datetime" value="<?= date('Y-m-d\TH:i:s', strtotime($fk['waktu'])) ?>" step="any" style="height: 25px; color: #9C9EAA;"></dd>
                    </dl>
                    <div class="col-sm-5 mx-auto mt-3">
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-sm btn-block" value="Set">
                      </div>
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        <?php endforeach ?>
      <?php endif ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>