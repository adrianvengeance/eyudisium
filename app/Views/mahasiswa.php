<?= $this->extend('/layout/index'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-sm-12">
      <div class="card o-hidden border-0 shadow my-1">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-sm">
              <div class="p-5">
                <div>
                  <h1 class="responsif text-center text-gray-900">Pengumpulan Berkas Yudisium</h1>
                </div>
                <hr class="bg-primary px-5" style="height: 1px;">
                <?php

                // use PhpParser\JsonDecoder;

                if (session()->getFlashdata('mahasiswa')) : ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Silakan masukan kembali input yang sesuai.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php endif; ?>
                <form method="post" action="/mahasiswa/save" id="formberkas" enctype="multipart/form-data">
                  <?= csrf_field(); ?>
                  <div class="container">
                    <?php if ($validation->getErrors()) : ?>
                      <div class="alert alert-danger alert-dismissible mt-1 textresponsif">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?= 'Error! '; ?></strong><?= "Silakan input kembali form dan berkas yang sesuai."; ?>
                      </div>
                    <?php endif ?>
                    <div class="px-3">
                      <div class="form-group row">
                        <label for="npm" class="col-sm-4 col-form-label">NPM</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="npm" value="<?= $isi['npm']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nama" id="nama" value="<?= ($isi['nama']) ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jeniskelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="jeniskelamin" id="jeniskelamin" value="<?= $isi['jeniskelamin'] == 'm' ? 'Laki-laki' : ($isi['jeniskelamin'] == 'f' ? 'Perempuan' : ''); ?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="fakultas" class="col-sm-4 col-form-label">Fakultas</label>
                        <div class="col-sm-8">
                          <input type="text" name="fakultas" id="fakultas" class="form-control" value="<?= $isi['fakultas']; ?>" disabled>
                          <div class="invalid-feedback"><?= $validation->getError('fakultas'); ?></div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="prodi" class="col-sm-4 col-form-label">Program Studi</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="prodi" id="prodi" value="<?= $isi['prodi'] ?>" disabled>
                        </div>
                      </div>

                    </div>
                  </div>

                  <hr class="">

                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <div class="col-12 formtextresponsif textresponsif">
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text textresponsif" id="basic-addon1">+62</span>
                            </div>
                            <input type="text" class="form-control textresponsif <?= ($validation->hasError('no_wa')) ? 'is-invalid' : ''; ?>" name="no_wa" value="<?= old('no_wa'); ?>" placeholder="No. Whatsapp" aria-label="no_wa" aria-describedby="basic-addon1">
                            <div class="invalid-feedback"><?= $validation->getError('no_wa'); ?></div>
                          </div>
                        </div>
                        <div class="col-12 formtextresponsif textresponsif">
                          <div class="form-group custom-file mb-3">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('krs')) ? 'is-invalid' : ''; ?>" id="krs" name="krs" onchange="krsPreview()" accept="application/pdf">
                            <label class="custom-file-label" id="krs_label" for="krs">KRS Terakhir (cap basah)..</label>
                            <div class="invalid-feedback"><?= $validation->getError('krs'); ?></div>
                          </div>
                        </div>
                        <div class="col-12 formtextresponsif textresponsif">
                          <div class="form-group custom-file mb-3">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('berita_acara')) ? 'is-invalid' : ''; ?>" id="berita_acara" name="berita_acara" onchange="beritaPreview()" accept="application/pdf">
                            <label class="custom-file-label text-truncate" id="berita_acara_label" for="berita_acara">Berita Acara Ujian Skripsi (cap basah)..</label>
                            <div class="invalid-feedback"><?= $validation->getError('berita_acara'); ?></div>
                          </div>
                        </div>
                        <div class="col-12 formtextresponsif textresponsif">
                          <div class="form-group custom-file mb-3">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('hal_pengesahan')) ? 'is-invalid' : ''; ?>" id="hal_pengesahan" name="hal_pengesahan" onchange="halPreview()" accept="application/pdf">
                            <label class="custom-file-label text-truncate" id="hal_pengesahan_label" for="hal_pengesahan">Lembar Pengesahan Dewan Penguji Skripsi (photocopy)..</label>
                            <div class="invalid-feedback"><?= $validation->getError('hal_pengesahan'); ?></div>
                            <?php if ($validation->hasError('krs')) { ?><br><?php }; ?>
                          </div>
                        </div>

                        <div class="col-12 textresponsif">
                          <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary btn-sm btn-block">Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>
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
</div>

<?= $this->endSection(); ?>