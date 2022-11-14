<?php include "session.php"; ?>
<?php 
date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("d-m-Y");
  $jam2 = date("hi");
  $jamSekarang = date("h:i:s");
 ?>

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
    <link href="assets/css/style.css" rel="stylesheet">

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
        <h1>Halo <?php echo $_SESSION ['nama']; ?></h1>
        <br>
      </div><!-- End Page Title -->
        <?php
          if(isset($_POST['simpan'])){
          $id_absen     = $_POST['id_absen'];
          $nama         = $_POST['nama'];
          $tanggal      = $_POST['tanggal'];
          $jammasuk     = $_POST['jammasuk'];
          $jam2         = $_POST['jam2'];
          
          // Validasi tanggal
          $select = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE id_absen='$id_absen' AND tanggal='$tanggal'");
          $row = mysqli_num_rows($select);
          
          if ($row) {
            echo '<script>alert("anda sudah absen untuk hari ini, absen lagi besok!")</script>';
          }else{
            echo '<script>alert("terima kasih")</script>';
            $res =  mysqli_query($koneksi, "INSERT INTO tb_absen SET id_absen='$id_absen', nama='$nama', tanggal='$tanggal', jammasuk='$jammasuk', jam2='$jam2'");
            }
          }
          ?>

      <div class="box-body">
        <div class="form-panel">
          <form class="form-horizontal style-form" action="input-absen.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">NIK </label>
              <div class="col-sm-4">
						    <h5><?=$_SESSION['nik'];?></h5>
							  <input type="text" hidden name="id_absen" value="<?php $a="P"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>">	
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nama </label>
              <div class="col-sm-4">
						    <h5><?=$_SESSION['nama'];?></h5>
                <input type="text" name="nama" hidden value="<?=$_SESSION['nama'];?>">
							  <input type="text" name="tanggal" hidden value="<?=$tanggalSekarang;?>">
							  <input type="text" name="jammasuk" hidden value="<?=$jamSekarang;?>">
                <input type="text" name="jam2" hidden value="<?=$jam2;?>">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Jabatan </label>
              <div class="col-sm-4">
						    <h5><?=$_SESSION['jabatan'];?> <?=$_SESSION['divisi'];?></h5>
              </div>
            </div>
        
						<div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label"></label>
              <div class="col-sm-10">
                <button type="submit" name="simpan" class="btn btn-success" onclick="getLocation()">Absen</button></td>
                <a href="inputketerangan.php"  data-toggle="tooltip" class="btn btn-sm btn-warning">Klik tombol ini jika tidak hadir / absen</i> </a>
              </div>
            </div>
          </form>
        </div>
      </div><!-- /.box-body -->
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
	    //options method for call timepicker
	    $(".input-group.time").timepicker({ use24hours: true});
    </script>
    <script>
      $(function () {
      $(".select2").select2();
      });
    </script>

    <!-- <script type="text/javascript">
      $(function () {
      $('#jam_masuk').datetimepicker({
      format: 'LT'
      });
      });
    </script> -->

  </body>
</html>