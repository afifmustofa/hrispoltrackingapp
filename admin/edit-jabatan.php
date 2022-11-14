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
          <li class="breadcrumb-item">Data Jabatan</li>
          <li class="breadcrumb-item active">Edit Data Jabatan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php
      $id = $_GET['id'];
			$sql = mysqli_query($koneksi, "SELECT * FROM jabatan WHERE id_jabatan='$id'");
			if(mysqli_num_rows($sql) == 0){
				// header("Location: cuti.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['update'])){
			    $id_jabatan     = $_POST['id_jabatan'];
			    $jabatan        = $_POST['jabatan'];
				$update = mysqli_query($koneksi, "UPDATE jabatan SET id_jabatan='$id_jabatan', jabatan='$jabatan'");
                if($update){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
			
			//if(isset($_GET['pesan']) == 'sukses'){
			//	echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
			//}
			?>
     <div class="box-body">
              <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="form-group">
                  <div class="row mb-3">
                    <label for="nama" class="col-md-4 col-lg-3 col-form-label">Id Jabatan</label>
                      <div class="col-md-6 col-lg-6">
                        <input name="id_jabatan" type="text" id="id_jabatan" class="form-control" placeholder="Tidak perlu di isi" value="<?php echo $row['id_jabatan']; ?>" autofocus="on" readonly="readonly" />
                      </div>
                  </div>
                  <div class="row mb-3">
                    <label for="jabatan" class="col-md-4 col-lg-3 col-form-label">Jabatan</label>
                    <div class="col-md-6 col-lg-6">
                      <input name="jabatan" type="text" id="jabatan" class="form-control" value="<?php echo $row['jabatan']; ?>" autocomplete="off" required />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="nama" class="col-md-4 col-lg-3 col-form-label">Simpan</label>
                    <div class="col-md-6 col-lg-6">
                      <input type="submit" name="update" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                    <a href="datajabatan.php" class="btn btn-sm btn-danger">Batal </a>                      </div>
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