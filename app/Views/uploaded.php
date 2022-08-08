<?= $this->extend('/layout/index'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <div class="card o-hidden border-0 shadow my-1">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-sm">
                            <div class="p-5">
                                <div>
                                    <h1 class="responsif text-center text-gray-900">Selesai</h1>
                                </div>
                                <hr class="bg-primary px-5" style="height: 1px;">
                                <p class="p textresponsif">Terima kasih <?= $isi['nama']; ?></p>
                                <p class="p textresponsif pb-1">Data berhasil diunggah dan sedang diverifikasi.
                                    <br>Selanjutnya tunggu pemberitahuan lewat No. Whatsapp.
                                    <br>Silakan unduh bukti pengajuan pembuatan akun e-Yudisium.</br>
                                </p>
                                <!-- phone size -->
                                <a href="<?= base_url('mahasiswa/done') ?>" class="btn btn-primary btn-sm btn-block d-md-none" target="_blank"><i class="fas fa-download mr-3"></i>Bukti Pengajuan Akun</a>
                                <!--desktop size-->
                                <a href="<?= base_url('mahasiswa/done') ?>" class=" btn btn-primary btn-sm btn-block d-none d-md-block mx-auto col-4" target="_blank"><i class="fas fa-download mr-3"></i>Bukti Pengajuan Akun</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>