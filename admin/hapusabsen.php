<?php include "session.php"; ?>
<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM tb_absen WHERE id_absen = '$id'";

if($koneksi->query($query)) {
  echo "<script>alert('Data berhasil dihapus!'); window.location = 'dataabsen.php'</script>";	
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>