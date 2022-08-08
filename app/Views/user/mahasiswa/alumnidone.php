<?= $this->extend('user/mahasiswa/layout/indexmhs'); ?>

<?= $this->section('isi'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row justify-content-center">

    <div class="col-md-10 card shadow mb-4">

      <div class="card-body">

        <div class="card">
          <div class="row no-gutters">
            <div class="col">
              <div class="card-body">
                <div class="container px-2">
                  <div class="row align-items-center bg-primary" style="height: 50px;">
                    <div class="col-md-12 text-center text-white font-weight-bold inline">Data Alumni <?= $mhs['nama']; ?>
                      <a class="float-right text-white" href="/user/mahasiswa/download/alumni" target="_blank"><i class="fas fa-download"></i></a>
                    </div>
                  </div>
                  <div class="card my-3" style="width: auto;">
                    <div class="row ">
                      <div class="col-md-4">
                        <img src="<?= base_url('/berkas/' . $alumni['npmmhs'] . '/dataalumni/' . $alumni['foto']); ?>" class="card-img" alt="<?= $alumni['foto']; ?>">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <dl class="row">
                            <dt class="col-sm-5">Nama</dt>
                            <dd class="col-sm-7"><?= $mhs['nama']; ?></dd>
                            <dt class="col-sm-5">NPM</dt>
                            <dd class="col-sm-7"><?= $mhs['npm']; ?></dd>
                            <dt class="col-sm-5">Tempat, Tanggal lahir</dt>
                            <dd class="col-sm-7"><?= $alumni['tempatlahir'] . ', ' . date("d F Y", strtotime($alumni['tanggallahir'])); ?></dd>
                            <dt class="col-sm-5">Asal Sekolah</dt>
                            <dd class="col-sm-7"><?= $alumni['asalsekolah']; ?></dd>
                            <dt class="col-sm-5">Alamat Rumah</dt>
                            <dd class="col-sm-7"><?= $alumni['alamatrumah']; ?></dd>
                            <?php if ($alumni['alamatkantor'] != '') : ?>
                              <dt class="col-sm-5">Alamat Kantor</dt>
                              <dd class="col-sm-7"><?= $alumni['alamatkantor']; ?></dd>
                            <?php endif; ?>
                            <dt class="col-sm-5">Nama <?= $alumni['ortu']; ?></dt>
                            <dd class="col-sm-7"><?= $alumni['namaortu']; ?></dd>
                            <dt class="col-sm-5">Judul <?= $alumni['jenista']; ?></dt>
                            <dd class="col-sm-7"><?= $alumni['judulid']; ?></dd>
                            <dt class="col-sm-5"><abbr title="dalam bahasa Inggris">Judul <?= $alumni['jenista']; ?></abbr></dt>
                            <dd class="col-sm-7"><?= $alumni['judulen']; ?></dd>
                            <dt class="col-sm-5">Dosen Pembimbing I</dt>
                            <dd class="col-sm-7"><?= $alumni['dosbim1']; ?></dd>
                            <dt class="col-sm-5">Dosen Pembimbing II</dt>
                            <dd class="col-sm-7"><?= $alumni['dosbim2']; ?></dd>
                            <dt class="col-sm-5">Dosen Penguji I</dt>
                            <dd class="col-sm-7"><?= $alumni['penguji1']; ?></dd>
                            <dt class="col-sm-5">Dosen Penguji II</dt>
                            <dd class="col-sm-7"><?= $alumni['penguji2']; ?></dd>
                            <dt class="col-sm-5">Dosen Penguji III</dt>
                            <dd class="col-sm-7"><?= $alumni['penguji3']; ?></dd>
                            <dt class="col-sm-5">Tahun Lulus</dt>
                            <dd class="col-sm-7"><?= $alumni['tahunlulus']; ?></dd>
                            <dt class="col-sm-5">Gelar Akademik</dt>
                            <dd class="col-sm-7"><?= $alumni['gelar']; ?></dd>
                            <dt class="col-sm-5">No. Telp/HP</dt>
                            <dd class="col-sm-7"><?= $mhs['nomorwa']; ?></dd>
                            <dt class="col-sm-5">Email</dt>
                            <dd class="col-sm-7"><?= $alumni['email']; ?></dd>

                          </dl>
                        </div>
                      </div>
                    </div>
                  </div>
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