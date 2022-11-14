<?php include "session.php"; ?>

<?php 
date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("d-m-Y");
  $jamSekarang = date("h:i a");
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
        $kode          = $_POST['kode'];
        $nama           = $_POST['nama'];
        $tanggal_awal  = $_POST['tanggal_awal'];
        $tanggal_akhir = $_POST['tanggal_akhir'];
        $jumlah        = $_POST['jumlah'];
        $jenis_cuti    = $_POST['jenis_cuti'];
        $ket           = $_POST['ket'];
        $jam_masuk           = $_POST['jam_masuk'];
        $tanggal           = $_POST['tanggal'];
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE nama='$nama'");
        if(mysqli_num_rows($sql) == 0){
				// header("Location: cuti.php");
		  	}else{
				$row = mysqli_fetch_assoc($sql);
        }
            
        $jumlah_cuti = $row['jumlah_cuti'];
        $nama = $row['nama'];

        if ($jumlah_cuti == 0) {
        echo "<script>alert('cuti $nama sudah habis, tidak bisa membuat cuti!'); window.location = 'inputcuti.php'</script>";
        } else if ($jumlah_cuti <= 0) {
        echo "<script>alert('cuti $nama sudah habis, tidak bisa membuat cuti!'); window.location = 'inputcuti.php'</script>";
        } else {

        $query = mysqli_query($koneksi, "INSERT INTO tb_cuti (kode, nama, tanggal_awal, tanggal_akhir, jumlah, jenis_cuti, ket, jam_masuk, tanggal) VALUES ('$kode', '$nama', '$tanggal_awal', '$tanggal_akhir', '$jumlah', '$jenis_cuti', '$ket', '$jam_masuk','$tanggal')");
        $qu	   = mysqli_query($koneksi, "UPDATE tb_karyawan SET jumlah_cuti=(jumlah_cuti-'$jumlah') WHERE nama='$nama'");
        if ($query&&$qu){
        echo "<script>alert('cuti $nama berhasil di buat!'); window.location = 'index.php'</script>";
	      //echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
        }
        }
        }
      ?>

    <section class="section">
      <div class="row">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
            <form class="form-horizontal style-form" action="inputcuti.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <h5 class="card-title">Input Data Cuti</h5>
              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                  <label for="kode" class="col-sm-3 col-form-label">Id Cuti</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="kode" id="kode" type="text" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="CT"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>"autofocus="on" readonly="readonly">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Karyawan</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="text" class="form-control" name="nama" id="nama" value="<?=$_SESSION['nama'];?>" readonly="readonly"> 
                  </div>
                </div>

                  <input type="text" hidden name="tanggal" value="<?=$tanggalSekarang;?>">
                  <input type="text" hidden name="jam_masuk" value="<?=$jamSekarang;?>"> 
            
                <div class="row mb-3">
                  <label for="nama" class="col-md-4 col-lg-3 col-form-label">Tanggal Awal Cuti</label>
                  <div class="col-md-8 col-lg-9">
                    <input type='date' class="input-group date form-control" data-date="" data-date-format="dd-mm-yyyy" name='tanggal_awal' id="tanggal_awal" placeholder='Tanggal Awal Cuti' autocomplete='off' required='required'/>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="nama" class="col-md-4 col-lg-3 col-form-label">Tanggal Akhir Cuti</label>
                  <div class="col-md-8 col-lg-9">
                    <input type='date' class="input-group date form-control" data-date="" data-date-format="dd-mm-yyyy" name='tanggal_akhir' id="tanggal_akhir" placeholder='Tanggal Akhir Cuti' autocomplete='off' required='required' />
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="nama" class="col-md-4 col-lg-3 col-form-label">Jumlah Cuti</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="jumlah" type="number" id="jumlah" class="form-control" placeholder="Jumlah Cuti" autocomplete="off" required />
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-4 col-lg-3 col-form-label">Jenis Cuti</label>
                  <div class="col-md-8 col-lg-9">
                    <select name="jenis_cuti" id="jenis_cuti" class="form-control select2" required>
                      <option value=""> --- Pilih Jenis Cuti --- </option>
                      <?php 
                      $query2="select * from jenis_cuti order by id_cuti";
                      $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error());
                      while($data1=mysqli_fetch_array($tampil))
                      {
                      ?>  
							        <option value="<?php echo $data1['nama_cuti'];?>"><?php echo $data1['nama_cuti'];?></option>
						          <?php } ?>                             
                    </select> 
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-4 col-lg-3 col-form-label">Keterangan</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="ket" type="text" id="ket" class="form-control" placeholder="Keterangan" autocomplete="off" required />
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label class="col-md-4 col-lg-3 col-form-label">Simpan</label>
                  <div class="col-md-8 col-lg-9">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                  <a href="inputcuti.php" class="btn btn-sm btn-danger">Batal </a>
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
