<?php include "session.php"; ?>
<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM jenis_cuti WHERE id_cuti = '$id'";

if($koneksi->query($query)) {
  echo "<script>alert('Data berhasil dihapus!'); window.location = 'datajeniscuti.php'</script>";	
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>