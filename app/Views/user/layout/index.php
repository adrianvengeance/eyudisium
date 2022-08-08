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

  <!-- datatables button -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3 my-0 py-0">
          <span>E-Yudisium</span><br>
          <span>UPY</span>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Data Mahasiswa -->
      <li class="nav-item <?= ($uri == base_url('/user/data')) ? "active" : ""; ?>">
        <a class="nav-link" href="/user/data">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Mahasiswa</span></a>
      </li>
      <li class="nav-item <?= ($uri == base_url('/user/submitted')) ? "active" : ""; ?>">
        <a class="nav-link" href="/user/submitted">
          <i class="fas fa-fw fa-sign-in-alt"></i>
          <span>Diajukan</span>
        </a>
      </li>
      <?php if ($user['role'] == 2) : ?>
        <li class="nav-item <?= ($uri == base_url('/user/list')) ? "active" : ""; ?>">
          <a class="nav-link" href="/user/list">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Calon Yudisium</span></a>
        </li>
      <?php endif ?>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider my-0"> -->

      <!-- Nav Item - Set Countdown -->
      <li class="nav-item <?= ($uri == base_url('/user/set')) ? "active" : ""; ?>">
        <a class="nav-link" href="/user/set">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Periode</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider mb-1">

      <li class="nav-item <?= ($uri == base_url('/user/history')) ? "active" : ""; ?>">
        <a class="nav-link" href="/user/history">
          <i class="fas fa-fw fa-history"></i>
          <span>History</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <?php switch ($user['role']) {
          case 1:
            echo "Admin BAAk";
            break;
          case 2:
            echo "Admin Fakultas";
            break;
          case 3:
            echo "Admin Prodi";
            break;
          default:
            echo "";
        } ?>
      </div>

      <!-- Nav Item -  -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span class="text-truncate">Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header text-truncate">User</h6>
            <a class="collapse-item" href="/profile">Profile Settings</a>
            <hr>
            <a class="collapse-item" href="" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </div>
      </li>
      <?php if ($user['role'] == 1) : ?>
        <li class="nav-item">
          <a class="nav-link" href="/register">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Create Admin Account</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/registermahasiswa">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Create Student Account</span>
          </a>
        </li>
      <?php endif ?>

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
        <?php if (session()->getFlashdata('createaccount')) : ?>
          <div class="alert alert-success alert-dismissible mt-1">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success! </strong><?= session()->getFlashdata('createaccount'); ?>
          </div>
        <?php endif ?>
        <?= $this->renderSection('isi'); ?>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?= date(' Y'); ?></span>
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

  <!-- datatables export -->
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

  <!-- delete pengajuan mahasiswa -->
  <script>
    $(document).on("click", "#unfulfilledBtn", function() {
      var nama = $(this).data('nama');
      var uri = $(this).data('uri');
      console.log(nama, uri)
      $("#unfulfilledModal .modal-body").append(nama + ' ?');
      $("#unfulfilledModal .modal-footer form").attr("action", uri);
    });
  </script>

  <!-- unduh hasil pengajuan -->
  <script>
    $(document).on("click", "#ExportPdfBtn", function() {
      $('.buttons-pdf').click()
    })
    $(document).on("click", "#excelListYudisium", function() {
      $('.buttons-excel').click()
    })
  </script>

</body>

</html>