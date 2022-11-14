<?php include "session.php"; ?>
<?php include "waktu.php"; ?>
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
      <br>
      <h1>Halo <?php echo $_SESSION ['nama']; ?></h1>
      <br>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!--columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Presensi Card -->
            <div class="col-xl-3 col-md-4">
              <div class="card info-card presensi-card">
                <div class="card-body">
                  <h5 class="card-title">Presensi <span>| Today</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check"></i>
                    </div>
                    <div class="ps-3">
                      <a href="input-absen.php" class="card-title">
                        <h7>Isi Presensi</h7>
                      </a>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Presensi Card -->

            <!-- Cuti Card -->
            <div class="col-xl-3 col-md-4">
              <div class="card info-card cuti-card">
                <div class="card-body">
                  <h5 class="card-title">Cuti <span>| Today</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-briefcase"></i>
                    </div>
                    <div class="ps-3">
                      <a href="inputcuti.php" class="card-title">
                        <h7>Ajukan Cuti</h7>
                      </a>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Cuti Card -->

            <!-- Keterangan Card -->
            <div class="col-xl-3 col-md-4">
              <div class="card info-card ket-card">
                <div class="card-body">
                  <h5 class="card-title">Izin</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-list"></i>
                    </div>
                    <div class="ps-3">
                      <a href="inputketerangan.php" class="card-title">
                        <h7>Ajukan Izin</h7>
                      </a>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Keterangan Card -->
          </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "footer.php"; ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>

  <!-- datepicker -->
  <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>

</body>

</html>