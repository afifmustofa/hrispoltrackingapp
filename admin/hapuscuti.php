<?php include "session.php"; ?>
<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM tb_cuti WHERE kode = '$id'";

if($koneksi->query($query)) {
  echo "<script>alert('Data berhasil dihapus!'); window.location = 'datacuti.php'</script>";	
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>