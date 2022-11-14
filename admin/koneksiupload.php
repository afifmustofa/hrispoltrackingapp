<?php 
function koneksiDB() {
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "hrispoltracking";

    $conn = Mysqli_connect($host, $username, $password, $db);
    
    If(!$conn) {
        die("Koneksi Database Gagal : " .mysqli_connect_error());
    } else {
        return $conn;
    }
}
function selectalldata() {
    $query = "SELECT * FROM tb_file";
    $result = mysqli_query(koneksiDB(), $query);
    return $result;
}

function insertData($data) {
    $query = "INSERT INTO tb_file VALUES ('".$data['id_file']. "','" . $data['nama'] . "','" . $data['title'] . "','" . $data['size'] . "','" . $data['ekstensi'] . "','" . $data['berkas'] . "') ";

    $result = mysqli_query(koneksiDB(), $query);

    if (!$result) {
        return 0;
    } else {
        return 1;
    }
}
 ?>