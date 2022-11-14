<?php 

$koneksi = mysqli_connect('localhost','root','','hrispoltracking');

// --------------------------------------------ADMIN SECTION-----------------------------------------------------------------------------
function panggil_admin()
{
	global $koneksi;
	$user_id  = $_SESSION['user_id'];
	return mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE user_id='$id'");
}

function select_admin()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM tb_admin ORDER BY user_id DESC");
}

function select_admin_2()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jadmin FROM tb_admin");
	$r = mysqli_fetch_array($select);
	echo $r['jadmin'];
}

function simpan_admin()
{
	global $koneksi;
    $user_id       = $_POST['user_id'];
    $username      = $_POST['username'];
    $password1     = $_POST['password'];
    $password      = sha1("$password1");
    $nama          = $_POST['nama'];
    $no_hp         = $_POST['no_hp'];
    $level         = $_POST['level'];
	$foto        = $_FILES['foto']['name'];

	if ($foto!= "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ext = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
		$nama_file_baru = $angka_acak.'-'.$foto;
		if (in_array($ext, $allowed_ext)===true) {
			move_uploaded_file($file_tmp, 'img/karyawan/'.$nama_file_baru);
			$res = mysqli_query($koneksi, "INSERT INTO tb_admin SET user_id = '$user_id', username = '$username', password = '$password', nama = '$nama', no_hp = '$no_hp', level = '$level', foto = '$nama_file_baru'");

		}
	}else if (empty($_POST['foto'])) {
		$res = mysqli_query($koneksi, "INSERT INTO tb_admin SET user_id = '$user_id', username = '$username', password = '$password', nama = '$nama', no_hp = '$no_hp', level = '$level'");

	}
	
}

function hapus_admin()
{
	global $koneksi;
	$user_id = $_POST['user_id'];
	$select = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE user_id='$user_id'");
	$array = mysqli_fetch_array($select);
	$foto = $array['foto'];

	if ($array['foto'] == "") {
		return mysqli_query($koneksi, "DELETE FROM tb_admin WHERE user_id='$user_id'");
	}else{
		unlink("img/$foto");
		return mysqli_query($koneksi, "DELETE FROM tb_admin WHERE user_id='$user_id'");
	}
}

function edit_admin()
{
	global $koneksi;
    $user_id       = $_POST['user_id'];
    $username      = $_POST['username'];
    $password1     = $_POST['password'];
    $password      = sha1("$password1");
    $nama          = $_POST['nama'];
    $no_hp         = $_POST['no_hp'];
    $level         = $_POST['level'];
	$foto        = $_FILES['foto']['name'];

	// unlink 
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE user_id='$user_id'");
	$r = mysqli_fetch_array($sql);

	$hapus_foto = $r['foto'];

		if(isset($_POST['ubahfoto']))
	{
		if ($row['foto']=="") 
		{
				if ($foto != "") {
				$allowed_ext = array('png','jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1,999);
		   		$nama_file_baru = $angka_acak.'-'.$foto;
		   		    if (in_array($ekstensi, $allowed_ext) === true) {
		      			move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
		      			$result =  mysqli_query($koneksi, "UPDATE tb_admin SET user_id = '$user_id', username = '$username', password = '$password', nama = '$nama', no_hp = '$no_hp', level = '$level', foto = '$nama_file_baru' WHERE user_id='$user_id'");
		      			
		      			
		    }



			}
		}else if ($row['foto']!="") {
			if ($foto != "") {
				$allowed_ext = array('png','jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1,999);
		   		$nama_file_baru = $angka_acak.'-'.$foto;
		   		    if (in_array($ekstensi, $allowed_ext) === true) {
		      			move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
		      			$result =  mysqli_query($koneksi, "UPDATE tb_admin SET user_id = '$user_id', username = '$username', password = '$password', nama = '$nama', no_hp = '$no_hp', level = '$level', foto = '$nama_file_baru' WHERE user_id='$user_id'");
		      			if ($result) {
		      				unlink("img/$hapus_foto");
		      			}

		      			
		    }



			}
		}	
	}

	if (empty($_POST['foto'])) {
		return  mysqli_query($koneksi, "UPDATE tb_admin SET user_id = '$user_id', username = '$username', password = '$password', nama = '$nama', no_hp = '$no_hp', level = '$level', foto = '$nama_file_baru' WHERE user_id='$user_id'");
	}


}

?>