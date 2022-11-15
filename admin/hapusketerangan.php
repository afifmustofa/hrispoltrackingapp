<?php include "session.php"; ?>
<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM tb_keterangan WHERE id_ket = '$id'";

if($koneksi->query($query)) {
  echo "<script>alert('Data Keterangan $nama berhasil dihapus!'); window.location = 'dataketerangan.php'</script>";	
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>