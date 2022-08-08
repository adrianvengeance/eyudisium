<?= $this->extend('user/mahasiswa/layout/indexmhs'); ?>

<?= $this->section('isi'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row justify-content-center">

    <div class="col-md-10 card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="font-weight-bold text-primary">Data Alumni</h6>
      </div>
      <div class="card-body">

        <div class="card">
          <div class="row no-gutters">
            <div class="col">
              <div class="card-body">
                <div class="container px-2">
                  <div class="row align-items-center bg-primary" style="height: 50px;">
                    <div class="col-md-12 text-center text-white font-weight-bold">Form Data Dikti</div>
                  </div>
                  <?php if (session()->getFlashdata('dataalumnierror')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show row mt-2" role="alert">
                      <strong>Error! </strong> <?= session()->getFlashdata('dataalumnierror'); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif; ?>
                  <form class="mt-3" action="/user/mahasiswa/alumniprocess" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                      <label for="inputnama" class="col-sm-4 col-form-label">Nama</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>" name="nama" id="inputnama" value="<?= $mhs['nama']; ?>" readonly>
                        <div class="invalid-feedback"><?= $validation->getError('nama'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputnim" class="col-sm-4 col-form-label">NIM</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="npmmhs" id="inputnim" value="<?= $mhs['npm']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputtempatlahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= $validation->hasError('tempatlahir') ? 'is-invalid' : ''; ?>" name="tempatlahir" id="inputtempatlahir" value="<?= old('tempatlahir'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('tempatlahir'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputtanggallahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-8">
                        <input type="date" placeholder="dd-mm-yyyy" class="form-control <?= $validation->hasError('tanggallahir') ? 'is-invalid' : ''; ?>" name="tanggallahir" id="inputtanggallahir" value="<?= old('tanggallahir'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('tanggallahir'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputasalsekolah" class="col-sm-4 col-form-label">Asal Sekolah</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= $validation->hasError('asalsekolah') ? 'is-invalid' : ''; ?>" name="asalsekolah" id="inputasalsekolah" value="<?= old('asalsekolah'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('asalsekolah'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputalamatrumah" class="col-sm-4 col-form-label">Alamat Rumah</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= $validation->hasError('alamatrumah') ? 'is-invalid' : ''; ?>" name="alamatrumah" id="inputalamatrumah" value="<?= old('alamatrumah'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('alamatrumah'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputalamatkantor" class="col-sm-4 col-form-label"><abbr title="Jika sudah bekerja,&#013;Boleh dikosongkan jika belum bekerja">Alamat Kantor</abbr></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="alamatkantor" id="inputalamatkantor" value="<?= old('alamatkantor'); ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputnamaayahibu" class="col-sm-4 col-form-label mt-0 pt-0">
                        <select class="custom-select ml-0 pl-0 text-muted shadow-none <?= $validation->hasError('ortu') ? 'is-invalid' : ''; ?>" name="ortu" id="inputnamaayahibu" style="border: 0;">
                          <?php if (old('ortu') == null) { ?>
                            <option value="" <?php echo 'selected'; ?>>Pilih Nama Ayah/Ibu</option>
                            <option value="Ayah">Nama Ayah</option>
                            <option value="Ibu">Nama Ibu</option>
                          <?php } elseif (old('ortu') == 'Ayah') { ?>
                            <option value="">Pilih Nama Ayah/Ibu</option>
                            <option value="Ayah" <?= 'selected'; ?>>Nama Ayah</option>
                            <option value="Ibu">Nama Ibu</option>
                          <?php } elseif (old('ortu') == 'Ibu') { ?>
                            <option value="">Pilih Nama Ayah/Ibu</option>
                            <option value="Ayah">Nama Ayah</option>
                            <option value="Ibu" <?= 'selected'; ?>>Nama Ibu</option>
                          <?php } ?>
                        </select>
                      </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= $validation->hasError('namaortu') ? 'is-invalid' : ''; ?>" name="namaortu" id="inputnamaayahibu" value="<?= old('namaortu'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('ortu'); ?></div>
                        <div class="invalid-feedback"><?= $validation->getError('namaortu'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputjudul" class="col-sm-4 col-form-label mt-0 pt-0">
                        <select class="custom-select ml-0 pl-0 text-muted shadow-none <?= $validation->hasError('jenista') ? 'is-invalid' : ''; ?>" name="jenista" id="judulta" style="border: 0;">
                          <?php if (old('jenista') == null) { ?>
                            <option value="" <?= 'selected'; ?>>Pilih Judul Skripsi/Tesis</option>
                            <option value="Skripsi">Judul Skripsi</option>
                            <option value="Tesis">Judul Tesis</option>
                          <?php } elseif (old('jenista') == 'Skripsi') { ?>
                            <option value="">Pilih Judul Skripsi/Tesis</option>
                            <option value="Skripsi" <?= 'selected'; ?>>Judul Skripsi</option>
                            <option value="Tesis">Judul Tesis</option>
                          <?php } elseif (old('jenista') == 'Tesis') { ?>
                            <option value="">Pilih Judul Skripsi/Tesis</option>
                            <option value="Skripsi">Judul Skripsi</option>
                            <option value="Tesis" <?= 'selected'; ?>>Judul Tesis</option>
                          <?php } ?>
                        </select>
                      </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= $validation->hasError('judulid') ? 'is-invalid' : ''; ?>" name="judulid" id="inputjudul" value="<?= old('judulid'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('jenista'); ?></div>
                        <div class="invalid-feedback"><?= $validation->getError('judulid'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputjudulskripsienglish" class="col-sm-4 col-form-label" id="labeljudul">
                        <abbr title="dalam bahasa Inggris">Judul Skripsi/Tesis</abbr>
                      </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control <?= $validation->hasError('judulen') ? 'is-invalid' : ''; ?>" name="judulen" id="inputjudulskripsienglish" value="<?= old('judulen'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('judulen'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputdosbim1" class="col-sm-4 col-form-label">Dosen Pembimbing I</label>
                      <div class="col-sm-8">
                        <input list="dosbim1" class="form-control <?= $validation->hasError('dosbim1') ? 'is-invalid' : ''; ?>" name="dosbim1" id="inputdosbim1" value="<?= old('dosbim1'); ?>">
                        <datalist id="dosbim1">
                          <?php foreach ($dosens as $n => $dosen) : ?>
                            <option value="<?= $dosen->nama; ?>"><?= $dosen->nama; ?></option>
                          <?php endforeach; ?>
                        </datalist>
                        <div class="invalid-feedback"><?= $validation->getError('dosbim1'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputdosbim2" class="col-sm-4 col-form-label">Dosen Pembimbing II</label>
                      <div class="col-sm-8">
                        <input list="dosbim2" class="form-control <?= $validation->hasError('dosbim2') ? 'is-invalid' : ''; ?>" name="dosbim2" id="inputdosbim2" value="<?= old('dosbim2'); ?>" value="<?= old('dosbim2'); ?>">
                        <datalist id="dosbim2">
                          <?php foreach ($dosens as $n => $dosen) : ?>
                            <option value="<?= $dosen->nama; ?>"><?= $dosen->nama; ?></option>
                          <?php endforeach; ?>
                        </datalist>
                        <div class="invalid-feedback"><?= $validation->getError('dosbim2'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputpenguji1" class="col-sm-4 col-form-label">Dosen Penguji I</label>
                      <div class="col-sm-8">
                        <input list="penguji1" class="form-control <?= $validation->hasError('penguji1') ? 'is-invalid' : ''; ?>" name="penguji1" id="inputpenguji1" value="<?= old('penguji1'); ?>">
                        <datalist id="penguji1">
                          <?php foreach ($dosens as $n => $dosen) : ?>
                            <option value="<?= $dosen->nama; ?>"><?= $dosen->nama; ?></option>
                          <?php endforeach; ?>
                        </datalist>
                        <div class="invalid-feedback"><?= $validation->getError('penguji1'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputpenguji2" class="col-sm-4 col-form-label">Dosen Penguji II</label>
                      <div class="col-sm-8">
                        <input list="penguji2" class="form-control <?= $validation->hasError('penguji2') ? 'is-invalid' : ''; ?>" name="penguji2" id="inputpenguji2" value="<?= old('penguji2'); ?>">
                        <datalist id="penguji2">
                          <?php foreach ($dosens as $n => $dosen) : ?>
                            <option value="<?= $dosen->nama; ?>"><?= $dosen->nama; ?></option>
                          <?php endforeach; ?>
                        </datalist>
                        <div class="invalid-feedback"><?= $validation->getError('penguji2'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputdosuji3" class="col-sm-4 col-form-label">Dosen Penguji III</label>
                      <div class="col-sm-8">
                        <input list="penguji3" class="form-control <?= $validation->hasError('penguji3') ? 'is-invalid' : ''; ?>" name="penguji3" id="inputpenguji3" value="<?= old('penguji3'); ?>">
                        <datalist id="penguji3">
                          <?php foreach ($dosens as $n => $dosen) : ?>
                            <option value="<?= $dosen->nama; ?>"><?= $dosen->nama; ?></option>
                          <?php endforeach; ?>
                        </datalist>
                        <div class="invalid-feedback"><?= $validation->getError('penguji3'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputtahunlulus" class="col-sm-4 col-form-label">Tahun Lulus</label>
                      <div class="col-sm-8">
                        <select class="custom-select <?= $validation->hasError('tahunlulus') ? 'is-invalid' : ''; ?>" name="tahunlulus" id="inputtahunlulus">
                          <?php if (old('tahunlulus') == null) { ?>
                            <option value="<?= $yearb; ?>"><?= $yearb; ?></option>
                            <option value="<?= $yearn; ?>" <?= 'selected'; ?>><?= $yearn; ?></option>
                            <option value="<?= $yeara; ?>"><?= $yeara; ?></option>
                          <?php } elseif (old('tahunlulus') == $yearb) { ?>
                            <option value="<?= $yearb; ?>" <?= 'selected' ?>><?= $yearb; ?></option>
                            <option value="<?= $yearn; ?>"><?= $yearn; ?></option>
                            <option value="<?= $yeara; ?>"><?= $yeara; ?></option>
                          <?php } elseif (old('tahunlulus') == $yearn) { ?>
                            <option value="<?= $yearb; ?>"><?= $yearb; ?></option>
                            <option value="<?= $yearn; ?>" <?= 'selected' ?>><?= $yearn; ?></option>
                            <option value="<?= $yeara; ?>"><?= $yeara; ?></option>
                          <?php } elseif (old('tahunlulus') == $yeara) { ?>
                            <option value="<?= $yearb; ?>"><?= $yearb; ?></option>
                            <option value="<?= $yearn; ?>"><?= $yearn; ?></option>
                            <option value="<?= $yeara; ?>" <?= 'selected' ?>><?= $yeara; ?></option>
                          <?php } ?>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('tahunlulus'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputgelar" class="col-sm-4 col-form-label">Gelar Akademik</label>
                      <div class="col-sm-8">
                        <select class="custom-select <?= $validation->hasError('gelar') ? 'is-invalid' : ''; ?>" name="gelar" id="inputgelar">
                          <option value="" selected>Pilih gelar...</option>
                          <option value="Sarjana Pendidikan (S.Pd.)">Sarjana Pendidikan (S.Pd.)</option>
                          <option value="Sarjana Akuntansi (S.Ak.)">Sarjana Akuntansi (S.Ak.)</option>
                          <option value="Sarjana Manajemen (S.M.)">Sarjana Manajemen (S.M.)</option>
                          <option value="Sarjana Pertanian (S.P.)">Sarjana Pertanian (S.P.)</option>
                          <option value="Sarjana Komputer (S.Kom.)">Sarjana Komputer (S.Kom.)</option>
                          <option value="Magister Pendidikan (M.Pd.)">Magister Pendidikan (M.Pd.)</option>
                        </select>
                        <div class="invalid-feedback"><?= $validation->getError('gelar'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputnohp" class="col-sm-4 col-form-label">No. Telp/HP</label>
                      <div class="col-sm-8">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">+62</span>
                          </div>
                          <input type="text" class="form-control <?= $validation->hasError('nomorwa') ? 'is-invalid' : ''; ?>" value="<?= $mhs['nomorwa'] ?>" name="nomorwa" id="inputnohp" aria-describedby="basic-addon1" readonly>
                          <div class="invalid-feedback"><?= $validation->getError('nomorwa'); ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                      <div class="col-sm-8">
                        <input type="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : ''; ?>" name="email" id="inputEmail3" value="<?= old('email'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('email'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputfoto" class="col-sm-4 col-form-label"><abbr title="Foto Berwarna, Pakaian Formal, Maks. 1 MB, JPG">Foto</abbr></label>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input <?= $validation->hasError('foto') ? 'is-invalid' : ''; ?>" name="foto" id="inputfoto" onchange="previewFoto()" accept="image/jpg, image/jpeg">
                          <label class="custom-file-label" for="inputfoto" id="fotolabel">Choose file...</label>
                          <div class="invalid-feedback"><?= $validation->getError('foto'); ?></div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4" for="">Abstraksi Skripsi <small>(Bahasa Indonesia)</small></label>
                      <div class="col-sm-8 input-group">
                        <textarea class="form-control <?= $validation->hasError('skripsi1') ? 'is-invalid' : ''; ?>" name="skripsi1" rows="10" spellcheck="false" aria-label="With textarea"></textarea>
                        <div class="invalid-feedback"><?= $validation->getError('skripsi1'); ?></div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4" for="">Abstraksi Skripsi <small>(Bahasa Inggris)</small></label>
                      <div class="col-sm-8 input-group">
                        <textarea class="form-control <?= $validation->hasError('skripsi2') ? 'is-invalid' : ''; ?>" name="skripsi2" rows="10" spellcheck="false" aria-label="With textarea"></textarea>
                        <div class="invalid-feedback"><?= $validation->getError('skripsi2'); ?></div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-10 mt-3 text-center mx-auto">
                        <button type="submit" class="btn btn-primary col-5">Submit</button>
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

<?= $this->endSection(); ?>