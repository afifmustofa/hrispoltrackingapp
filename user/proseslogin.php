<?php
include ("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password1 = $_POST['password'];
$password = sha1($password1);

//$username = mysqli_real_escape_string($username);
//$password = mysqli_real_escape_string($password);

if (empty($username) && empty($password)) {
	header('location:index.php?error=Username dan Password Kosong!');
} else if (empty($username)) {
	header('location:index.php?error=Username Kosong!');
} else if (empty($password)) {
	header('location:index.php?error=Password Kosong!');
}

$q = mysqli_query($koneksi, "select * from tb_admin where username='$username' and password='$password'");
$row = mysqli_fetch_array ($q);

if (mysqli_num_rows($q) == 1) {
    $_SESSION['id_admin']   = $row['id_admin'];
    $_SESSION['username']   = $username;
    $_SESSION['nama']       = $row['nama'];
    $_SESSION['no_hp']     = $row['no_hp'];
    $_SESSION['level']      = $row['level'];
    $_SESSION['gambar']     = $row['gambar'];
    
    if ($_SESSION['level'] == 'admin'){
        header('location:admin/index.php');
    } else if ($_SESSION['level'] == 'User'){
        header('location:user/index.php');
    }
	
} else {
	header('location:index.php?error=Anda Belum Terdaftar!');
}
?>