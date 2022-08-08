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
                <div class="d-none d-md-block">
                  <h1 class="responsif text-center text-gray-900">e-Yudisium Universitas PGRI Yogyakarta</h1>
                </div>
                <div class="d-md-none">
                  <h1 class="responsif text-center text-gray-900">e-Yudisium</h1>
                  <h1 class="responsif text-center text-gray-900">Universitas PGRI Yogyakarta</h1>
                </div>
                <hr class="bg-primary px-5" style="height: 1px;">
                <div class="row">
                  <div class="col-md-6">
                    <div class="p-1">
                      <div class="row text-gray-900">
                        <div class="carou-wrap mx-auto">
                          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li class="bg-primary active" data-target="#carouselExampleCaptions" data-slide-to="0"></li>
                              <li class="bg-primary" data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                              <li class="bg-primary" data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                              <li class="bg-primary" data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                              <!-- BISNIS -->
                              <div class="carousel-item active" data-interval="4000">
                                <div class="d-block mx-auto" style="width: 16rem;">
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center pt-0">
                                      <h5 class="text-primary mb-0"><?= $bisnis->fakultas; ?></h5>
                                    </li>
                                    <li class="list-group-item text-center font-weight-bold"><?= $sbisnis; ?></li>
                                    <li class="list-group-item py-2">
                                      <dl class="row mb-0 py-0">
                                        <dt class="col-sm-5 mb-0">Periode</dt>
                                        <dd class="col-sm-7 mb-0"><?= date("F", $bwbisnis) . " "; ?></dd>
                                      </dl>
                                    </li>
                                    <li class="list-group-item py-2">
                                      <dl class="row mb-0">
                                        <dt class="col-sm-5 mb-0">Tanggal</dt>
                                        <dd class="col-sm-7 mb-0"><?= date('d, ', $bwbisnis); ?>Hari <?= $hbisnis; ?></dd>
                                      </dl>
                                    </li>
                                    <li class="list-group-item pt-1 pb-5">
                                      <h5 class="small text-center text-muted my-0 py-0" id="demo1"></h5>
                                      <script>
                                        // Set the date we're counting down to
                                        // 1. JavaScript
                                        // var countDownDate = new Date("Sep 5, 2018 15:37:25").getTime();
                                        // 2. PHP 'Nov 2, 2021 00:00:01'
                                        var countDownDate1 = <?php echo $bwbisnis ?> * 1000;
                                        var now1 = <?php echo time() ?> * 1000;

                                        // Update the count down every 1 second
                                        var x1 = setInterval(function() {

                                          // Get todays date and time
                                          // 1. JavaScript
                                          // var now1 = new Date().getTime();
                                          // 2. PHP
                                          now1 = now1 + 1000;

                                          // Find the distance between now1 an the count down date
                                          var distance1 = countDownDate1 - now1;

                                          // Time calculations for days, hours, minutes and seconds
                                          var days1 = Math.floor(distance1 / (1000 * 60 * 60 * 24));
                                          var hours1 = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                          var minutes1 = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
                                          var seconds1 = Math.floor((distance1 % (1000 * 60)) / 1000);

                                          // Output the result in an element with id="demo1"
                                          document.getElementById("demo1").innerHTML = days1 + " hari, " + hours1 + " jam, " +
                                            minutes1 + " menit, " + seconds1 + " detik. ";

                                          // If the count down is over, write some text 
                                          if (distance1 < 0) {
                                            clearInterval(x1);
                                            document.getElementById("demo1").innerHTML = "EXPIRED";
                                          }
                                        }, 1000);
                                      </script>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <!-- FKIP -->
                              <div class="carousel-item" data-interval="4000">
                                <div class="d-block mx-auto" style="width: 16rem;">
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center pt-0">
                                      <h5 class="text-primary mb-0"><?= $fkip->fakultas; ?></h5>
                                    </li>
                                    <li class="list-group-item text-center font-weight-bold"><?= $sfkip; ?></li>
                                    <li class="list-group-item py-2">
                                      <dl class="row mb-0 py-0">
                                        <dt class="col-sm-5 mb-0">Periode</dt>
                                        <dd class="col-sm-7 mb-0"><?= date("F", $bwfkip) . " "; ?></dd>
                                      </dl>
                                    </li>
                                    <li class="list-group-item py-2">
                                      <dl class="row mb-0">
                                        <dt class="col-sm-5 mb-0">Tanggal</dt>
                                        <dd class="col-sm-7 mb-0"><?= date('d, ', $bwfkip); ?>Hari <?= $hfkip; ?></dd>
                                      </dl>
                                    </li>
                                    <li class="list-group-item pt-1 pb-5">
                                      <h5 class="small text-center text-muted my-0 py-0" id="demo2"></h5>
                                      <script>
                                        var countDownDate2 = <?php echo $bwfkip ?> * 1000;
                                        var now2 = <?php echo time() ?> * 1000;

                                        var x2 = setInterval(function() {
                                          now2 = now2 + 1000;
                                          var distance2 = countDownDate2 - now2;

                                          var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
                                          var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                          var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
                                          var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);

                                          document.getElementById("demo2").innerHTML = days2 + " hari, " + hours2 + " jam, " +
                                            minutes2 + " menit, " + seconds2 + " detik. ";

                                          if (distance2 < 0) {
                                            clearInterval(x2);
                                            document.getElementById("demo2").innerHTML = "EXPIRED";
                                          }
                                        }, 1000);
                                      </script>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <!-- PERTANIAN -->
                              <div class="carousel-item" data-interval="4000">
                                <div class="d-block mx-auto" style="width: 16rem;">
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center pt-0">
                                      <h5 class="text-primary mb-0"><?= $pertanian->fakultas; ?></h5>
                                    </li>
                                    <li class="list-group-item text-center font-weight-bold"><?= $spertanian; ?></li>
                                    <li class="list-group-item py-2">
                                      <dl class="row mb-0 py-0">
                                        <dt class="col-sm-5 mb-0">Periode</dt>
                                        <dd class="col-sm-7 mb-0"><?= date("F", $bwpertanian) . " "; ?></dd>
                                      </dl>
                                    </li>
                                    <li class="list-group-item py-2">
                                      <dl class="row mb-0">
                                        <dt class="col-sm-5 mb-0">Tanggal</dt>
                                        <dd class="col-sm-7 mb-0"><?= date('d, ', $bwpertanian); ?>Hari <?= $hpertanian; ?></dd>
                                      </dl>
                                    </li>
                                    <li class="list-group-item pt-1 pb-5">
                                      <h5 class="small text-center text-muted my-0 py-0" id="demo3"></h5>
                                      <script>
                                        var countDownDate3 = <?php echo $bwpertanian ?> * 1000;
                                        var now3 = <?php echo time() ?> * 1000;

                                        var x = setInterval(function() {
                                          now3 = now3 + 1000;

                                          var distance3 = countDownDate3 - now3;

                                          var days3 = Math.floor(distance3 / (1000 * 60 * 60 * 24));
                                          var hours3 = Math.floor((distance3 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                          var minutes3 = Math.floor((distance3 % (1000 * 60 * 60)) / (1000 * 60));
                                          var seconds3 = Math.floor((distance3 % (1000 * 60)) / 1000);

                                          document.getElementById("demo3").innerHTML = days3 + " hari, " + hours3 + " jam, " +
                                            minutes3 + " menit, " + seconds3 + " detik. ";

                                          if (distance3 < 0) {
                                            clearInterval(x);
                                            document.getElementById("demo3").innerHTML = "EXPIRED";
                                          }
                                        }, 1000);
                                      </script>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                              <!-- SAINTEK -->
                              <div class="carousel-item" data-interval="4000">
                                <div class="d-block mx-auto" style="width: 16rem;">
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center pt-0">
                                      <h5 class="text-primary mb-0"><?= $saintek->fakultas; ?></h5>
                                    </li>
                                    <li class="list-group-item text-center font-weight-bold"><?= $ssaintek; ?></li>
                                    <li class="list-group-item py-2">
                                      <dl class="row mb-0 py-0">
                                        <dt class="col-sm-5 mb-0">Periode</dt>
                                        <dd class="col-sm-7 mb-0"><?= date("F", $bwsaintek) . " "; ?></dd>
                                      </dl>
                                    </li>
                                    <li class="list-group-item py-2">
                                      <dl class="row mb-0">
                                        <dt class="col-sm-5 mb-0">Tanggal</dt>
                                        <dd class="col-sm-7 mb-0"><?= date('d, ', $bwsaintek); ?>Hari <?= $hsaintek; ?></dd>
                                      </dl>
                                    </li>
                                    <li class="list-group-item pt-1 pb-5">
                                      <h5 class="small text-center text-muted my-0 py-0" id="demo4"></h5>
                                      <script>
                                        var countDownDate4 = <?php echo $bwsaintek ?> * 1000;
                                        var now4 = <?php echo time() ?> * 1000;

                                        var x4 = setInterval(function() {
                                          now4 = now4 + 1000;

                                          var distance4 = countDownDate4 - now4;

                                          var days4 = Math.floor(distance4 / (1000 * 60 * 60 * 24));
                                          var hours4 = Math.floor((distance4 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                          var minutes4 = Math.floor((distance4 % (1000 * 60 * 60)) / (1000 * 60));
                                          var seconds4 = Math.floor((distance4 % (1000 * 60)) / 1000);

                                          document.getElementById("demo4").innerHTML = days4 + " hari, " + hours4 + " jam, " +
                                            minutes4 + " menit, " + seconds4 + " detik. ";

                                          if (distance4 < 0) {
                                            clearInterval(x4);
                                            document.getElementById("demo4").innerHTML = "EXPIRED";
                                          }
                                        }, 1000);
                                      </script>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr class="d-md-none">

                  <div class="col-lg-6">
                    <div class="p-1">
                      <div class="row">
                        <div class="col">
                          <div class="col-12">
                            <h5 class="h5 textresponsif">Berkas awal yang perlu dikumpulkan oleh Mahasiswa:</h5>
                          </div>
                          <div class="col-12 mb-3">
                            <div class="row p-0 textresponsif">
                              <div class="col-2 text-right"><span>
                                  <i class="far fa-file-pdf"></i>
                                </span></div>
                              <div class="col-10 text-left">KRS Terakhir</div>
                              <div class="col-2 text-right"><span>
                                  <i class="far fa-file-pdf"></i>
                                </span></div>
                              <div class="col-10 text-left">Berita Acara Sidang Skripsi</div>
                              <div class="col-2 text-right"><span>
                                  <i class="far fa-file-pdf"></i>
                                </span></div>
                              <div class="col-10 text-left">Halaman Pengesahan</div>
                              <div class="col-2 text-right"><span>
                                  <i class="fab fa-whatsapp"></i>
                                </span></div>
                              <div class="col-10 text-left">No. Whatsapp</div>
                            </div>
                          </div>
                          <div class="col-12 textresponsif">
                            <div class="row">
                              <div class="col-12">
                                <form action="/find" method="post">
                                  <?= csrf_field(); ?>
                                  <div class="input-group textresponsif">
                                    <input type="text" id="cari" name="cari" placeholder="Masukan NPM.." class="form-control" autofocus>
                                    <span class="input-group-btn">
                                      <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </span>
                                  </div>
                                </form>
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                  <div class="alert alert-danger alert-dismissible mt-1">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <!-- <strong>Error! </strong>--><?= session()->getFlashdata('pesan'); ?>
                                  </div>
                                <?php endif ?>
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
  </div>
</div>

<?= $this->endSection() ?>