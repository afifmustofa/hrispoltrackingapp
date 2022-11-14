<?php include "session.php"; ?>
<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM tb_karyawan WHERE id_karyawan = '$id'";

if($koneksi->query($query)) {
  echo "<script>alert('Data berhasil dihapus!'); window.location = 'datakaryawan.php'</script>";	
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>