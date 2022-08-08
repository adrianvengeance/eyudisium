<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/x-icon" href="<?= base_url('img/upy-logo-80.png') ?>" />
    <title><?= $title; ?></title>

    <!-- Custom fonts for this template -->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/newstyle.css">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center disabled" href="">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-school"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <span>E-Yudisium</span><br>
                    <span>UPY</span>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Data Mahasiswa -->
            <li class="nav-item <?= ($uri == base_url('/user/mahasiswa/berkas')) ? "active" : ""; ?>">
                <a class="nav-link" href="/user/mahasiswa/berkas">
                    <i class="fas fa-fw fa-file-upload"></i>
                    <span>Upload Berkas</span></a>
            </li>

            <!-- Divider -->
            <!-- <hr class="sidebar-divider my-0"> -->

            <!-- Nav Item - Set Countdown -->
            <li class="nav-item <?= ($uri == base_url('/user/mahasiswa/alumni')) ? "active" : ""; ?>">
                <a class="nav-link" href="/user/mahasiswa/alumni">
                    <i class="fas fa-fw fa-graduation-cap"></i>
                    <span>Data Alumni</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Mahasiswa
            </div>

            <!-- Nav Item -  -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span class="text-truncate"><?= $user['nama']; ?></span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-truncate">User</h6>
                        <a class="collapse-item" href="/profile">Profile</a>
                        <hr>
                        <a class="collapse-item" href="" data-toggle="modal" data-target="#logoutModal">Logout</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand d-md-none navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                </nav>
                <!-- End of Topbar -->

                <br>

                <!-- Begin Page Content -->

                <?= $this->renderSection('isi'); ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/js/demo/datatables-demo.js"></script>

    <!-- Bootstrap untuk nav active -->
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.js"></script>

    <script>
        $(document).ready(function() {
            $("#judulta").change(function() {
                var val = $(this).val();
                if (val == "") {
                    $("#labeljudul").html("Judul Skripsi <small>(dalam bahasa Inggris)</small>")
                } else if (val == "Skripsi") {
                    $("#labeljudul").html("Judul Skripsi <small>(dalam bahasa Inggris)</small>")
                } else if (val == "Tesis") {
                    $("#labeljudul").html("Judul Tesis <small>(dalam bahasa Inggris)</small>")
                }
            });
        });

        function previewFoto() {
            const krs = document.querySelector('#inputfoto');
            const krslabel = document.querySelector('#fotolabel');
            krslabel.textContent = krs.files[0].name;
        }

        function previewskripsi1() {
            const krs = document.querySelector('#inputskripsi1');
            const krslabel = document.querySelector('#skripsi1label');
            krslabel.textContent = krs.files[0].name;
        }

        function previewskripsi2() {
            const krs = document.querySelector('#inputskripsi2');
            const krslabel = document.querySelector('#skripsi2label');
            krslabel.textContent = krs.files[0].name;
        }
    </script>

</body>

</html>