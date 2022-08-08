<?= $this->extend('user/mahasiswa/layout/indexmhs'); ?>

<?= $this->section('isi'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="font-weight-bold text-primary">Tanda Penyerahan Syarat-Syarat Yudisium</h6>
    </div>
    <div class="card-body">

      <div class="row mb-1">
        <div class="col-sm-6">
          <dl class="row mb-0">
            <dt class="col-4">Status</dt>
            <dd class="col-8"><?= $sfk; ?></dd>
            <dt class="col-4">Periode</dt>
            <dd class="col-8"><?= date("F", $bwfk) . " "; ?></dd>
          </dl>
        </div>

        <div class="col-sm-6">
          <div class="text-center float-sm-right">
            <p class="small muted mb-1" id="demo1"></p>
            <script>
              var countDownDate1 = <?php echo $bwfk ?> * 1000;
              var now1 = <?php echo time() ?> * 1000;
              var x1 = setInterval(function() {
                now1 = now1 + 1000;
                var distance1 = countDownDate1 - now1;
                var days1 = Math.floor(distance1 / (1000 * 60 * 60 * 24));
                var hours1 = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes1 = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
                var seconds1 = Math.floor((distance1 % (1000 * 60)) / 1000);
                document.getElementById("demo1").innerHTML = days1 + " hari, " + hours1 + " jam, " +
                  minutes1 + " menit, " + seconds1 + " detik. ";
                if (distance1 < 0) {
                  clearInterval(x1);
                  document.getElementById("demo1").innerHTML = "EXPIRED";
                }
              }, 1000);
            </script>
            <?php if (is_null($ajukan)) { ?>
              <a class="btn btn-primary align-middle btn-sm <?= (($sfk == 'Aktif') && $submit) ? '' : 'disabled'; ?>" href="/user/mahasiswa/pengajuan/<?= $mhs['npm'] ?>" style="width: 100px;"><abbr title="Dengan menekan submit berarti mengajukan untuk mengikuti Yudisium Periode <?= date("F", $bwfk) . " "; ?>">Submit</abbr></a>
            <?php } else { ?>
              <a class="btn btn-primary align-middle btn-sm disabled" href="#" style="width: 100px;"><abbr title="Dengan menekan submit berarti mengajukan untuk mengikuti Yudisium Periode <?= date("F", $bwfk) . " "; ?>">Submitted</abbr></a>
            <?php }; ?>
          </div>
        </div>
      </div>

      <?php if (session()->getFlashdata('ajukan')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> <?= session()->getFlashdata('ajukan'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

      <div class="card">
        <div class="row no-gutters">
          <div class="col">
            <div class="card-body">
              <dl class="row pb-1">
                <dt class="col-sm-4">Name</dt>
                <dd class="col-sm-8"><?= $mhs['nama']; ?></dd>
                <dt class="col-sm-4">No. Mahasiswa</dt>
                <dd class="col-sm-8"><?= $mhs['npm']; ?></dd>
                <dt class="col-sm-4">No. Telp/HP</dt>
                <dd class="col-sm-8">62<?= $mhs['nomorwa']; ?></dd>
                <dt class="col-sm-4">Program Studi</dt>
                <dd class="col-sm-8"><?= $mhs['prodi']; ?></dd>
                <dt class="col-sm-4">Fakultas</dt>
                <dd class="col-sm-8"><?= $mhs['fakultas']; ?></dd>
              </dl>

              <!-- Validation for every file -->
              <div>
                <!-- foto warna -->
                <?php if ($validation->hasError('fotowarna')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('fotowarna'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- foto hitam putih 4x5 -->
                <?php if ($validation->hasError('fotobw4x5')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('fotobw4x5'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- foto hitam putih 4x6 -->
                <?php if ($validation->hasError('fotobw4x6')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('fotobw4x6'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- KTM -->
                <?php if ($validation->hasError('ktm')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('ktm'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- Surat Keterangan Bebas Adminstasi Keuangan -->
                <?php if ($validation->hasError('suketadmkeuangan1')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('suketadmkeuangan1'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- Surat Keterangan Bebas Adminstasi Keuangan -->
                <!-- Surat Keterangan Penyerahan Skripsi -->
                <?php if ($validation->hasError('suketpenyerahanskripsi')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('suketpenyerahanskripsi'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- Surat Keterangan Penyerahan Sumbangan Buku Pada Program Studi -->
                <?php if ($validation->hasError('suketsumbanganbuku')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('suketsumbanganbuku'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- Surat Keterangan Bebas Perpustakaan Daerah -->
                <?php if ($validation->hasError('suketperpusda1')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('suketperpusda1'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- Surat Keterangan Bebas Perpustakaan Daerah -->
                <!-- Surat Keterangan Bebas Perpustakaan UPY -->
                <?php if ($validation->hasError('suketperpusupy1')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('suketperpusupy1'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- Surat Keterangan Bebas Perpustakaan UPY -->
                <!-- Daftar Nilai dari Program Studi yang bersangkutasn (Asli) -->
                <?php if ($validation->hasError('daftarnilai')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('daftarnilai'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- Surat Keterangan Perubahan Identitas -->
                <?php if ($validation->hasError('suketperubahanidentitas')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('suketperubahanidentitas'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- Sertifikasi EPT -->
                <?php if ($validation->hasError('sertifept')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('sertifept'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- Sertifikat Uji Kompetensi Komputer -->
                <?php if ($validation->hasError('sertifujikomp')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('sertifujikomp'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- KTP -->
                <?php if ($validation->hasError('ktp')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('ktp'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- Akta Kelahiran -->
                <?php if ($validation->hasError('aktalahir')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('aktalahir'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <!-- Ijazah Terakhir -->
                <?php if ($validation->hasError('ijazah')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $validation->getError('ijazah'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
              </div>
              <!-- Success flashData -->
              <?php if (session()->getFlashdata('berkasuploaded')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> <?= session()->getFlashdata('berkasuploaded'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
              <table class="table table-responsive-md mb-0">
                <thead class="" style="background-color: #476DDA; color:white;">
                  <tr>
                    <th scope="col" style="width: 2%;">No</th>
                    <th scope="col" style="width: 53%;">Berkas Yang Perlu diupload</th>
                    <th scope="col" style="width: 15%;">Keterangan</th>
                    <th scope="col" style="width: 26%;">File</th>
                    <th scope="col" class="text-center" style="width: 4%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- 1 foto warna -->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/foto" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">1</th>
                      <td class="">Pas Foto Warna Terbaru Ukuran <abbr title="Laki-laki foto pakaian jas berdasi &#013;Perempuan foto pakaian berkebaya dan/atau berhijab">3x4</abbr></td>
                      <td class="text-center">-</td>
                      <?php if (is_null($berkas['fotowarna'])) { ?>
                        <td>
                          <div class="form-group">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="fotowarna" accept="image/jpg, image/jpeg">
                          </div>
                        </td>
                        <td class="text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td>
                          <img src="<?= base_url('/berkas/' . $mhs['npm'] . '/fotowarna/' . $berkas['fotowarna'] . '') ?>" alt="" width="75px">
                        </td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 2 foto hitam putih 4x5 -->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/fotobw4x5" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">2</th>
                      <td>Pas Foto Hitam Putih Terbaru Ukuran <abbr title="Laki-laki foto pakaian jas berdasi &#013;Perempuan foto pakaian berkebaya dan/atau berhijab &#013;Foto hitam putih dicetak doff (tidak mengkilat)">4x5 (DOFF)</abbr>, <small class="font-italic">(Foto Transkip)</small>
                      </td>
                      <td>Tidak Mengkilat</td>
                      <?php if (is_null($berkas['fotobw4x5'])) { ?>
                        <td>
                          <div class="form-group">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="fotobw4x5" accept="image/jpg, image/jpeg">
                          </div>
                        </td>
                        <td class="text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><img src="<?= base_url('/berkas/' . $mhs['npm'] . '/fotobw4x5/' . $berkas['fotobw4x5'] . '') ?>" alt="" width="75px"></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 3 foto hitam putih 4x6 -->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/fotobw4x6" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">3</th>
                      <td>Pas Foto Hitam Putih Terbaru Ukuran <abbr title="Laki-laki foto pakaian jas berdasi &#013;Perempuan foto pakaian berkebaya dan/atau berhijab &#013;Foto hitam putih dicetak doff (tidak mengkilat)">4x6 (DOFF)</abbr>, <small class="font-italic">(Foto Ijazah)</small></td>
                      <td>Tidak Mengkilat</td>
                      <?php if (is_null($berkas['fotobw4x6'])) { ?>
                        <td>
                          <div class="form-group">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="fotobw4x6" accept="image/jpg, image/jpeg">
                          </div>
                        </td>
                        <td class="text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><img src="<?= base_url('/berkas/' . $mhs['npm'] . '/fotobw4x6/' . $berkas['fotobw4x6'] . '') ?>" alt="" width="75px"></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 4 KTM -->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/ktm" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">4</th>
                      <td>KTM (Asli) <br><small class="font-italic">(Jika KTM masih akan digunakan untuk ATM pribadi, harap mengganti/konversi KTM ke Bank BNI Ahmad Dahlan sebelum KTM dikumpulkan, syarat: buku tabungan, KTP, dan KTM)</small></td>
                      <td class="text-center">-</td>
                      <?php if (is_null($berkas['ktm'])) { ?>
                        <td>
                          <div class="form-group">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="ktm" accept="application/pdf">
                          </div>
                        </td>
                        <td class="text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><?= $berkas['ktm'] ?></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 5 Surat Keterangan Bebas Administrasi Keuangan -->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/suketadmkeuangan" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">5</th>
                      <td>Surat Keterangan Bebas Administrasi Keuangan</td>
                      <td class="text-center">-</td>
                      <?php if (is_null($berkas['suketadmkeuangan'])) { ?>
                        <td class="align-middle">
                          <div class="form-group mb-0">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="suketadmkeuangan" accept="application/pdf">
                          </div>
                        </td>
                        <td class="align-middle text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><?= $berkas['suketadmkeuangan'] ?></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 6 Berita Acara Ujian Skripsi -->
                  <tr>
                    <th scope="row">6</th>
                    <td>Berita Acara Ujian Skripsi</td>
                    <td>Cap Basah</td>
                    <td class="align-middle"><?= $berkas['beritaacaraujianskripsi']; ?></td>
                    <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                  </tr>
                  <!-- 7 Surat Keterangan Penyerahan Skripsi -->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/suketpenyerahanskripsi" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">7</th>
                      <td>Surat Keterangan Penyerahan Skripsi</td>
                      <td>Cap Basah Prodi</td>
                      <?php if (is_null($berkas['suketpenyerahanskripsi'])) { ?>
                        <td class="align-middle">
                          <div class="form-group">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="suketpenyerahanskripsi" accept="application/pdf">
                          </div>
                        </td>
                        <td class="text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><?= $berkas['suketpenyerahanskripsi'] ?></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 8 Fotocopy Lembar Pengesahan Dewan Penguji Skripsi -->
                  <tr>
                    <th scope="row">8</th>
                    <td>Fotocopy Lembar Pengesahan Dewan Penguji Skripsi</td>
                    <td class="text-center">-</td>
                    <td class="align-middle"><?= $berkas['lempengdewanpenguji']; ?></td>
                    <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                  </tr>
                  <!-- 9 Surat Keterangan Penyerahan Sumbangan Buku Pada Program Studi -->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/suketsumbanganbuku" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">9</th>
                      <td>Surat Keterangan Penyerahan Sumbangan Buku Pada Program Studi</td>
                      <td>Cap Basah Prodi</td>
                      <?php if (is_null($berkas['suketsumbanganbuku'])) { ?>
                        <td class="align-middle">
                          <div class="form-group">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="suketsumbanganbuku" accept="application/pdf">
                          </div>
                        </td>
                        <td class="text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><?= $berkas['suketsumbanganbuku'] ?></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 10 Surat Keterangan Bebas Perpustakaan Daerah -->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/suketperpusda" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">10</th>
                      <td>Surat Keterangan Bebas Perpustakaan Daerah</td>
                      <td class="text-center">-</td>
                      <?php if (is_null($berkas['suketperpusda'])) { ?>
                        <td class="align-middle">
                          <div class="form-group mb-0">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="suketperpusda" accept="application/pdf">
                          </div>
                        </td>
                        <td class="align-middle text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><?= $berkas['suketperpusda'] ?></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 11 Surat Keterangan Bebas Perpustakaan UPY -->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/suketperpusupy" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">11</th>
                      <td>Surat Keterangan Bebas Perpustakaan Universitas PGRI Yogyakarta</td>
                      <td class="text-center">-</td>
                      <?php if (is_null($berkas['suketperpusupy'])) { ?>
                        <td class="align-middle">
                          <div class="form-group mb-0">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="suketperpusupy" accept="application/pdf">
                          </div>
                        </td>
                        <td class="align-middle text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><?= $berkas['suketperpusupy'] ?></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 12 Daftar Nilai dari Program Studi yang bersangkutan (Asli) -->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/daftarnilai" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">12</th>
                      <td>Daftar Nilai dari Program Studi yang bersangkutan (Asli)</td>
                      <td>Cap Basah</td>
                      <?php if (is_null($berkas['daftarnilai'])) { ?>
                        <td class="align-middle">
                          <div class="form-group">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="daftarnilai" accept="application/pdf">
                          </div>
                        </td>
                        <td class="text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><?= $berkas['daftarnilai'] ?></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 13 KRS Terakhir -->
                  <tr>
                    <th scope="row">13</th>
                    <td>KRS Terakhir</td>
                    <td>Cap Basah</td>
                    <td><?= $berkas['krsterakhir'] ?></td>
                    <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                  </tr>
                  <!-- 14 Surat Keterangan Mengenai Perubahan Identitas -->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/suketperubahanidentitas" id="identitas" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">14</th>
                      <td>Surat Keterangan Mengenai Perubahan Identitas <abbr title="Dibiarkan bila tidak ada"><small>(Apabila ada)</small></abbr></td>
                      <td class="text-center">-</td>
                      <?php if (is_null($berkas['suketperubahanidentitas'])) { ?>
                        <td class="align-middle">
                          <div class="form-group">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="suketperubahanidentitas" accept="application/pdf">
                          </div>
                        </td>
                        <td class="text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><?= $berkas['suketperubahanidentitas'] ?></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 15 Sertifikasi EPT -->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/sertifept" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">15</th>
                      <td>Sertifikasi EPT</td>
                      <td class="text-center">-</td>
                      <?php if (is_null($berkas['sertifept'])) { ?>
                        <td class="align-middle">
                          <div class="form-group">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="sertifept" accept="application/pdf">
                          </div>
                        </td>
                        <td class="text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><?= $berkas['sertifept'] ?></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 16 Sertifikat Uji Kompetensi Komputer Dasar-->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/sertifujikomp" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">16</th>
                      <td><?= $mhs['prodi'] == 'Informatika' ? 'Sertifikat mengikuti Uji Kompetensi Komputer Dasar' : 'Sertifikat mengikuti Uji Kompetensi M.T.A'; ?></td>
                      <td class="text-center">-</td>
                      <?php if (is_null($berkas['sertifujikomp'])) { ?>
                        <td class="align-middle">
                          <div class="form-group">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="sertifujikomp" accept="application/pdf">
                          </div>
                        </td>
                        <td class="text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><?= $berkas['sertifujikomp'] ?></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 17 Fotocopy KTP-->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/ktp" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">17</th>
                      <td>Fotocopy KTP</td>
                      <td class="text-center">-</td>
                      <?php if (is_null($berkas['ktp'])) { ?>
                        <td class="align-middle">
                          <div class="form-group">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="ktp" accept="application/pdf">
                          </div>
                        </td>
                        <td class="text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><?= $berkas['ktp'] ?></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 18 Akta Kelahiran-->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/aktalahir" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">18</th>
                      <td>Fotocopy Akta Kelahiran</td>
                      <td class="text-center">-</td>
                      <?php if (is_null($berkas['aktalahir'])) { ?>
                        <td class="align-middle">
                          <div class="form-group">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="aktalahir" accept="application/pdf">
                          </div>
                        </td>
                        <td class="text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><?= $berkas['aktalahir'] ?></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- 19 Ijazah Terakhir-->
                  <tr>
                    <form method="POST" action="/user/mahasiswa/berkas/ijazah" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                      <th scope="row">19</th>
                      <td>Fotocopy Ijazah Terakhir</td>
                      <td class="text-center">-</td>
                      <?php if (is_null($berkas['ijazah'])) { ?>
                        <td class="align-middle">
                          <div class="form-group">
                            <input type="file" class="form-control-file form-control-sm pl-0" name="ijazah" accept="application/pdf">
                          </div>
                        </td>
                        <td class="text-center"><button type="submit" class="btn btn-sm btn-secondary-outline"><i class="fas fa-upload"></i></button></td>
                      <?php } else { ?>
                        <td><?= $berkas['ijazah'] ?></td>
                        <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                      <?php }; ?>
                    </form>
                  </tr>
                  <!-- Data Alumni -->
                  <tr>
                    <th scope="row">20</th>
                    <td>Mengisi Data Alumni</td>
                    <td class="text-center">-</td>
                    <td class="text-center">-</td>
                    <?php if (is_null($berkas['dataalumni'])) { ?>
                      <td class="text-center"><a class="btn btn-secondary-outline btn-sm" href="<?= base_url('/user/mahasiswa/alumni') ?>"><span><i class="fas fa-external-link-alt"></i></span></a></td>
                    <?php } else { ?>
                      <td class="text-center text-success"><span><i class="fas fa-check"></i></span></td>
                    <?php }; ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>