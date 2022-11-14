<?php
/* Database connection start */
include "koneksi.php";
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'user_id',
    1 => 'username', 
	2 => 'password',
	3 => 'nama',
	4 => 'no_hp',
	5 => 'level',
	6 => 'gambar'
);

// getting total number records without any search
$sql = "SELECT user_id, username, password, nama, no_hp, level, gambar";
$sql.=" FROM tb_admin";
$query=mysqli_query($conn, $sql) or die("ajaxin-data-admin.php: get Admin");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT user_id, username, password, nama, no_hp, level, gambar";
	$sql.=" FROM tb_admin";
	$sql.=" WHERE user_id LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR username LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR password LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR nama LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR no_hp LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR level LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR gambar LIKE '".$requestData['search']['value']."%' ";
    $query=mysqli_query($conn, $sql) or die("ajax-data-admin.php: get Admin");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajax-data-admin.php: get Admin"); // again run query with limit
	
} else {	

	$sql = "SELECT user_id, username, password, nama, no_hp, level, gambar";
	$sql.=" FROM tb_admin";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajaxin-grid-admin.php: get Admin");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["user_id"];
    $nestedData[] = $row["username"];
    $nestedData[] = $row["password"];
    $nestedData[] = $row["nama"];
	$nestedData[] = $row["no_hp"];
	$nestedData[] = $row["level"];
	$nestedData[] = $row["gambar"];
    $nestedData[] = '<td><center>
                     <a href="detail-admin.php?id='.$row['user_id'].'"  data-toggle="tooltip" title="View Detail" class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-search"></i> </a>
                     <a href="edit-admin.php?id='.$row['user_id'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-primary"> <i class="glyphicon glyphicon-edit"></i> </a>
				     <a href="admin.php?aksi=delete&id='.$row['user_id'].'&nama='.$row['nama'].'"  data-toggle="tooltip" title="Delete" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['nama'].'?\')" class="btn btn-sm btn-danger"> <i class="glyphicon glyphicon-trash"> </i> </a>
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
