<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="<?= base_url('img/upy-logo-80.png') ?>" />

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/newstyle.css">

    <title><?= $title; ?></title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="/img/upy-logo-big.png" class="mr-2" height="36">e-Yudisium</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav nav-fill">
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/alur">Alur</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>
        $('.carousel').carousel();

        $(document).ready(function() {
            $("#fakultas").change(function() {
                var val = $(this).val();
                if (val == "") {
                    $("#prodi").html("<option value=''>Pilih Prodi</option>")
                } else if (val == "Sains dan Teknologi") {
                    $("#prodi").html("<option value='Informatika'>Informatika</option><option value='Teknik Industri'>Teknik Indsutri</option><option value='Vokasi Sarjana Terapan Teknologi Rekayasa Elektro-medis'>Teknologi Rekayasa Elektro-medis</option><option value='Arsitektur'>Arsitektur</option><option value='Teknik Biomedis'>Teknik Biomedis</option><option value='Gizi'>Gizi</option><option value='Farmasi'>Farmasi</option>")
                } else if (val == "Pertanian") {
                    $("#prodi").html("<option value='Agroteknologi'>Agroteknologi</option><option value='Teknologi Hasil Pertanian'>Teknologi Hasil Pertanian</option>")
                } else if (val == "Bisnis") {
                    $("#prodi").html("<option value='Akuntansi'>Akuntansi</option><option value='Manajemen'>Manajemen</option><option value='Bisnis Digital'>Bisnis Digital</option>")
                } else if (val == "FKIP") {
                    $("#prodi").html("<option value='Bimbingan dan Konseling'>Bimbingan dan Konseling</option><option value='Pendidikan Pancasila dan Kewarganegaraan'>Pendidikan Pancasila dan Kewarganegaraan</option><option value='Pendidikan Guru Pendidikan Anak Usia Dini'>Pendidikan Guru Pendidikan Anak Usia Dini</option><option value='Pendidikan Luar Biasa'>Pendidikan Luar Biasa</option><option value='Pendidikan Guru Sekolah Dasar'>Pendidikan Guru Sekolah Dasar</option><option value='Pendidikan Matematika'>Pendidikan Matematika</option><option value='Pendidikan Bahasa dan Sastra Indonesia'>Pendidikan Bahasa dan Sastra Indonesia</option><option value='Pendidikan Sejarah'>Pendidikan Sejarah</option><option value='Pendidikan Bahasa Inggris'>Pendidikan Bahasa Inggris</option><option value='Pendidikan Vokasional Teknologi Otomotif'>Pendidikan Vokasional Teknologi Otomotif</option><option value='Pasca Sarjana PIPS'>Pasca Sarjana PIPS</option>")
                }
            });
        });

        function krsPreview() {
            const krs = document.querySelector('#krs');
            const krslabel = document.querySelector('#krs_label');
            krslabel.textContent = krs.files[0].name;
        }

        function beritaPreview() {
            const berita = document.querySelector('#berita_acara');
            const beritalabel = document.querySelector('#berita_acara_label');
            beritalabel.textContent = berita.files[0].name;
        }

        function halPreview() {
            const hal = document.querySelector('#hal_pengesahan');
            const hallabel = document.querySelector('#hal_pengesahan_label');
            hallabel.textContent = hal.files[0].name;
        }
    </script>

</body>

</html>