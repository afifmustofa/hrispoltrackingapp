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
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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

  <!-- datatable -->
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
          <li class="breadcrumb-item active">Data CV Karyawan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row-lg-20">
        <div class="col-lg-20">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data CV Karyawan</h5>
              <div class="box-body">
                <table class="table" id="tabel-data">
                <button onclick="document.location='inputcv.php'" class="btn btn-sm btn-success"><i class="fa fa-file"></i>Tambah Data</button>
                  <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Id</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis File</th>
                <th scope="col">Type</th>
                <th scope="col">Ukuran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?Php
                include 'koneksiupload.php';
                $nomor_urut = 0;
                $result = SelectAllData();
                $countdata = mysqli_num_rows($result);

                If ($countdata < 1) { 
            ?>    
                    <tr>
                        <td colspan="5" style="text-align: center; font-weight: bold; font-size: 12px; padding: 5px; color: red">TIDAK ADA DATA</td>
                    </tr>

            <?php
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $nomor_urut = $nomor_urut + 1;
            ?>
                        <tr>
                            <td><?php echo $nomor_urut; ?></td>
                            <td><?php echo $row['id_karyawan']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['jenis']; ?></td>
                            <td><?php echo strtoupper($row['ekstensi']) ?></td>
                            <td><?php echo number_format($row['size']/(1024*1024), 2) ?>MB</td>
                            <td>
                            <a href="downloadpdf.php?url=<?php echo $row['berkas'] ?>" data-toggle="tooltip" title="download file" class="btn btn-sm btn-success"> <i class="bi bi-download"></i> </a>
                            <a href="hapusfilepdf.php?id=<?php echo $row['id_karyawan'] ?>" onclick="return confirm(\'Anda yakin akan menghapus data?/')" class="btn btn-sm btn-danger"> <i class="bi bi-trash"></i>
                            </td>
                        </tr>
            <?php 
                    }
                } 
            ?>
        </tbody>
    </table>
    </div>
            </div>
          </div>
        </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "footer.php"; ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

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

</body>
</html>