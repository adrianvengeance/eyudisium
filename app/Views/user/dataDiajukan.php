<?= $this->extend('user/layout/index'); ?>

<?= $this->section('isi'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn m-0 ml-0 font-weight-bold text-primary" onclick="return false" style="cursor: default;"><?= $title; ?></a>
      <div class="float-right">

        <button class="btn btn-outline-primary btn-sm" id="ExportPdfBtn"><i class="fas fa-download"></i> PDF</button>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">

        <table class="table table-bordered" id="pengajuan" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">No.</th>
              <th>NPM</th>
              <th>Nama</th>
              <th>Prodi</th>
              <th>Fakultas</th>
              <th>Diajukan Pada</th>
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
                    <td class="text-center"><?= $mhs->tanggal; ?></td>
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

<script>
  var text1 = "<?php echo $text1 ?>";
  var text2 = "<?php echo $text2 ?>";
  var text3 = "<?php echo $text3 ?>";
</script>
<?= $this->endSection(); ?>