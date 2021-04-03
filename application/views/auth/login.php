<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gereja Tiberias Indonesia - Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/backend/')  ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-login-image">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center mt-5 mb-5">
                                        <img src="<?= base_url('assets/images/tiberias_main_logo.png') ?>" width="80">
                                    </div>
                                    <form class="user" method="POST" action="<?= base_url('Login/proses') ?>">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                placeholder="Masukkan username anda .......">
                                            <?php echo form_error('username') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                            <?php echo form_error('password') ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <br>
                                        <br>
                                        <br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/backend/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/backend/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/backend/') ?>js/sb-admin-2.min.js"></script>

    <!-- sweet alert -->
    <script src="<?= base_url('assets/sweetalert/') ?>sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            <?php if($this->session->flashdata('message')) { ?>
              <?php if($this->session->flashdata('tipe') == "success") { ?>
                Swal.fire({
                  text: '<?php echo $this->session->flashdata('message');?>',
                  icon: '<?php echo $this->session->flashdata('tipe');?>',
                })
              <?php }else{ ?>
                Swal.fire({
                  title: 'Oops.....',
                  text: '<?php echo $this->session->flashdata('message');?>',
                  icon: '<?php echo $this->session->flashdata('tipe');?>',
                })
              <?php } ?>
            <?php } ?>
      });
    </script>
</body>

</html>