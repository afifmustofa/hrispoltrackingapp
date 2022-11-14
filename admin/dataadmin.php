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

    <section class="section">
      <div class="row-lg-20">
        <div class="col-lg-20">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Admin</h5>
              <div class="box-body">
                <?php
                  if(isset($_GET['aksi']) == 'delete'){
				            $id = $_GET['id'];
				            $cek = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id_admin='$id'");
				            if(mysqli_num_rows($cek) == 0){
					          echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				            }else{
					          $delete = mysqli_query($koneksi, "DELETE FROM tb_admin WHERE id_admin='$id'");
					          if($delete){
						        echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					          }else{
						        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					            }
				            }
			            }
			          ?>

                  <!-- Default Table -->
                  <a href="admin_exportxls.php" class="btn btn-sm btn-success"><i class="fa fa-file"></i> Export Excel</a><td><td></td>
                <table id="lookup" class="table"> 
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Id Admin</th>
	                    <th class="text-center">Nama</th>
                      <th class="text-center">No Handphone</th>
                      <th class="text-center">Level</th>
	                    <th class="text-center">Action</th> 
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                      $no = 1;
                      $query = mysqli_query($koneksi,"SELECT * FROM tb_admin ORDER BY id_admin DESC");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                    <td><center><?php echo $no++ ?></center></td>
                    <td><center><?php echo $row['id_admin'] ?></center></td> 
                    <td><center><?php echo $row['nama'] ?></center></td>
                    <td><center><?php echo $row['no_hp'] ?></center></td>
                    <td><center><?php echo $row['level'] ?></center></td>
                    <td class="text-center">
                      <a href="detail-admin.php?id=<?php echo $row['id_admin'] ?>" data-toggle="tooltip" title="profile-overview" class="btn btn-sm btn-success"> <i class="bi bi-search"></i> </a>
                      <a href="editadmin.php?id=<?php echo $row['id_admin'] ?>" data-toggle="tooltip" title="profile-edit" class="btn btn-sm btn-primary"> <i class="bi bi-pencil-square"></i> </a>
                      <a href="hapusadmin.php?id=<?php echo $row['id_admin'] ?>" onclick="return confirm(\'Anda yakin akan menghapus data?/')" class="btn btn-sm btn-danger"> <i class="bi bi-trash"></i> </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <!-- End Default Table Example -->
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

    <!-- <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-data-admin.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
    </script> -->
</body>
</html>
