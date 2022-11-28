<?php include "session.php"; ?>
<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM tb_kel WHERE id_karyawan = '$id'";

if($koneksi->query($query)) {
  echo "<script>alert('Data berhasil dihapus!'); window.location = 'datakeluarga.php'</script>";	
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>