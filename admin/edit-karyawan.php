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
      $kd = $_GET['id'];
			$sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan='$kd'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: datakaryawan.php");
			}else{
				$data = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['update'])){
        $namafolder="foto_karyawan/"; //tempat menyimpan file
        if (!empty($_FILES["nama_file"]["tmp_name"]))
        {
          $jenis_gambar       = $_FILES['nama_file']['type'];
          $nik                = $_POST['nik'];
          $nama               = $_POST['nama'];
          $tanggal_masuk      = $_POST['tanggal_masuk'];
          $divisi             = $_POST['divisi'];
          $jabatan            = $_POST['jabatan'];
          $status             = $_POST['status'];
          $agama              = $_POST['agama'];
          $jen_kel            = $_POST['jen_kel'];
          $tanggal_lahir      = $_POST['tanggal_lahir'];
          $pendidikan         = $_POST['pendidikan'];
          $norek              = $_POST['norek'];
          $karkel             = $_POST['karkel'];
          $npwp               = $_POST['npwp'];
          $alamat             = $_POST['alamat'];
          $domisili           = $_POST['domisili'];
          $nohp               = $_POST['nohp'];
          $email              = $_POST['email'];
          $statusnikah        = $_POST['statusnikah'];
          $jumlah_cuti        = $_POST['jumlah_cuti'];
          $username           = $_POST['username'];
          $password1          = $_POST['password'];
          $password           = sha1("$password1");
          $level              = $_POST['level'];
          $posisi             = $_POST['posisi'];
				
				if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	      {			
		    $gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		    if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
        $sql="UPDATE tb_karyawan SET nik='$nik', nama='$nama', tanggal_masuk='$tanggal_masuk', divisi='$divisi', jabatan='$jabatan', status='$status', agama='$agama', jen_kel='$jen_kel', tanggal_lahir='$tanggal_lahir', pendidikan='$pendidikan', norek='$norek', karkel='$karkel', npwp='$npwp', alamat='$alamat', domisili='$domisili', nohp='$nohp', email='$email', statusnikah='$statusnikah', jumlah_cuti='$jumlah_cuti',  username='$username',  password='$password',  level='$level', gambar='$gambar', posisi='$posisi' WHERE id_karyawan='$kd'";
			  $res=mysqli_query($koneksi, $sql) or die (mysqli_error());
			  //echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Data Berhasil di Ubah'); window.location = 'datakaryawan.php'</script>";	   
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
                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                  <div class="col-md-8 col-lg-5">
                    <input name="nik" type="text" id="nik" class="form-control" placeholder="NIK" value="<?php echo $data['nik']; ?>" autocomplete="off" autofocus="on" required="required" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Karyawan</label>
                  <div class="col-md-8 col-lg-5">
                    <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $data['nama']; ?>" placeholder="Nama Karyawan" autocomplete="off" required />        
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="tanggal_masuk" class="col-md-4 col-lg-3 col-form-label">Tanggal Masuk</label>
                  <div class="col-md-8 col-lg-5">
                    <input type='text' class="input-group date form-control" value="<?php echo $data['tanggal_masuk']; ?>" data-date-format="dd-mm-yyyy" name='tanggal_masuk' id="tanggal_masuk" placeholder='Tanggal Masuk' required />          
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="divisi" class="col-md-4 col-lg-3 col-form-label">Divisi</label>
                  <div class="col-md-8 col-lg-5">
                    <select name="divisi" id="divisi" class="form-select" required>
                      <option value="<?php echo $data['divisi']; ?>"> --- Pilih Divisi --- </option>
                        <?php 
                          $combo = $data['nama_divisi'];
                          $query4="select * from divisi";
                          $tampil2=mysqli_query($koneksi, $query4) or die(mysqli_error());
                          while($data3=mysqli_fetch_array($tampil2))
                          {
                        ?>
                        <!--<option value="<?php //echo $data1['nama_divisi'];?>"><?php //echo $data1['nama_divisi'];?></option>-->
                        <?php
                          if ($combo != $data3['nama_divisi']) {
                          echo '<option selected="selected" value="'.$data3['nama_divisi'].'">'.$data3['nama_divisi'].'</option>';
                          }else{
                          echo '<option value="'.$data3['nama_divisi'].'">'.$data3['nama_divisi'].'</option>';
                          }   
                        ?>     
                        <?php } ?>
                    </select> 
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="jabatan" class="col-md-4 col-lg-3 col-form-label">Jabatan</label>
                  <div class="col-md-8 col-lg-5">
                    <select name="jabatan" id="jabatan" class="form-select" required>
                      <option value="<?php echo $data['jabatan']; ?>"> --- Pilih Jabatan --- </option>
                        <?php 
                          $combo1 = $data['jabatan'];
                          $query3="select * from jabatan";
                          $tampil1=mysqli_query($koneksi, $query3) or die(mysqli_error());
                          while($data2=mysqli_fetch_array($tampil1))
                          {
                        ?>
							          <!--<option value="<?php //echo $data1['jabatan'];?>"><?php //echo $data1['id_jabatan'];?> - <?php //echo $data1['jabatan'];?></option>-->
                        <?php    
                          if ($combo1 == $data2['jabatan']) {
                          echo '<option selected="selected" value="'.$data2['jabatan'].'">'.$data2['jabatan'].'</option>';
                          }else{
                          echo '<option value="'.$data2['jabatan'].'">'.$data2['jabatan'].'</option>';
                          }   
                        ?>     
                        <?php } ?>
                    </select>   
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="status" class="col-md-4 col-lg-3 col-form-label">Status Karyawan</label>
                  <div class="col-md-8 col-lg-5">
                    <select name="status" id="status" class="form-select" required="required">
                      <option value="">----- Pilih Status -----</option>
                      <?php $statuskerja = $data['status']; ?>
                      <option <?=($statuskerja=='TETAP')?'selected="selected"':''?>>TETAP</option>
                      <option <?=($statuskerja=='PKWT')?'selected="selected"':''?>>PKWT</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="jumlah_cuti" class="col-md-4 col-lg-3 col-form-label">Jumlah Cuti</label>
                  <div class="col-md-8 col-lg-5">
                    <input name="jumlah_cuti" type="number" id="jumlah_cuti" class="form-control" value="<?php echo $data['jumlah_cuti']; ?>" placeholder="Jumlah Cuti" autocomplete="off" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="agama" class="col-md-4 col-lg-3 col-form-label">Agama</label>
                  <div class="col-md-8 col-lg-5">
                    <select name="agama" id="agama" class="form-select" required="required">
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
                  <label for="jen_kel" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                  <div class="col-md-8 col-lg-5">
                    <select name="jen_kel" id="jen_kel" class="form-select" required="required">
                      <option value="">----- Pilih Jenis Kelamin -----</option>
                      <?php $jen_kel = $data['jen_kel']; ?>
                      <option <?=($jen_kel=='Laki-Laki')?'selected="selected"':''?>>Laki-Laki</option>
                      <option <?=($jen_kel=='Perempuan')?'selected="selected"':''?>>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="tanggal_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-md-8 col-lg-5">
                    <input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='tanggal_lahir' id="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" placeholder='Tanggal Lahir' autocomplete='off' required='required' />
                  </div>
                </div>

                <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label">Pendidikan</label>
                    <div class="col-md-4 col-lg-5">
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
                    <label for="Jabatan" class="col-md-4 col-lg-3 col-form-label">No Rekening</label>
                    <div class="col-md-4 col-lg-5">
                      <input type="number" name="norek" id="norek" placeholder="Nomor Rekening" class="form-control" required="required">
                    </div>
                  </div>

                <div class="row mb-3">
                  <label for="karkel" class="col-md-4 col-lg-3 col-form-label">No Kartu Keluarga</label>
                  <div class="col-md-8 col-lg-5">
                    <input name="karkel" type="text" id="karkel" class="form-control" value="<?php echo $data['karkel']; ?>" placeholder="Kartu Keluarga" autocomplete="off" required /> 
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="npwp" class="col-md-4 col-lg-3 col-form-label">No NPWP</label>
                  <div class="col-md-8 col-lg-5">
                    <input name="npwp" type="text" id="npwp" class="form-control" value="<?php echo $data['npwp']; ?>" placeholder="NPWP" autocomplete="off" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                  <div class="col-md-8 col-lg-5">
                    <input name="alamat" type="text" id="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" placeholder="Alamat" autocomplete="off" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">Alamat Domisili</label>
                  <div class="col-md-8 col-lg-5">
                    <input name="domisili" type="text" id="domisili" class="form-control" value="<?php echo $data['domisili']; ?>" placeholder="Domisili" autocomplete="off" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="domisili" class="col-md-4 col-lg-3 col-form-label">No Handphone</label>
                  <div class="col-md-8 col-lg-5">
                    <input name="nohp" type="text" id="nohp" class="form-control" value="<?php echo $data['nohp']; ?>" placeholder="No HP" autocomplete="off" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                  <div class="col-md-8 col-lg-5">
                    <input name="email" type="text" id="email" class="form-control" value="<?php echo $data['email']; ?>" placeholder="Email" autocomplete="off" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="statusnikah" class="col-md-4 col-lg-3 col-form-label">Status Menikah</label>
                  <div class="col-md-8 col-lg-5">
                    <select name="statusnikah" id="statusnikah" class="form-select" required="required">
                      <option value="">----- Pilih Status Menikah -----</option>
                      <?php $statusnikah = $data['statusnikah']; ?>
                        <option <?=($statusnikah=='Belum Menikah')?'selected="selected"':''?>>Belum Menikah</option>
                        <option <?=($statusnikah=='Menikah - Belum Punya Anak')?'selected="selected"':''?>>Menikah - Belum Punya Anak</option>
                        <option <?=($statusnikah=='Menikah - Anak 1')?'selected="selected"':''?>>Menikah - Anak 1</option>
                        <option <?=($statusnikah=='Menikah - Anak 2')?'selected="selected"':''?>>Menikah - Anak 2</option>
                        <option <?=($statusnikah=='Menikah - Anak 3')?'selected="selected"':''?>>Menikah - Anak 3</option>
                      </select>
                    </div>
                  </div>

                <div class="row mb-3">
                  <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                  <div class="col-md-8 col-lg-5">
                    <input name="username" type="text" id="username" class="form-control" value="<?php echo $data['username']; ?>" placeholder="Username" autocomplete="off" required />          
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                  <div class="col-md-8 col-lg-5">
                    <input name="password" type="text" id="password" class="form-control" value="<?php echo $data['password']; ?>" placeholder="Password" autocomplete="off" required />  
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="level" class="col-md-4 col-lg-3 col-form-label">Level Akun</label>
                  <div class="col-md-8 col-lg-5">
                    <select name="level" id="level" class="form-select" required="required">
                      <option value="">----- Pilih Level Akun -----</option>
                        <?php $level = $data['level']; ?>
                          <option <?=($level=='User')?'selected="selected"':''?>>User</option>
                     </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="nama_file" class="col-md-4 col-lg-3 col-form-label">Gambar</label>
                  <div class="col-md-8 col-lg-5">
                    <input name="nama_file" type="file" id="nama_file" class="form-control" placeholder="Password" autocomplete="off" required />                              
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="level" class="col-md-4 col-lg-3 col-form-label">Posisi Karyawan</label>
                  <div class="col-md-8 col-lg-5">
                    <select name="posisi" id="posisi" class="form-select" required="required">
                      <option value="">----- Pilih Posisi Karyawan -----</option>
                      <?php $posisi = $data['posisi']; ?>
                      <option <?=($posisi=='Aktif')?'selected="selected"':''?>>Aktif</option>
                      <option <?=($posisi=='Non - Aktif')?'selected="selected"':''?>>Non - Aktif</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="nama_file" class="col-md-4 col-lg-3 col-form-label">Simpan</label>
                  <div class="col-md-8 col-lg-5">
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