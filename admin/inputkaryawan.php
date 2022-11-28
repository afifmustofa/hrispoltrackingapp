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

    <section class="section">
      <div class="row">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <form action="tambah-karyawan.php" method="POST" enctype="multipart/form-data">
                <h5 class="card-title">Input Data Karyawan</h5>
                <!-- General Form Elements -->
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-4 col-lg-7">
                      <div class="pt-2">
                        <input class="form-control" name="nama_file" type="file" id="nama_file" require=""/>
                      </div>
                    </div>
                  </div> 

                  <div class="row mb-3">
                    <label for="id_karyawan" class="col-sm-3 col-form-label">Id Karyawan</label>
                    <div class="col-md-4 col-lg-7">
                      <input name="id_karyawan" id="id_karyawan" type="text" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="K"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>"autofocus="on" readonly="readonly">
                    </div>
                  </div>
                    
                  <div class="row mb-3">
                    <label for="nik" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                    <div class="col-md-4 col-lg-7">
                      <input name="nik" type="text" id="nik" class="form-control" placeholder="NIK" autocomplete="off" autofocus="on" required="required" />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                    <div class="col-md-4 col-lg-7">
                      <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama Karyawan" autocomplete="off" required />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="nik" class="col-md-4 col-lg-3 col-form-label">Tanggal Masuk</label>
                    <div class="col-md-4 col-lg-7">
                      <input type='date' class="input-group date form-control" data-date="" data-date-format="dd-mm-yyyy" name='tanggal_masuk' id="tanggal_masuk" placeholder='Tanggal Masuk' autocomplete='off' required='required' />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Jabatan</label>
                    <div class="col-md-4 col-lg-7">
                      <select class="form-select" aria-label="Default select example" name="jabatan" id="jabatan" class="form-control" required="required">
                        <option value="">----- Pilih Jabatan -----</option>
                          <?php 
                            $query2="select * from jabatan order by id_jabatan";
                            $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error());
                            while($data1=mysqli_fetch_array($tampil))
                            {
                          ?>
							            <option value="<?php echo $data1['jabatan'];?>"><?php echo $data1['id_jabatan'];?> - <?php echo $data1['jabatan'];?></option>
						              <?php } ?>    
                      </select>   
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Divisi</label>
                    <div class="col-md-4 col-lg-7">
                      <select class="form-select" aria-label="Default select example" name="divisi" id="divisi" class="form-control" required="required">
                        <option value="">----- Pilih Divisi -----</option>
                          <?php 
                            $query2="select * from divisi order by id_divisi";
                            $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error());
                            while($data1=mysqli_fetch_array($tampil))
                            {
                          ?>           
							          <option value="<?php echo $data1['nama_divisi'];?>"><?php echo $data1['id_divisi'];?> - <?php echo $data1['nama_divisi'];?></option>
						            <?php } ?>      
                      </select> 
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Status Karyawan</label>
                    <div class="col-md-4 col-lg-7">
                      <select class="form-select" aria-label="Default select example" name="status" id="status" required="required">
                        <option value="">----- Pilih Status -----</option>
                        <?php $statuskerja = $data['status']; ?>
                        <option <?=($statuskerja=='TETAP')?'selected="selected"':''?>>TETAP</option>
                        <option <?=($statuskerja=='PKWT')?'selected="selected"':''?>>PKWT</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Jabatan" class="col-md-4 col-lg-3 col-form-label">Jumlah Cuti</label>
                    <div class="col-md-4 col-lg-7">
                      <input type="number" name="jumlah_cuti" id="jumlah_cuti" placeholder="Jumlah Cuti" class="form-control" required="required">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Agama</label>
                    <div class="col-md-4 col-lg-7">
                      <select class="form-select" aria-label="Default select example" name="agama" id="agama" class="form-control" required="required">
                        <option value="">----- Pilih Agama -----</option>
                        <?php $agama = $data['agama']; ?>
                        <option <?=($agama=='Islam')?'selected="selected"':''?>>Islam</option>
                        <option <?=($agama=='Kristen')?'selected="selected"':''?>>Kristen</option>
                        <option <?=($agama=='Katolik')?'selected="selected"':''?>>Katolik</option>  
                        <option <?=($agama=='Hindu')?'selected="selected"':''?>>Hindu</option>
                        <option <?=($agama=='Buddha')?'selected="selected"':''?>>Buddha</option>
                        <option <?=($agama=='Kong Hu Cu')?'selected="selected"':''?>>Kong Hu Cu</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-4 col-lg-7">
                      <select class="form-select" aria-label="Default select example" name="jen_kel" id="jen_kel" class="form-control" required="required">
                        <option value="">----- Pilih Jenis Kelamin -----</option>
                        <?php $jen_kel = $data['jen_kel']; ?>
                        <option <?=($jen_kel=='Laki-Laki')?'selected="selected"':''?>>Laki-Laki</option>
                        <option <?=($jen_kel=='Perempuan')?'selected="selected"':''?>>Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="tangal_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-4 col-lg-7">
                      <input type='date' class="input-group date form-control" data-date="" data-date-format="dd-mm-yyyy" name='tanggal_lahir' id="tanggal_lahir" placeholder='Tanggal Lahir' autocomplete='off' required='required' />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Pendidikan</label>
                    <div class="col-md-4 col-lg-7">
                      <select class="form-select" aria-label="Default select example" name="pendidikan" id="pendidikan" class="form-control" required="required">
                        <option value="">----- Pilih Pendidikan -----</option>
                        <?php $pendidikan = $data['pendidikan']; ?>
                        <option <?=($pendidikan=='SMA')?'selected="selected"':''?>>SMA</option>
                        <option <?=($pendidikan=='D3')?'selected="selected"':''?>>D3</option>
                        <option <?=($pendidikan=='S1')?'selected="selected"':''?>>S1</option>  
                        <option <?=($pendidikan=='S2')?'selected="selected"':''?>>S2</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="karkel" class="col-md-4 col-lg-3 col-form-label">Kartu Keluarga</label>
                    <div class="col-md-4 col-lg-7">
                      <input name="karkel" type="text" id="karkel" class="form-control" placeholder="Kartu Keluarga" autocomplete="off" required />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="npwp" class="col-md-4 col-lg-3 col-form-label">NPWP</label>
                    <div class="col-md-4 col-lg-7">
                      <input name="npwp" type="text" id="npwp" class="form-control" placeholder="NPWP" autocomplete="off" required />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="npwp" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                    <div class="col-md-4 col-lg-7">
                      <input name="alamat" type="text" id="alamat" class="form-control" placeholder="Alamat" autocomplete="off" required />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Domisili</label>
                    <div class="col-md-4 col-lg-7">
                      <input name="domisili" type="text" id="domisili" class="form-control" placeholder="Domisili" autocomplete="off" required />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">No Handphone</label>
                    <div class="col-md-4 col-lg-7">
                      <input name="nohp" type="number" id="nohp" class="form-control" placeholder="No HP" autocomplete="off" required />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-4 col-lg-7">
                      <input name="email" type="text" id="email" class="form-control" placeholder="Email" autocomplete="off" required />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Status Menikah</label>
                    <div class="col-md-4 col-lg-7">
                      <select class="form-select" aria-label="Default select example" name="statusnikah" id="statusnikah" class="form-control" required="required">
                        <option value="">----- Pilih Status Menikah -----</option>
                        <?php $statusnikah = $data['statusnikah']; ?>
                        <option <?=($statusnikah=='TK-0')?'selected="selected"':''?>>Belum Menikah</option>
                        <option <?=($statusnikah=='K-0')?'selected="selected"':''?>>Menikah - Belum Punya Anak</option>
                        <option <?=($statusnikah=='K-1')?'selected="selected"':''?>>Menikah - Anak 1</option>
                        <option <?=($statusnikah=='K-2')?'selected="selected"':''?>>Menikah - Anak 2</option>
                        <option <?=($statusnikah=='K-3')?'selected="selected"':''?>>Menikah - Anak 3</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                    <div class="col-md-4 col-lg-7">
                      <input name="username" type="text" id="username" class="form-control" placeholder="Username" autocomplete="off" required />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                    <div class="col-md-4 col-lg-7">
                      <input name="password" type="text" id="password" class="form-control" placeholder="Password" autocomplete="off" required />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Level Akun</label>
                    <div class="col-md-4 col-lg-7">
                      <select class="form-select" aria-label="Default select example" name="level" id="level" class="form-control" required="required">
                        <option value="">----- Pilih Level Akun -----</option>
                        <?php $level = $data['level']; ?>
                        <option <?=($level=='User')?'selected="selected"':''?>>User</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                  <label for="level" class="col-md-4 col-lg-3 col-form-label">Posisi Karyawan</label>
                  <div class="col-md-8 col-lg-7">
                  <select name="posisi" id="posisi" class="form-select" required="required">
                  <option value="">----- Pilih Posisi Karyawan -----</option>
                      <?php $posisi = $data['posisi']; ?>
                        <option <?=($posisi=='Aktif')?'selected="selected"':''?>>Aktif</option>
                        <option <?=($posisi=='Non - Aktif')?'selected="selected"':''?>>Non - Aktif</option>
                      </select>
                    </div>
                  </div>

                <div class="row mb-3">
                  <label for="submit" class="col-md-4 col-lg-3 col-form-label">Submit</label>
                  <div class="col-md-8 col-lg-7">
                      <input type="submit" name="input" value="Simpan"  id="input" class="btn btn-sm btn-primary" />&nbsp;
	                    <a href="inputkaryawan.php" class="btn btn-sm btn-danger">Batal </a>
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