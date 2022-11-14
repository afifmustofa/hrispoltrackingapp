<?php include "session.php"; ?>
<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM divisi WHERE id_divisi = '$id'";

if($koneksi->query($query)) {
  echo "<script>alert('Data berhasil dihapus!'); window.location = 'datadivisi.php'</script>";	
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>