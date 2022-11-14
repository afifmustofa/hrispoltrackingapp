<?php 

$koneksi = mysqli_connect('localhost','root','','poltrackinghr');

// ----------------------------------------SETTING SECTION-------------------------------------------------------------------------------\\
function ubah_jam_masuk()
{
	global $koneksi;
	$id = $_POST['id'];
	$jam_masuk = $_POST['jam_masuk'];

	$update = mysqli_query($koneksi, "UPDATE jam_masuk SET jam_masuk = '$jam_masuk' WHERE id='$id'");
	if ($update) {
		echo '<script>alert("ubah jam masuk berhasil!")</script>';
	}
}

// ------------------------------------------------------------ABSEN SECTION------------------------------------------------------------\\
function select_absen()
{
	global $koneksi;
	date_default_timezone_set("Asia/Jakarta");
  	$tanggalSekarang = date("d-m-Y");
 
	$select = mysqli_query($koneksi, "SELECT count(id) AS jabsen FROM tb_absen WHERE tanggal = '$tanggalSekarang'");
	$r = mysqli_fetch_array($select);
	echo $r['jabsen'];
}

function hapus_absen()
{
	global $koneksi;
	$id = $_POST['id'];
	return mysqli_query($koneksi, "DELETE FROM tb_absen WHERE id='$id'");
}

// ----------------------------------------KETERANGAN SECTION---------------------------------------------------------------------------\\
function select_keterangan()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jket FROM tb_keterangan");
	$row = mysqli_fetch_array($select);
	echo $row['jket'];
}

function hapus_keterangan()
{
	global $koneksi;
	$id = $_POST['id'];

	// hapus foto
	$select = mysqli_query($koneksi, "SELECT * FROM tb_keterangan WHERE id='$id'");
	$r = mysqli_fetch_array($select);
	$hapus_foto = $r['foto'];

	unlink("../admin/img/keterangan/$hapus_foto");
	$delete = mysqli_query($koneksi, "DELETE FROM tb_keterangan WHERE id='$id'");

	if ($delete) {
		echo '<script>alert("data sudah dihapus!")</script>';
	}


}