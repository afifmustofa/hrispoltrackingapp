<?php
/* Database connection start */
include "koneksi.php";
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'nama',
    1 => 'tanggal', 
	2 => 'jam_masuk',
	3 => 'ket',
	4 => 'alasan',
	5 => 'id_ket',
);

// getting total number records without any search
$sql = "SELECT id_ket, nama, tanggal, jam_masuk, ket, alasan";
$sql.=" FROM tb_keterangan";
$query=mysqli_query($conn, $sql) or die("ajaxin-grid-keterangan.php: get Keterangan");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT id_ket, nama, tanggal, jam_masuk, ket, alasan";
	$sql.=" FROM tb_keterangan";
	$sql.=" WHERE id_ket LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nama LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR tanggal LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR jam_masuk LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR ket LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR alasan LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("ajax-grid-keterangan.php: get Keterangan");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-grid-keterangan.php: get Keterangan"); // again run query with limit
	
} else {	

	$sql = "SELECT id_ket, nama, tanggal, jam_masuk, ket, alasan";
	$sql.=" FROM tb_keterangan";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajaxin-grid-keterangan.php: get Keterangan");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$nestedData[] = $row["id_ket"];
    $nestedData[] = $row["tanggal"];
	$nestedData[] = $row["nama"];
	$nestedData[] = $row["jam_masuk"];
	$nestedData[] = $row["ket"];
	$nestedData[] = $row["alasan"];
	$nestedData[] = '<td><center>
	<a href="detail-keterangan.php?id='.$row['id_ket'].'"  data-toggle="tooltip" title="View Detail" class="btn btn-sm btn-success"> <i class="bi bi-search"></i> </a>
	<a href="edit-keterangan.php?id='.$row['id_ket'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="bi bi-pencil-square"></i> </a>
	<a href="dataketerangan.php?aksi=delete&id='.$row['id_ket'].'"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?\')" class="btn btn-sm btn-danger"> <i class="bi bi-trash"></i></a>
	</center></td>';		
	$data[] = $nestedData;
	
}
					
					
					
$json_data = array(
	"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
	"recordsTotal"    => intval( $totalData ),  // total number of records
	"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
	"data"            => $data   // total data array
	);
					
	echo json_encode($json_data);  // send data as json format
					
?>