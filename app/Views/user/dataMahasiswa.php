<?= $this->extend('user/layout/index'); ?>

<?= $this->section('isi'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <?php if (session()->getFlashdata('check')) : ?>
    <div class="alert alert-success alert-dismissible mt-1">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Success! </strong><?= session()->getFlashdata('check'); ?>
    </div>
  <?php endif ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a class="btn m-0 ml-0 font-weight-bold text-primary" onclick="return false" style="cursor: default;">Data Pengajuan Mahasiswa <?= ($user['role'] == 2) ? 'dari Prodi' : ''; ?></a>
      <div class="float-right">
        <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#tolakSemuaModal" <?= $tolak == false ? 'disabled="disabled"' : ''; ?>><i class="fas fa-trash"></i> Tidak Memenuhi</button>
        <?php if ($user['role'] == 3) : ?>
          <a class="btn btn-primary btn-sm <?= $ready == false ? 'disabled' : ''; ?>" href="/user/data/ajukandariprodi">Ajukan ke Fakultas</a>
        <?php endif; ?>
        <?php if ($user['role'] == 2) : ?>
          <a class="btn btn-primary btn-sm <?= $ready == false ? 'disabled' : ''; ?>" href="/user/data/ajukandarifakultas">Validasi ke BAAk</a>
        <?php endif; ?>
        <?php if ($user['role'] == 1) : ?>
          <a class="btn btn-primary btn-sm <?= $ready == false ? 'disabled' : ''; ?>" href="/user/data/ajukandaribaak">Rilis ke Fakultas</a>
        <?php endif; ?>
      </div>
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
              <th>Verifikasi</th>
              <th>Alasan</th>
              <th>Action</th>
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
                    <td class="text-center"><a href="/user/profilemahasiswa/<?= $mhs->npmmhs ?>" class="button" style="text-decoration: none;">Cek</a></td>
                    <td class="text-center">
                      <?php if ($admin == 'prodi') : ?>
                        <?php switch ($mhs->prodicheck) {
                          case 1:
                            echo '<small class="text-success">Memenuhi</small>';
                            break;
                          case 2:
                            echo '<small class="text-danger">Tidak Memenuhi</small>';
                            break;
                          default:
                            echo '';
                        } ?>
                      <?php elseif ($admin == 'fakultas') : ?>
                        <?php switch ($mhs->fakultascheck) {
                          case 1:
                            echo '<small class="text-success">Memenuhi</small>';
                            break;
                          case 2:
                            echo '<small class="text-danger">Tidak Memenuhi</small>';
                            break;
                          default:
                            echo '';
                        } ?>
                      <?php elseif ($admin == 'baak') : ?>
                        <?php switch ($mhs->baakcheck) {
                          case 1:
                            echo '<small class="text-success">Memenuhi</small>';
                            break;
                          case 2:
                            echo '<small class="text-danger">Tidak Memenuhi</small>';
                            break;
                          default:
                            echo '';
                        } ?>
                      <?php endif ?>
                    </td>

                    <td>
                      <?php if ($admin == 'prodi') {
                        echo $mhs->alasanprodi;
                      } elseif ($admin == 'fakultas') {
                        echo $mhs->alasanfakultas;
                      } elseif ($admin == 'baak') {
                        echo $mhs->alasanbaak;
                      } ?>
                    </td>
                    <td class="text-center">
                      <?php if ($admin == 'prodi') : ?>
                        <button class="btn" data-toggle="modal" data-target="#unfulfilledModal" id="unfulfilledBtn" data-nama="<?= $mhs->nama ?>" data-uri="<?= base_url('/user/data/tolak/' . $mhs->npmmhs) ?>" <?= $mhs->prodicheck == 2 ? '' : 'disabled="disabled"' ?>><i class="fas fa-trash text-danger"></i></button>
                      <?php elseif ($admin == 'fakultas') : ?>
                        <button class="btn" data-toggle="modal" data-target="#unfulfilledModal" id="unfulfilledBtn" data-nama="<?= $mhs->nama ?>" data-uri="<?= base_url('/user/data/tolak/' . $mhs->npmmhs) ?>" <?= $mhs->fakultascheck == 2 ? '' : 'disabled="disabled"' ?>><i class="fas fa-trash text-danger"></i></button>
                      <?php elseif ($admin == 'baak') : ?>
                        <button class="btn" data-toggle="modal" data-target="#unfulfilledModal" id="unfulfilledBtn" data-nama="<?= $mhs->nama ?>" data-uri="<?= base_url('/user/data/tolak/' . $mhs->npmmhs) ?>" <?= $mhs->baakcheck == 2 ? '' : 'disabled="disabled"' ?>><i class="fas fa-trash text-danger"></i></button>
                      <?php endif ?>
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

<div class="modal fade" id="unfulfilledModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Yakin menolak pengajuan yudisium dari
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="" method="POST">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tolakSemuaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Yakin menghapus semua pengajuan yang sudah ditolak?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="/user/data/tidakmemenuhi" method="POST">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>