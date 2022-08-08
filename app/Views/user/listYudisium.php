<?= $this->extend('user/layout/index'); ?>

<?= $this->section('isi'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <?php if (session()->getFlashdata('calon')) : ?>
    <div class="alert alert-success alert-dismissible mt-1">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Success! </strong><?= session()->getFlashdata('calon'); ?>
    </div>
  <?php endif ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn m-0 ml-0 font-weight-bold text-primary" onclick="return false" style="cursor: default;">Calon Peserta Yudisium</a>
      <div class="float-right">
        <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#clearPengajuanModal"><i class="fas fa-trash"></i> Bersihkan</button>
        <button class="btn btn-outline-success btn-sm" id="excelListYudisium"><i class="fas fa-download"></i> Excel</button>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive" id="tab">
        <table class="table table-bordered" id="rilisSK" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th>NPM</th>
              <th>Nama</th>
              <th>Prodi</th>
              <th>Fakultas</th>
              <th id="adminCek">Prodi Check</th>
              <th id="adminCek">Fakultas Check</th>
              <th id="adminCek">BAAk Check</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!is_null($data)) : ?>
              <?php $index = 1; ?>
              <?php foreach ($data as $n => $mhs) : ?>
                <form action="/user/dataupdate" method="POST" id="update_<?= $index ?>">
                  <?= csrf_field(); ?>
                  <tr>
                    <td class="text-center"><?= $n + 1; ?></td>
                    <td><?= $mhs->npmmhs; ?></td>
                    <td><?= $mhs->nama; ?></td>
                    <td><?= $mhs->prodi; ?></td>
                    <td><?= $mhs->fakultas; ?></td>
                    <td class="text-center" id="adminCek">
                      <?= $mhs->prodicheck != 1 ? '<i class="far fa-times-circle text-danger"></i>' : '<i class="far fa-check-circle text-success"></i>'; ?>
                    </td>
                    <td class="text-center" id="adminCek">
                      <?= $mhs->fakultascheck != 1 ? '<i class="far fa-times-circle text-danger"></i>' : '<i class="far fa-check-circle text-success"></i>'; ?>
                    </td>
                    <td class="text-center" id="adminCek">
                      <?= $mhs->baakcheck != 1 ? '<i class="far fa-times-circle text-danger"></i>' : '<i class="far fa-check-circle text-success"></i>'; ?>
                    </td>
                  </tr>
                </form>
              <?php endforeach ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="clearPengajuanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Yakin membersihkan daftar calon peserta Yudisium?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="/user/list/clear" method="POST">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-primary">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>