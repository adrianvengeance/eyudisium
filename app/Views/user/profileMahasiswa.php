<?= $this->extend('/auth/index'); ?>

<?= $this->section('auth_content'); ?>

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">

                  <h1 class="h4 text-gray-900 mb-4">Admin <?= $user ?></h1>

                </div>
                <div class="card mb-3">
                  <div class="row no-gutters">
                    <div class="col-md-12">
                      <div class="card-body">
                        <dl class="row">
                          <dt class="col-sm-6">Nama</dt>
                          <dd class="col-sm-6"><?= $mhs['nama']; ?></dd>
                          <dt class="col-sm-6">NPM</dt>
                          <dd class="col-sm-6"><?= $mhs['npm']; ?></dd>
                          <dt class="col-sm-6">Fakultas</dt>
                          <dd class="col-sm-6"><?= $mhs['fakultas']; ?></dd>
                          <dt class="col-sm-6">Program Studi</dt>
                          <dd class="col-sm-6"><?= $mhs['prodi']; ?></dd>
                          <dt class="col-sm-6">No. Whatsapp</dt>
                          <dd class="col-sm-6"><a href="https://wa.me/62<?= $mhs['nomorwa'] ?>" target="_blank"><?= '0' . $mhs['nomorwa']; ?></a></dd>
                        </dl>
                        <hr class="bg-primary" style="height: 1px;">
                        <?php if (session()->getFlashdata('memenuhi')) : ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> <?= session()->getFlashdata('memenuhi'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                          <table class="table table-sm table-hover table-borderless">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col" colspan="4" class="text-center">Berkas</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Foto Berwarna</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/fotowarna/' . $berkas['fotowarna']); ?>" target="_blank"><?= $berkas['fotowarna']; ?></a></td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/fotowarna/' . $berkas['fotowarna']); ?>" <?= is_null($berkas['fotowarna']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Foto Hitam Putih 4x5</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/fotobw4x5/' . $berkas['fotobw4x5']); ?>" target="_blank"><?= $berkas['fotobw4x5']; ?></a></td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/fotobw4x5/' . $berkas['fotobw4x5']); ?>" <?= is_null($berkas['fotobw4x5']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Foto Hitam Putih 4x6</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/fotobw4x6/' . $berkas['fotobw4x6']); ?>" target="_blank"><?= $berkas['fotobw4x6']; ?></a></td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/fotobw4x6/' . $berkas['fotobw4x6']); ?>" <?= is_null($berkas['fotobw4x6']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">4</th>
                                <td>KTM</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/ktm/' . $berkas['ktm']); ?>" target="_blank"><?= $berkas['ktm']; ?></a></td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/ktm/' . $berkas['ktm']); ?>" <?= is_null($berkas['ktm']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">5</th>
                                <td>Surat Keterangan Bebas Administrasi Keuangan</td>
                                <td>
                                  <a href="<?= base_url('/user/berkas/' . $npm . '/suketadmkeuangan/' . $berkas['suketadmkeuangan']); ?>" target="_blank"><?= $berkas['suketadmkeuangan']; ?></a>
                                </td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/suketadmkeuangan/' . $berkas['suketadmkeuangan']); ?>" <?= is_null($berkas['suketadmkeuangan']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">6</th>
                                <td>Berita Acara Ujian Skripsi</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/beritaacaraujianskripsi/' . $berkas['beritaacaraujianskripsi']); ?>" target="_blank"><?= $berkas['beritaacaraujianskripsi']; ?></a></td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/beritaacaraujianskripsi/' . $berkas['beritaacaraujianskripsi']); ?>" <?= is_null($berkas['beritaacaraujianskripsi']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">7</th>
                                <td>Surat Keterangan Penyerahan Skripsi</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/suketpenyerahanskripsi/' . $berkas['suketpenyerahanskripsi']); ?>" target="_blank"><?= $berkas['suketpenyerahanskripsi']; ?></a></td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/suketpenyerahanskripsi/' . $berkas['suketpenyerahanskripsi']); ?>" <?= is_null($berkas['suketpenyerahanskripsi']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">8</th>
                                <td>Lembar Pengesahan Dewan Penguji Skripsi</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/lempengdewanpenguji/' . $berkas['lempengdewanpenguji']); ?>" target="_blank"><?= $berkas['lempengdewanpenguji']; ?></a></dd>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/lempengdewanpenguji/' . $berkas['lempengdewanpenguji']); ?>" <?= is_null($berkas['lempengdewanpenguji']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">9</th>
                                <td>Surat Keterangan Penyerahan Sumbangan Buku Pada Program Studi</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/suketsumbanganbuku/' . $berkas['suketsumbanganbuku']); ?>" target="_blank"><?= $berkas['suketsumbanganbuku']; ?></a></td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/suketsumbanganbuku/' . $berkas['suketsumbanganbuku']); ?>" <?= is_null($berkas['suketsumbanganbuku']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">10</th>
                                <td>Surat Keterangan Bebas Perpustakaan Daerah</td>
                                <td>
                                  <a href="<?= base_url('/user/berkas/' . $npm . '/suketperpusda/' . $berkas['suketperpusda']); ?>" target="_blank"><?= $berkas['suketperpusda']; ?></a>
                                </td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/suketperpusda/' . $berkas['suketperpusda']); ?>" <?= is_null($berkas['suketperpusda']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">11</th>
                                <td>Surat Keterangan Bebas Perpustakaan Universitas PGRI Yogyakarta</td>
                                <td>
                                  <a href="<?= base_url('/user/berkas/' . $npm . '/suketperpusupy/' . $berkas['suketperpusupy']); ?>" target="_blank"><?= $berkas['suketperpusupy']; ?></a>
                                </td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/suketperpusupy/' . $berkas['suketperpusupy']); ?>" <?= is_null($berkas['suketperpusupy']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">12</th>
                                <td>Daftar Nilai dari Program Studi (Asli)</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/daftarnilai/' . $berkas['daftarnilai']); ?>" target="_blank"><?= $berkas['daftarnilai']; ?></a></dd>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/daftarnilai/' . $berkas['daftarnilai']); ?>" <?= is_null($berkas['daftarnilai']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">13</th>
                                <td>KRS Terakhir</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/krsterakhir/' . $berkas['krsterakhir']); ?>" target="_blank"><?= $berkas['krsterakhir']; ?></a></dd>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/krsterakhir/' . $berkas['krsterakhir']); ?>" <?= is_null($berkas['krsterakhir']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">14</th>
                                <td>Surat Keterangan Mengenai Perubahan Identitas</td>
                                <td><?php if (!is_null($berkas['suketperubahanidentitas'])) : ?><a href="<?= base_url('/user/berkas/' . $npm . '/suketperubahanidentitas/' . $berkas['suketperubahanidentitas']); ?>" target="_blank"><?= $berkas['suketperubahanidentitas']; ?></a><?php endif; ?></dd>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/suketperubahanidentitas/' . $berkas['suketperubahanidentitas']); ?>" <?= is_null($berkas['suketperubahanidentitas']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">15</th>
                                <td>Sertifikasi EPT</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/sertifept/' . $berkas['sertifept']); ?>" target="_blank"><?= $berkas['sertifept']; ?></a></dd>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/sertifept/' . $berkas['sertifept']); ?>" <?= is_null($berkas['sertifept']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">16</th>
                                <td><?= $mhs['prodi'] == 'Informatika' ? 'Sertifikat mengikuti Uji Kompetensi Komputer Dasar' : 'Sertifikat mengikuti Uji Kompetensi M.T.A'; ?></td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/sertifujikomp/' . $berkas['sertifujikomp']); ?>" target="_blank"><?= $berkas['sertifujikomp']; ?></a></td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/sertifujikomp/' . $berkas['sertifujikomp']); ?>" <?= is_null($berkas['sertifujikomp']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">17</th>
                                <td>KTP</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/ktp/' . $berkas['ktp']); ?>" target="_blank"><?= $berkas['ktp']; ?></a></td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/ktp/' . $berkas['ktp']); ?>" <?= is_null($berkas['ktp']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">18</th>
                                <td>Akta Kelahiran</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/aktalahir/' . $berkas['aktalahir']); ?>" target="_blank"><?= $berkas['aktalahir']; ?></a></td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/aktalahir/' . $berkas['aktalahir']); ?>" <?= is_null($berkas['aktalahir']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">19</th>
                                <td>Ijazah Terakhir</td>
                                <td><a href="<?= base_url('/user/berkas/' . $npm . '/ijazah/' . $berkas['ijazah']); ?>" target="_blank"><?= $berkas['ijazah']; ?></a></td>
                                <td>
                                  <button class="btn btn-sm text-danger" data-toggle="modal" data-target="#rejectModal" id="rejectBtn" data-uri="<?= base_url('/user/reject/' . $npm . '/ijazah/' . $berkas['ijazah']); ?>" <?= is_null($berkas['ijazah']) ? 'disabled="disabled"' : '' ?>><i class="far fa-times-circle"></i></button>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        <hr class="bg-primary" style="height: 1px;">

                        <div class="table-responsive">
                          <table class="table table-sm table-hover table-borderless">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col" colspan="3" class="text-center">Data Alumni</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Nama</td>
                                <td><?= $mhs['nama']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>NIM</td>
                                <td><?= $infomhs['npmmhs']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Tempat Tanggal Lahir</td>
                                <td><?= $infomhs['tempatlahir'] . ', ' . date("d F Y", strtotime($infomhs['tanggallahir'])) ?></td>
                              </tr>
                              <tr>
                                <th scope="row">4</th>
                                <td>Asal Sekolah</td>
                                <td><?= $infomhs['asalsekolah']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">5</th>
                                <td>Alamat Rumah</td>
                                <td><?= $infomhs['alamatrumah']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">6</th>
                                <td>Alamat Kantor</td>
                                <td><?= empty($infomhs['alamatkantor']) ? '-' : $infomhs['alamatkantor']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">7</th>
                                <td>Nama <?= $infomhs['ortu']; ?></td>
                                <td><?= $infomhs['namaortu']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">8</th>
                                <td>Judul <?= $infomhs['jenista']; ?> <small>(Indonesia)</small></td>
                                <td><?= $infomhs['judulid']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">9</th>
                                <td>Judul <?= $infomhs['jenista']; ?> <small>(English)</small></td>
                                <td><?= $infomhs['judulen']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">10</th>
                                <td>Dosen Pembimbing I</td>
                                <td><?= $infomhs['dosbim1']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">11</th>
                                <td>Dosen Pembimbing II</td>
                                <td><?= $infomhs['dosbim2']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">12</th>
                                <td>Dosen Penguji I</td>
                                <td><?= $infomhs['penguji1']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">13</th>
                                <td>Dosen Penguji II</td>
                                <td><?= $infomhs['penguji2']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">14</th>
                                <td>Dosen Penguji III</td>
                                <td><?= $infomhs['penguji3']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">15</th>
                                <td>Tahun Lulus</td>
                                <td><?= $infomhs['tahunlulus']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">16</th>
                                <td>Gelar Akademik</td>
                                <td><?= $infomhs['gelar']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">17</th>
                                <td>Email</td>
                                <td><?= $infomhs['email']; ?></td>
                              </tr>
                              <tr>
                                <th scope="row">18</th>
                                <td>Foto</td>
                                <td><a href="<?= base_url('/user/berkas/dataalumni/' . $npm . '/' . $infomhs['foto']); ?>" target="_blank"><?= $infomhs['foto']; ?></a></td>
                              </tr>
                              <tr>
                                <th scope="row">19</th>
                                <td class="col-sm-5">Abstraksi <?= $infomhs['jenista']; ?> <small>(Bahasa Indonesia)</small></td>
                                <td class="col-sm-6"> <?= $infomhs['skripsi1'] ?></td>
                              </tr>
                              <tr>
                                <th scope="row">20</th>
                                <td class="col-sm-5">Abstraksi <?= $infomhs['jenista']; ?> <small>(Bahasa Inggris)</small></td>
                                <td class="col-sm-6"> <?= $infomhs['skripsi2'] ?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        <hr class="bg-primary" style="height: 1px;">
                        <form action="/user/mhsprofilecheck/<?= $mhs['npm'] ?>" method="POST" id="update">
                          <?= csrf_field(); ?>
                          <dl class="row">
                            <dt class="col-sm-6">Check</dt>
                            <dd class="col-sm-6">
                              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-sm btn-outline-secondary <?= ($cek["$check"] == 2) ? "active" : ""; ?>">
                                  <input type="radio" name="check" value="2" id="option2" <?= ($cek["$check"] == 2) ? "checked" : ""; ?>> Tidak Memenuhi
                                </label>
                                <label class="btn btn-sm btn-outline-primary <?= ($cek["$check"] == 1) ? "active" : ""; ?>">
                                  <input type="radio" name="check" value="1" id="option1" <?= ($cek["$check"] == 1) ? "checked" : ""; ?>> Memenuhi
                                </label>
                              </div>
                            </dd>
                            <dt class="col-sm-6">Alasan</dt>
                            <dd class="col-sm-6 mb-0">
                              <div class="form-group pb-0">
                                <textarea class="form-control pb-0" rows="3" spellcheck="false" name="alasan" form="update" style="resize:none; "><?= $cek["$alasan"] ?></textarea>
                              </div>
                            </dd>
                            <div class="col-sm-12 mt-0">
                              <div class="row justify-content-center">
                                <a class="btn btn-outline-secondary btn-sm col-sm-3 mt-1 mr-1" href="/user"><i class="fas fa-times-circle"></i> Cancel</a>
                                <button type="submit" class="btn btn-outline-primary btn-sm col-sm-3 mt-1 ml-1"><i class="fas fa-check-circle"></i> Submit</button>
                              </div>
                            </div>
                          </dl>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <hr> -->
                <div class="text-center">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="" method="POST">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger"> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>