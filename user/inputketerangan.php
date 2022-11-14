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
            $id_ket            = $_POST['id_ket'];
            $nama              = $_POST['nama'];
            $tanggal           = $_POST['tanggal'];
            $jam_masuk         = $_POST['jam_masuk'];
            $ket               = $_POST['ket'];
            $alasan            = $_POST['alasan'];
          
            $query = mysqli_query($koneksi, "INSERT INTO tb_keterangan (id_ket, nama, tanggal, jam_masuk, ket, alasan) VALUES ('$id_ket', '$nama', '$tanggal', '$jam_masuk', '$ket', '$alasan')");

            if ($query){
                echo "<script>alert('Keterangan $nama berhasil di buat!'); window.location = 'inputketerangan.php'</script>";
              //echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
                    }else{
                      echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
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
                  <label for="id_ket" class="col-sm-3 col-form-label">Id Keterangan</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="id_ket" id="id_ket" type="text" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="Ket"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>"autofocus="on" readonly="readonly">
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
                  <label class="col-md-4 col-lg-3 col-form-label">Keterangan</label>
                  <div class="col-md-8 col-lg-9">
                    <select class="form-select" aria-label="Default select example" name="ket" id="ket" class="form-control" required="required">
                        <option value="">----- Pilih Keterangan -----</option>
                        <?php $ket = $data['ket']; ?>
                        <option <?=($ket=='Izin')?'selected="selected"':''?>>Izin</option>
                        <option <?=($ket=='Sakit')?'selected="selected"':''?>>Sakit</option>
                        <option <?=($ket=='DL')?'selected="selected"':''?>>Dinas Luar</option>  
                    </select>
                  </div>
                </div>
                  
    
                <div class="row mb-3">
                <label for="alasan" class="col-md-4 col-lg-3 col-form-label">Alasan</label>
                 <div class="col-md-8 col-lg-9">
                 <input name="alasan" type="text" id="alasan" class="form-control" placeholder="Tulis Alasan" autocomplete="off" required />
                  </div>
                </div>

                <!-- <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Gambar</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="pt-2">
                          <input name="nama_file" type="file" id="nama_file" class="btn btn-primary btn-sm" title="Upload new profile image" class="bi bi-upload"></input>
                          <a class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>
                            
                    
                <div class="row mb-3">
                  <label class="col-md-4 col-lg-3 col-form-label">Status</label>
                  <div class="col-md-8 col-lg-9">
                  <select class="form-select" aria-label="Default select example" name="status" id="status" class="form-control" required="required">
                    <option value="">----- Pilih Status -----</option>
                    <?php $status = $data['status']; ?>
                    <option <?=($status=='Diterima')?'selected="selected"':''?>>Diterima</option>
                    <option <?=($status=='Ditunda')?'selected="selected"':''?>>Ditunda</option>
                    <option <?=($status=='Ditolak')?'selected="selected"':''?>>Ditolak</option>
                    </select>
                    </div>
                </div> -->
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label"></label>
                    <div class="col-sm-">
                      <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                    <a href="input-keterangan.php" class="btn btn-sm btn-danger">Batal </a>
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
