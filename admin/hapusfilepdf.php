<?php include "session.php"; ?>
<?php

include('koneksi.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM tb_file WHERE id_file = '$id'";

if($koneksi->query($query)) {
  echo "<script>alert('Data berhasil dihapus!'); window.location = 'datafile.php'</script>";	
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>