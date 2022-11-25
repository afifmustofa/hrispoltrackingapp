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
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Data Karyawan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <?php
			if(isset($_POST['update'])){
        $namafolder="foto_karyawan/"; //tempat menyimpan file
        if (!empty($_FILES["nama_file"]["tmp_name"]))
        {
          $jenis_gambar=$_FILES['nama_file']['type'];
				
				if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	      {			
		    $gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
        $sql="UPDATE tb_karyawan SET gambar='$gambar' WHERE id_karyawan='$kd'";
			  $res=mysqli_query($koneksi, $sql) or die (mysqli_error());
			  //echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Foto berhasil di ubah!'); window.location = 'edit-karyawan.php'</script>";	   
          } else {
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p>Gambar gagal dikirim</p></div>';
          }
          } else {
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Jenis gambar yang anda kirim salah. Harus .jpg .gif .png</div>';
          }
          } else {
          echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Anda Belum Memilih Gambar</div>';
          }
        }
			
			    //if(isset($_GET['pesan']) == 'sukses'){
			    //	echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
			    //}
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
    <?php
                $query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan='$_GET[id]'");
                $data  = mysqli_fetch_array($query);
              ?>
                <div class="row mb-3">
                  <label for="nama_file" class="col-md-4 col-lg-3 col-form-label">Gambar</label>
                  <div class="col-md-8 col-lg-7">
                    <input name="nama_file" type="file" id="nama_file" class="form-control" placeholder="Password" autocomplete="off" required />                              
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="nama_file" class="col-md-4 col-lg-3 col-form-label">Simpan</label>
                  <div class="col-md-8 col-lg-7">
                    <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                  <a href="datakaryawan.php" class="btn btn-sm btn-danger">Batal </a>
                  </div> 
                </div>
              </div>
            </form>
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
    $(function () {
    $(".select2").select2();
    });
  </script>

</body>
</html>