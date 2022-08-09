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

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/src/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<!-- <body class="bg-gradient-primary"> -->

<body class="">


    <?= $this->renderSection('auth_content'); ?>

    <div class="modal fade" id="logoutModalNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to leave?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="/logout" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/src/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/src/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/src/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

    <script>
        function showpass() {
            var x = document.getElementById("passwordid1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function showpass2() {
            var x = document.getElementById("passwordid2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function spass($id) {
            var x = document.getElementById($id);
            if (x.type === 'password') {
                x.type = 'text';
            } else {
                x.type = 'password';
            }
            // } else if (x.type === 'text') {
            //     x.type = 'password';
            // } else {}
        }
    </script>
    <script>
        $(document).ready(function() {
            $("div .roleadmin").hide();
            $("input[name='role']").click(function() {
                var test = $(this).data("role");
                $("div .roleadmin").hide();
                $("#" + test).show();
            });
        });
    </script>

    <!-- delete berkas -->
    <script>
        $(document).on("click", "#rejectBtn", function() {
            $("#rejectModal .modal-body").empty();
            var uri = $(this).data('uri');
            var td = $(this).closest('tr')
            var berkas = td.find('td:eq(0)').html()
            $("#rejectModal .modal-body").append('Yakin mau menghapus berkas ' + berkas + '?');
            $("#rejectModal .modal-footer form").attr("action", uri);
        });
    </script>

</body>

</html>