<?php include "session.php"; ?>
<?php
                if(isset($_POST['simpan'])){
			$namafolder="foto_admin/"; //tempat menyimpan file
      
      if (!empty($_FILES["nama_file"]["tmp_name"]))
      {
$jenis_gambar   =$_FILES['nama_file']['type'];
$id_admin       = $_POST['id_admin'];
$username      = $_POST['username'];
$password1      = $_POST['password'];
$password      = sha1("$password1");
$nama          = $_POST['nama'];
$no_hp       = $_POST['no_hp'];
$level        = $_POST['level'];

if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
{			
  $gambar = $namafolder . basename($_FILES['nama_file']['name']);		
  if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
    $sql="INSERT INTO tb_admin (id_admin, username, password, nama, no_hp, level, gambar) VALUES('$id_admin','$username','$password','$nama','$no_hp','$level', '$gambar')";
    $res=mysqli_query($koneksi, $sql) or die (mysqli_error());
    //echo "Gambar berhasil dikirim ke direktori".$gambar;
          echo "<script>alert('Data berhasil dimasukan!'); window.location = 'dataadmin.php'</script>";	   
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

    