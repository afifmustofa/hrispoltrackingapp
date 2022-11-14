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

  <!-- Datatable -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

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
      <h1>HRIS Poltracking Indonesia</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Divisi</li>
          <li class="breadcrumb-item active">Data Divisi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php
if(isset($_POST['simpan'])){
$id  = $_POST['id'];
$divisi = $_POST['divisi'];

$query = mysqli_query($koneksi, "INSERT INTO divisi (id_divisi, nama_divisi) VALUES ('$id', '$divisi')");
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'datadivisi.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'datadivisi.php'</script>";	
} 
}

                ?>
<section class="section">
      <div class="row">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
            <form class="form-horizontal style-form" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <h5 class="card-title">Input Data Keterangan</h5>

              <!-- General Form Elements -->
              <form>                  
                <div class="row mb-3">
                  <label for="id_divisi" class="col-sm-3 col-form-label">Id Divisi</label>
                  <div class="col-md-8 col-lg-9">
                  <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="D"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>" autofocus="on" readonly="readonly" />
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="divisi" class="col-sm-3 col-form-label">Nama Divisi</label>
                  <div class="col-md-8 col-lg-9">
                  <input name="divisi" type="text" id="divisi" class="form-control" placeholder="divisi" autocomplete="off" required />
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-4 col-lg-3 col-form-label">Submit</label>
                  <div class="col-md-8 col-lg-9">
                  <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                <a href="inputdivisi.php" class="btn btn-sm btn-danger">Batal </a>
                  </div>
                </div>
              </form><!-- End General Form Elements -->
            </div>
          </div>
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
	  //options method for call datepicker
	  $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
	</script>

  <script>
    $(function () {
    $(".select2").select2();
    });
  </script>

</body>
</html>