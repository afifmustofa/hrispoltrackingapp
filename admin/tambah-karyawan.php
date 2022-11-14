<?php include "session.php"; ?>
<?php
                if(isset($_POST['input'])){
			$namafolder="foto_karyawan/"; //tempat menyimpan file
      
      if (!empty($_FILES["nama_file"]["tmp_name"]))
      {
              $jenis_gambar=$_FILES['nama_file']['type'];
              $id_karyawan    = $_POST['id_karyawan'];
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
            $sql="INSERT INTO tb_karyawan (id_karyawan, nik, nama, tanggal_masuk, divisi, jabatan, status, agama, jen_kel, tanggal_lahir, karkel, npwp, alamat, domisili, nohp, email, statusnikah, kontakkeluarga, jumlah_cuti ,username, password, level, gambar) VALUES
                  ('$id_karyawan', '$nik','$nama','$tanggal_masuk','$divisi','$jabatan','$status', '$agama', '$jen_kel', '$tanggal_lahir', '$karkel', '$npwp', '$alamat', '$domisili', '$nohp', '$email', '$statusnikah', '$kontakkeluarga','$jumlah_cuti','$username','$password','$level','$gambar')";
            $res=mysqli_query($koneksi, $sql) or die (mysqli_error());
            //echo "Gambar berhasil dikirim ke direktori".$gambar;
                  echo "<script>alert('Data berhasil dimasukan!'); window.location = 'datakaryawan.php'</script>";	   
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
			?>
        
          
    