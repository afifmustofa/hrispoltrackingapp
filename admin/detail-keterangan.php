<?php include "session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>HRIS Poltracking Indonesia</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/stylecss.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include "header.php"; ?>

    <!-- ======= Sidebar ======= -->
    <?php include "menu.php"; ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Keterangan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Keterangan</li>
          <li class="breadcrumb-item active">Data Keterangan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <!-- <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <?php
                $query = mysqli_query($koneksi, "SELECT * FROM tb_keterangan WHERE id_ket='$_GET[id]'");
                $data  = mysqli_fetch_array($query);
              ?>
              <img src="<?php echo $data['gambar']; ?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $data['nama']?></h2>
              <h3><?php echo $data['jabatan']; ?> <?php echo $data['divisi']; ?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div> -->
          </div>
        </div>
        <?php
          $query = mysqli_query($koneksi, "SELECT * FROM tb_keterangan WHERE id_ket='$_GET[id]'");
          $data  = mysqli_fetch_array($query);
        ?>
        <div class="col-xl-8">
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>
              </ul>
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>
                  <div class="row">
                    <div class="col-6 col-md-4 label ">Id Keterangan</div>
                    :
                    <div class="col-6 col-md-4 "> <?php echo $data['id_ket']?></div>
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-4 label ">Nama</div>
                    :
                    <div class="col-6 col-md-4 "> <?php echo $data['nama']?></div>
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-4 label ">Tanggal Masuk</div>
                    :
                    <div class="col-6 col-md-4 "><?php echo $data['tanggal']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-4 label ">Jam Masuk</div>
                    :
                    <div class="col-6 col-md-4 "><?php echo $data['jam_masuk']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-4 label ">Keterangan</div>
                    :
                    <div class="col-6 col-md-4 "><?php echo $data['ket']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-4 label ">Alasan</div>
                    :
                    <div class="col-6 col-md-4 "><?php echo $data['alasan']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-4 label ">Tanggal Dibuat</div>
                    :
                    <div class="col-6 col-md-4 "><?php echo $data['tanggal']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-6 col-md-4 label ">Jam Dibuat</div>
                    :
                    <div class="col-6 col-md-4 "><?php echo $data['jam_masuk']; ?></div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-6 col-md-4 label ">Gambar</div>
                    <div class="col-6 col-md-4 "><?php echo $data['gambar']; ?></div>
                  </div> -->
                </div>
              </div>
            </div><!-- End Bordered Tabs -->
          </div>
        </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "footer.php"; ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

    
  <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>

  <script src="../plugins/select2/select2.full.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
	  //options method for call datepicker
	  $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
  </script>

  <script>
    $('.datepicker').datepicker();
  </script>

  <script>
     $(function () {
    $(".select2").select2();
    });
    </script>

<script>
        $(document).ready(function() {
				var dataTable = $('tabeldata').DataTable( {
				} );
			} );
        </script>

</body>
</html>