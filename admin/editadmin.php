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
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Data Admin</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
      <?php
        $kd = $_GET['id'];
			  $sql = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin='$kd'");
			  if(mysqli_num_rows($sql) == 0){
				header("Location: dataadmin.php");
			  }else{
				$data = mysqli_fetch_assoc($sql);
			  }
			  if(isset($_POST['update'])){
        $namafolder="foto_admin/"; //tempat menyimpan file
        if (!empty($_FILES["nama_file"]["tmp_name"]))
        {
          $jenis_gambar=$_FILES['nama_file']['type'];
          $nama          = $_POST['nama'];
          $no_hp         = $_POST['no_hp'];
          $username      = $_POST['username'];
          $password1     = $_POST['password'];
          $password      = sha1("$password1");
          $level         = $_POST['level'];
		
				if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	      {			
		    $gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
        $sql="UPDATE tb_admin SET nama='$nama', no_hp='$no_hp', username='$username',  password='$password',  level='$level', gambar='$gambar' WHERE id_admin='$kd'";
			  $res=mysqli_query($koneksi, $sql) or die (mysqli_error());
			  //echo "Gambar berhasil dikirim ke direktori".$gambar;
        echo "<script>alert('Data admin berhasil diubah!'); window.location = 'dataadmin.php'</script>";	   
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
      <div class="box-body">
        <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <div class="form-group">
            <div class="row mb-3">
              <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Admin</label>
              <div class="col-md-8 col-lg-7">
                <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $data['nama']; ?>"autocomplete="off" required />        
              </div>
            </div>
            <div class="row mb-3">
              <label for="domisili" class="col-md-4 col-lg-3 col-form-label">No Handphone</label>
              <div class="col-md-8 col-lg-7">
                <input name="no_hp" type="text" id="no_hp" class="form-control" value="<?php echo $data['no_hp']; ?>" placeholder="No HP" autocomplete="off" required />
              </div>
            </div>
            <div class="row mb-3">
              <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
              <div class="col-md-8 col-lg-7">
                <input name="username" type="text" id="username" class="form-control" value="<?php echo $data['username']; ?>" placeholder="Username" autocomplete="off" required />  
              </div>
            </div>
            <div class="row mb-3">
              <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
              <div class="col-md-8 col-lg-7">
                <input name="password" type="text" id="password" class="form-control" value="<?php echo $data['password']; ?>" placeholder="Password" autocomplete="off" required />
              </div>
            </div>
            <div class="row mb-3">
              <label for="level" class="col-md-4 col-lg-3 col-form-label">Level Akun</label>
              <div class="col-md-8 col-lg-7">
                <select name="level" id="level" class="form-select" required="required">
                  <option value="">----- Pilih Level Akun -----</option>
                  <?php $level = $data['level']; ?>
                <option <?=($level=='Admin')?'selected="selected"':''?>>Admin</option>
                </select>
              </div>
            </div>
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
	              <a href="dataadmin.php" class="btn btn-sm btn-danger">Batal </a>
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