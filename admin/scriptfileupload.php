<?php 
    include 'koneksiupload.php';
    
    $id_file = $_POST['id_file'];
    $id_karyawan = $_POST['id_karyawan'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $namafile = $_FILES['berkas']['name'];
    $x = explode('.', $namafile);
    $ekstensifile = strtolower(end($x));
    $ukuranfile    = $_FILES['berkas']['size'];
    $file_tmp = $_FILES['berkas']['tmp_name'];

    // Lokasi Penempatan File
    $dirupload = "file/";
    $linkberkas = $dirupload.$namafile;

    // Menyimpan File
    $terupload = move_uploaded_file($file_tmp, $linkberkas);

    $dataarr = array(
        'id_file' => $id_file, 
        'id_karyawan' => $id_karyawan, 
        'nama' => $nama,
        'jenis' => $jenis,
        'title' => $namafile, 
        'size' => $ukuranfile, 
        'ekstensi' => $ekstensifile, 
        'berkas' => $linkberkas, 
    );

    if ($terupload && (insertdata($dataarr) == 1)) {
        echo "Upload Berhasil!";
        header("Location: datafile.php", true, 301);
        exit();
    } else {
        echo "Upload Gagal!";
        header("Location: inputcv.php", true, 301);
        exit();
    }

 ?>