<?php include "session.php"; ?>
<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM tb_admin WHERE id_admin = '$id'";

if($koneksi->query($query)) {
  echo "<script>alert('Data berhasil dihapus!'); window.location = 'dataadmin.php'</script>";	
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>