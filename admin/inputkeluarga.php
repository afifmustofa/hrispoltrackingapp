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
          <li class="breadcrumb-item active">Data Keluarga Karyawan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <?php
          if(isset($_POST['simpan'])){
            $id_karyawan            = $_POST['id_karyawan'];
            $namakel                = $_POST['namakel'];
            $hubungan               = $_POST['hubungan'];
            $nohp                   = $_POST['nohp'];
            $anak1                  = $_POST['anak1'];
            $anak2                  = $_POST['anak2'];
            $anak3                  = $_POST['anak3'];
            $anak4                  = $_POST['anak4'];
          
            $query = mysqli_query($koneksi, "INSERT INTO tb_kel (id_karyawan, namakel, hubungan, nohp, anak1, anak2, anak3, anak4) VALUES ('$id_karyawan', '$namakel', '$hubungan', '$nohp', '$anak1', '$anak2', '$anak3', '$anak4')");

            if ($query){
                echo "<script>alert('Data Keluarga berhasil di buat!'); window.location = 'datakeluarga.php'</script>";
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
            <form action="inputkeluarga.php" method="POST" enctype="multipart/form-data">   
              <h5 class="card-title">Input Data Keluarga Karyawan</h5>
               <!-- General Form Elements -->
               <form>
                <div class="row mb-3">
                <label for="id_karyawan" class="col-md-4 col-lg-3 col-form-label">Nama Karyawan</label>
                 <div class="col-md-8 col-lg-8">
                    <select name="id_karyawan" id="id_karyawan" class="form-select" aria-label="Default select example">
                              <option value=""> --- Pilih Karyawan --- </option>
                              <?php 
                    $query2="select * from tb_karyawan order by id_karyawan";
                    $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
							      <option value="<?php echo $data1['id_karyawan'];?>"><?php echo $data1['id_karyawan'];?> - <?php echo $data1['nama'];?></option>
						    <?php } ?>
                              
                    </select> 
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="namakel" class="col-md-4 col-lg-3 col-form-label">Nama Keluarga</label>
                  <div class="col-md-8 col-lg-8">
                    <input type="text" name="namakel" id="namakel" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Hubungan</label>
                    <div class="col-md-4 col-lg-8">
                      <select class="form-select" aria-label="Default select example" name="hubungan" id="hubungan" required="required">
                        <option value="">----- Pilih Hubungan -----</option>
                        <?php $statuskerja = $data['hubungan']; ?>
                        <option <?=($statuskerja=='hubungan')?'selected="selected"':''?>>Istri</option>
                        <option <?=($statuskerja=='hubungan')?'selected="selected"':''?>>Suami</option>
                        <option <?=($statuskerja=='hubungan')?'selected="selected"':''?>>Ayah</option>
                        <option <?=($statuskerja=='hubungan')?'selected="selected"':''?>>Ibu</option>
                      </select>
                    </div>
                  </div>


                <div class="row mb-3">
                  <label for="nohp" class="col-md-4 col-lg-3 col-form-label">No Handphone</label>
                  <div class="col-md-8 col-lg-8">
                    <input type="number" name="nohp" id="nohp" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="anak1" class="col-md-4 col-lg-3 col-form-label">Nama Anak Ke 1</label>
                  <div class="col-md-8 col-lg-8">
                    <input type="text" name="anak1" id="anak1" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="anak2" class="col-md-4 col-lg-3 col-form-label">Nama Anak Ke 2</label>
                  <div class="col-md-8 col-lg-8">
                    <input type="text" name="anak2" id="anak2" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="anak3" class="col-md-4 col-lg-3 col-form-label">Nama Anak Ke 3</label>
                  <div class="col-md-8 col-lg-8">
                    <input type="text" name="anak3" id="anak3" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="anak4" class="col-md-4 col-lg-3 col-form-label">Nama Anak Ke 4</label>
                  <div class="col-md-8 col-lg-8">
                    <input type="text" name="anak4" id="anak4" class="form-control">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-md-4 col-lg-3 col-form-label">Submit</label>
                  <div class="col-md-8 col-lg-8">
                    <input type="submit" name="simpan" id="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                  <a href="datakaryawan.php" class="btn btn-sm btn-danger">Batal </a>
                  </div>
                </div>
              </form><!-- End Multi Columns Form -->
            </div>
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