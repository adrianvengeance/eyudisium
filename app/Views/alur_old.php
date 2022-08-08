<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card o-hidden border-0 shadow my-1">
        <div class="card-body p-0">
          <div class="row">
            <div class="col">
              <div class="p-5">
                <h1 class="responsif text-center text-gray-900">Alur e-Yudisium</h1>
                <hr class="bg-primary px-5" style="height: 1px;">

                <!-- 768 -->

                <div class="accordion" id="accordionExample">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <span class="text-primary mr-2"><i class="bi fa-lg bi-1-circle"></i></span>
                          Mahasiswa melakukan pencarian NPM
                          <!-- <span class="float-right"><i class="bi bi-chevron-double-down"></i></span> -->
                        </button>
                      </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body row px-5">
                        <div class="col-md-9 textresponsif">
                          <p>Jika NPM tidak ada, silakan menghubungi Admin Biro Administrasi Akademik via Whatsapp dinomor ini <a href="https://wa.me/6282135354575" target="_blank">0821-3535-4575</a>, atau datang langsung ke BAAk</p>
                        </div>
                        <div class="col-md-3"><img class="img-fluid img-responsive" loading="lazy" src="<?= base_url('/img/info/undraw_Search_re_x5gq.png') ?>" alt="Search"></div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <span class="text-primary mr-2"><i class="bi fa-lg bi-2-circle"></i></span>
                          Menginputkan data dan berkas awal
                        </button>
                      </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body row px-5">
                        <div class="col-md-3"><img class="img-fluid img-responsive" loading="lazy" src="<?= base_url('/img/info/undraw_Personal_file_re_5joy.png') ?>" alt="Input"></div>
                        <div class="col-md-9 textresponsif">
                          <p class="mb-0">Data dan berkas awal yang diperlukan yaitu:</p>
                          <ul>
                            <li>Nomor yang terhubung dengan Whatsapp</li>
                            <li>KRS Terakhir</li>
                            <li>Berita Acara sidang skripsi</li>
                            <li>Halaman pengesahan</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <span class="text-primary mr-2"><i class="bi fa-lg bi-3-circle"></i></span>
                          Unduh bukti pengajuan akun e-yudisium
                        </button>
                      </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body row px-5">
                        <div class="col-md-9 textresponsif">
                          <p>Setelah selesai mengupload data dan berkas awal yang diperlukan, selanjutnya menunggu agar dibuatkan akun e-yudisium oleh admin.</p>
                          <p>Jika sudah dibuatkan akun maka akan dihubungi lewat nomor Whatsapp.</p>
                        </div>
                        <div class="col-md-3"><img class="img-fluid img-responsive" loading="lazy" src="<?= base_url('/img/info/undraw_Add_user_re_5oib.png') ?>" alt="Account"> </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingFour">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          <span class="text-primary mr-2"><i class="bi fa-lg bi-4-circle"></i></span>
                          Login lalu upload berkas-berkas
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                      <div class="card-body row px-5">
                        <div class="col-md-9 textresponsif">
                          <p>Berkas-berkas yang dibutuhkan seperti foto warna terbaru ukuran 3x4, foto hitam putih, KTM, Akta lahir, Ijazah hingga Surat-surat keterangan lainnya.</p>
                        </div>
                        <div class="col-md-3">
                          <img class="img-fluid img-responsive" loading="lazy" src="<?= base_url('/img/info/undraw_File_manager_re_ms29.png') ?>" alt="Files">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingFive">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          <span class="text-primary mr-2"><i class="bi fa-lg bi-5-circle"></i></span>
                          Isi Data Alumni
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                      <div class="card-body row px-5">
                        <div class="col-md-3">
                          <img class="img-fluid img-responsive" loading="lazy" src="<?= base_url('/img/info/undraw_Profile_details_re_ch9r.png') ?>" alt="Bio">
                        </div>
                        <div class="col-md-9 textresponsif">
                          <p>Data alumni seperti asal sekolah, alamat, nama Ayah/Ibu, dosen pembimbing hingga abstraksi skripsi dalam bahasa Indonesia dan bahasa Inggris.</p>
                          <p>Setelah mengisi data alumni jangan lupa untuk mendownload bukti data alumni.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingSix">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                          <span class="text-primary mr-2"><i class="bi fa-lg bi-6-circle"></i></span>
                          Submit atau ajukan
                        </button>
                      </h2>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                      <div class="card-body row px-5">
                        <div class="col-md-9 textresponsif">
                          <p>Tombol submit yang berarti ajukan yudisium akan berubah bisa diklik setelah berhasil mengupload berkas-berkas dan melengkapi data alumni dan juga apabila masih dalam periode yudisium. Jika periode yudisium sudah lewat, silakan menunggu periode selanjutnya.</p>
                          <p>Setelah mengajukan yudisium, silakan menunggu berkas dan data diverifikasi oleh admin, jika terdapat kekeliruan maka admin akan menghubungi via nomor Whatsapp.</p>
                        </div>
                        <div class="col-md-3">
                          <img class="img-fluid img-responsive" loading="lazy" src="<?= base_url('/img/info/undraw_Done_re_oak4.png') ?>" alt="Done">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingSeven">
                      <h2 class="mb-0">
                        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                          <span class="text-primary mr-2"><i class="bi fa-lg bi-7-circle"></i></span>
                          Datang ke BAAk
                        </button>
                      </h2>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                      <div class="card-body row px-5">
                        <div class="col-md-3">
                          <img class="img-fluid img-responsive" loading="lazy" src="<?= base_url('/img/info/undraw_Working_re_ddwy_newEdited.png') ?>" alt="Visit">
                        </div>
                        <div class="col-md-9 textresponsif">
                          <p>Mahasiswa mengumpulkan isian data alumni yang sudah diunduh dan dicetak beserta foto ukuran 4x5 (hitam putih) dan 4x6 (hitam putih) masing-masing sejumlah 4 lembar ke BAAk.</p>
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

<?= $this->endSection() ?>