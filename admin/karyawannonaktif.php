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
          <li class="breadcrumb-item">Karyawan</li>
          <li class="breadcrumb-item active">Data Karyawan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
      <?php
      $id = $_GET['id'];
      $sql = mysqli_query($koneksi, "SELECT * FROM tb_keterangan WHERE id_ket='$id'");
      if(mysqli_num_rows($sql) == 0){
      }else{
      $data = mysqli_fetch_assoc($sql);
      }
			if(isset($_POST['update'])){
        $namafolder="foto_karyawan/"; //tempat menyimpan file
        if (!empty($_FILES["nama_file"]["tmp_name"]))
        {
          $jenis_gambar=$_FILES['nama_file']['type'];
          $nik           = $_POST['nik'];
          $nama          = $_POST['nama'];
          $tanggal_masuk = $_POST['tanggal_masuk'];
          $divisi        = $_POST['divisi'];
          $jabatan       = $_POST['jabatan'];
          $status        = $_POST['status'];
          $agama         = $_POST['agama'];
          $jen_kel       = $_POST['jen_kel'];
          $tanggal_lahir       = $_POST['tanggal_lahir'];
          $karkel       = $_POST['karkel'];
          $npwp       = $_POST['npwp'];
          $alamat       = $_POST['alamat'];
          $domisili       = $_POST['domisili'];
          $nohp       = $_POST['nohp'];
          $email       = $_POST['email'];
          $statusnikah       = $_POST['statusnikah'];
          $kontakkeluarga       = $_POST['kontakkeluarga'];
          $jumlah_cuti   = $_POST['jumlah_cuti'];
          $username      = $_POST['username'];
          $password1      = $_POST['password'];
          $password      = sha1("$password1");
          $level         = $_POST['level'];
				
				if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	      {			
		    $gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
        $sql="UPDATE tb_karyawan SET nik='$nik', nama='$nama', tanggal_masuk='$tanggal_masuk', divisi='$divisi', jabatan='$jabatan', status='$status', agama='$agama', jen_kel='$jen_kel', tanggal_lahir='$tanggal_lahir', karkel='$karkel', npwp='$npwp', alamat='$alamat', domisili='$domisili', nohp='$nohp', email='$email', statusnikah='$statusnikah', kontakkeluarga='$kontakkeluarga', jumlah_cuti='$jumlah_cuti',  username='$username',  password='$password',  level='$level', gambar='$gambar' WHERE id_karyawan='$kd'";
			  $res=mysqli_query($koneksi, $sql) or die (mysqli_error());
			  //echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Data karyawan berhasil dimasukan!'); window.location = 'datakaryawan.php'</script>";	   
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
                  <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Karyawan</label>
                  <div class="col-md-8 col-lg-7">
                    <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Nama Karyawan" autocomplete="off" required />        
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="status" class="col-md-4 col-lg-3 col-form-label">Status Karyawan</label>
                  <div class="col-md-8 col-lg-7">
                    <select name="status" id="status" class="form-select" required="required">
                      <option value="">----- Pilih Status -----</option>
                      <?php $statuskerja = $data['status']; ?>
                      <option <?=($statuskerja=='nonaktif')?'selected="selected"':''?>>Arsipkan</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="tanggal_masuk" class="col-md-4 col-lg-3 col-form-label">Tanggal Diarsipkan</label>
                  <div class="col-md-8 col-lg-7">
                    <input type='date' class="input-group date form-control" data-date-format="dd-mm-yyyy" name='tanggal_masuk' id="tanggal_masuk" placeholder='Tanggal Diarsipkan' required />          
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