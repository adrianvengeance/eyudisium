<!doctype html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="Content-Style-Type" content="text/css" />
  <meta name="generator" content="Aspose.Words for .NET 17.1.0.0" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title><?= $title; ?></title>

  <style>
    body {
      font-family: 'Times New Roman', Times, serif;
    }

    h3 {
      /* display: block; */
      margin-left: auto;
      margin-right: auto;
      font-size: 20px;
      text-align: center;
    }

    #pic {
      padding-right: 10px;
    }

    #image {
      /* object-fit: cover;
      background-size: cover;
      width: 144px;
      height: 192px; */
      width: 144px;
      height: 192px;
      display: block;
      position: relative;
      overflow: hidden;
      /* background-image: url("<?= $uri ?>"); */
      /* background-size: cover; */
      /* background-repeat: no-repeat; */
      /* background-position: 50% 50%; */
    }

    img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
    }

    #ttd {
      margin-left: 400px;
      margin-top: 100px;
      text-align: center;
    }
  </style>
</head>

<body>
  <h3 class="text-center mt-3"><?= $title; ?></h3>
  <br><br><br>
  <table class="table table-borderless">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td rowspan="9" id="pic">
          <div id=image>
            <img src="<?= $uri ?>" alt="">
          </div>
        </td>
        <td>Nama</td>
        <td colspan="2">: <?= $mhs['nama']; ?></td>
      </tr>
      <tr>

        <td>NIM</td>
        <td colspan="2">: <?= $info['npmmhs']; ?></td>
      </tr>
      <tr>

        <td>Tempat, tanggal lahir</td>
        <td colspan="2">: <?= $info['tempatlahir'] . ', ' . $tgllhr; ?></td>
      </tr>
      <tr>

        <td>Alamat</td>
        <td colspan="2">: <?= $info['alamatrumah']; ?></td>
      </tr>
      <tr>

        <td>Nama <?= $info['ortu']; ?></td>
        <td colspan="2">: <?= $info['namaortu']; ?></td>
      </tr>
      <tr>

        <td>Asal sekolah</td>
        <td colspan="2">: <?= $info['asalsekolah']; ?></td>
      </tr>
      <tr>

        <td>Judul <?= $info['jenista']; ?></td>
        <td colspan="2">: <?= $info['judulid']; ?></td>
      </tr>
      <tr>

        <td>Pembimbing I</td>
        <td colspan="2">: <?= $info['dosbim1']; ?></td>
      </tr>
      <tr>

        <td>Pembimbing II</td>
        <td colspan="2">: <?= $info['dosbim2']; ?></td>
      </tr>
    </tbody>
  </table>
  <p>
    Saya telah mengunggah berkas yudisium sesuai dengan ketentuan dan saya menyatakan bahwa data tersebut
    benar serta dapat dicantumkan pada Ijazah, Transkip Nilai dan Buku Wisuda.
  </p>
  <table class="table table-borderless" id="ttd">
    <thead>
      <tr>
        <th width="33%"></th>
        <th width="33%"></th>
        <th width="33%"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td></td>
        <td>Yogyakarta, <?= $today; ?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><?= $mhs['nama']; ?></td>
      </tr>
    </tbody>
  </table>

</body>

</html>