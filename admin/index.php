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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!--columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Employee Card -->
            <div class="col-xl-3 col-md-4">
              <div class="card info-card employee-card">
                <div class="card-body rounded">
                  <?php $tampil=mysqli_query($koneksi, "select * from tb_karyawan order by id_karyawan desc");
                        $total=mysqli_num_rows($tampil);
                  ?>
                  <h5 class="card-title">Jumlah Karyawan</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total; ?></h6>
                    </div>
                  </div>
                  <a href="datakaryawan.php" class="card-title"><span><center>See More</center></span></a>
                </div>
              </div>
            </div><!-- End Employee Card -->

            <!-- Presensi Card -->
            <div class="col-xl-3 col-md-4">
              <div class="card info-card presensi-card">
                <div class="card-body">
                  <?php 
                  $tgl = date("d-m-Y");
                  $tampil=mysqli_query($koneksi, "select tb_karyawan.*, tb_absen.* from tb_karyawan, tb_absen where tb_karyawan.nama=tb_absen.nama and tb_absen.tanggal='$tgl'");
                  $total1=mysqli_num_rows($tampil);
                  ?>
                  <h5 class="card-title">Presensi <span>| Today</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total1; ?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                    </div>
                  </div>
                  <a href="dataabsen.php" class="card-title"><span><center>See More</center></span></a>
                </div>
              </div>
            </div><!-- End Presensi Card -->

            <!-- Cuti Card -->
            <div class="col-xl-3 col-md-4">
              <div class="card info-card cuti-card">
                <div class="card-body">
                  <?php 
                  $tgl = date("Y-m-d");
                  $tampil=mysqli_query($koneksi, "select tb_karyawan.*, tb_cuti.* from tb_karyawan, tb_cuti where tb_karyawan.nama=tb_cuti.nama and tb_cuti.tanggal_awal='$tgl'");
                  $total3=mysqli_num_rows($tampil);
                  ?>
                  <h5 class="card-title">Cuti <span>| Today</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-briefcase"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total3; ?></h6>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->
                    </div>
                  </div>
                  <a href="datacuti.php" class="card-title"><span><center>See More</center></span></a>
                </div>
              </div>
            </div><!-- End Cuti Card -->

            <!-- Keterangan Card -->
            <div class="col-xl-3 col-md-4">
              <div class="card info-card ket-card">
                <div class="card-body">
                  <?php 
                  $tgl = date("d-m-Y");
                  $tampil=mysqli_query($koneksi, "select tb_karyawan.*, tb_keterangan.* from tb_karyawan, tb_keterangan where tb_karyawan.nama=tb_keterangan.nama and tb_keterangan.tanggal='$tgl'");
                  $total2=mysqli_num_rows($tampil);
                  ?>
                  <h5 class="card-title">Keterangan <span>| Today</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-list"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total2; ?></h6>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->
                    </div>
                  </div>
                  <a href="dataketerangan.php" class="card-title"><span><center>See More</center></span></a>
                </div>
              </div>
            </div><!-- End Keterangan Card -->


          <!-- Left side columns -->
          <div class="col-lg-6">
          <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Cuti <span>| Today</span></h5>
                    <?php
                    $tgl = date("Y-m-d");
                    $query1="select tb_karyawan.*, tb_cuti.* from tb_karyawan, tb_cuti where tb_karyawan.nama=tb_cuti.nama and tb_cuti.tanggal_awal='$tgl'";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table class="table table-borderless table-stripped rows">
                    <thead>
                      <tr>
                        <th><center>Nama</center></th>
                        <th><center>Cuti</center></th>
                        <th><center>Jumlah</center></th>
                        <th><center>Tgl Mulai</center></th>
                        <th><center>Tgl Akhir</center></th>
                      </tr>
                    </thead>
                      <?php 
                      //$no=0;
                      while($data=mysqli_fetch_array($tampil))
                      { //$no++; ?>
                    <tbody>
                      <tr>
                        <td><center><?php echo $data['nama'];?></center></td>
                        <td><center><?php echo $data['jenis_cuti'];?></center></td>
                        <td><center><?php echo $data['jumlah'];?></center></td>
                        <td><center><?php echo $data['tanggal_awal'];?></center></td>
                        <td><center><?php echo $data['tanggal_akhir'];?></center></td>
                      </tr>
                        <?php   
                        } 
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- End Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Status Karyawan</h5>
                  <?php include "koneksi.php"; ?>
                  <?php 
                    $tetap = mysqli_query($koneksi, "SELECT status FROM tb_karyawan WHERE status = 'TETAP' ");
                    $pkwt  = mysqli_query($koneksi, "SELECT status FROM tb_karyawan WHERE status = 'PKWT' ");
                  ?>
                <head>
              <script src="assets/vendor/chart.js/chart.min.js"></script>
                  <style type="text/css">
                    .container {
                    width: 70%;
                    margin: 15px auto;
                    }
                  </style>
                </head>
                <body>
                  <div class="container">
                    <canvas id="chart" ></canvas>
                  </div>
                <script>
                  var ctx = document.getElementById("chart").getContext("2d");
                  var myChart = new Chart(ctx, {
                  // tipe chart
                  type: 'pie',
                  data: {
                  labels: ['TETAP', 'PKWT'],
                  //dataset adalah data yang akan ditampilkan
                  datasets: [{
                  label: 'status karyawan',
                    //hitung jumlah laki-laki dan jumlah perempuan
                    data: [
                        <?php echo mysqli_num_rows($tetap); ?>,
                        <?php echo mysqli_num_rows($pkwt);?>,
                        ],
                    //atur background barchartnya
                    //karena cuma dua, maka 2 saja yang diatur
                    backgroundColor: [
                        'rgb(8, 153, 46)',
                        'rgb(235, 235, 5)'
                    ],

                    //atur border barchartnya
                    //karena cuma dua, maka 2 saja yang diatur
                    borderColor: [
                      'rgb(8, 153, 46)',
                      'rgb(235, 235, 5)'
                        
                    ],
                    borderWidth: 1
                    }]
                    },
                    options: {
                  scales: {
                  yAxes: [{
                  ticks: {
                  beginAtZero: true
                  }
                  }]
                  }
                  }
                });
              </script>
            </body>
                </div>
              </div>
            </div><!-- End Budget Report -->
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-6">
          <!-- Budget Report -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Cuti Karyawan Habis</h5>
                    <?php
                    $query1="select * from tb_karyawan where jumlah_cuti <=0";
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table class="table table-borderless table-stripped rows">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Sisa Cuti</th>
                      </tr>
                    </thead>
                      <?php 
                      //$no=0;
                      while($data=mysqli_fetch_array($tampil))
                      { //$no++; ?>
                    <tbody>
                      <tr>
                        <td><center><?php echo $data['id_karyawan'];?></center></td>
                        <td><center><?php echo $data['nama'];?></center></td>
                        <td><center><?php echo $data['jumlah_cuti'];?> Hari</center></td>
                      </tr></div>
                      <?php   
                      } 
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- End Budget Report -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Jenis Kelamin Karyawan</h5>
                  <?php include "koneksi.php"; ?>
                  <?php 
                    $lakilaki       = mysqli_query($koneksi, "SELECT jen_kel FROM tb_karyawan WHERE jen_kel = 'Laki - Laki' ");
                    $perempuan      = mysqli_query($koneksi, "SELECT jen_kel FROM tb_karyawan WHERE jen_kel = 'Perempuan' ");
                  ?>
                <head>
              <script src="assets/vendor/chart.js/chart.min.js"></script>
                  <style type="text/css">
                    .container {
                    width: 70%;
                    margin: 15px auto;
                    }
                  </style>
                </head>
                <body>
                  <div class="container">
                    <canvas id="myChart" ></canvas>
                  </div>
                <script>
                  var ctx = document.getElementById("myChart").getContext("2d");
                  var myChart = new Chart(ctx, {
                  // tipe chart
                  type: 'pie',
                  data: {
                  labels: ['Laki-laki', 'Perempuan'],
                  //dataset adalah data yang akan ditampilkan
                  datasets: [{
                  label: 'jumlah jenis kelamin',
                    //hitung jumlah laki-laki dan jumlah perempuan
                    data: [
                        <?php echo mysqli_num_rows($lakilaki); ?>,
                        <?php echo mysqli_num_rows($perempuan);?>,
                        ],
                    //atur background barchartnya
                    //karena cuma dua, maka 2 saja yang diatur
                    backgroundColor: [
                        'rgb(6, 57, 112)',
                        'rgb(242, 29, 129)'
                    ],

                    //atur border barchartnya
                    //karena cuma dua, maka 2 saja yang diatur
                    borderColor: [
                        'rgb(6, 57, 112)',
                        'rgb(242, 29, 129)',
                        
                    ],
                    borderWidth: 1
                    }]
                    },
                    options: {
                  scales: {
                  yAxes: [{
                  ticks: {
                  beginAtZero: true
                  }
                  }]
                  }
                  }
                });
              </script>
            </body>
                </div>
              </div>
            </div><!-- End Budget Report -->
        </div><!-- End Right side columns -->
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
      $.widget.bridge('uibutton', $.ui.button);
    </script>

  <!-- datepicker -->
  <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>

</body>
</html>