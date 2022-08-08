<?= $this->extend('user/layout/index'); ?>

<?= $this->section('isi'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn m-0 ml-0 font-weight-bold text-primary" onclick="return false" style="cursor: default;">Data History Yudisium</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th>NPM</th>
              <th>Nama</th>
              <th>Prodi</th>
              <th>Fakultas</th>
              <th>Berkas</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!is_null($data)) : ?>
              <?php $index = 1; ?>
              <?php foreach ($data as $n => $mhs) : ?>
                <tr>
                  <td class="text-center"><?= $n + 1; ?></td>
                  <td><?= $mhs['npmmhs']; ?></td>
                  <td><?= $mhs['nama']; ?></td>
                  <td><?= $mhs['prodi']; ?></td>
                  <td><?= $mhs['fakultas']; ?></td>
                  <td class="text-center"><a href="/user/history/profile/<?= $mhs['npmmhs'] ?>" class="button" style="text-decoration: none;">Lihat</a></td>
                  <td><?= $mhs['tanggal']; ?></td>
                </tr>
              <?php endforeach ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>