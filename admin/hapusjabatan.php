<?php include "session.php"; ?>
<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM jabatan WHERE id_jabatan = '$id'";

if($koneksi->query($query)) {
  echo "<script>alert('Data berhasil dihapus!'); window.location = 'datajabatan.php'</script>";	
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>