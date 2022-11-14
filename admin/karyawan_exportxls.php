<?php
include "session.php";
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=data karyawan.xls");
 
																  
											//	$sql = mysqli_query($koneksi, "SELECT * FROM t_inventoryitems WHERE f_partcode='$id'");
		
			?>
	  
 
	<h3>Data karyawan Poltracking Indonesia</h3>
	  
	<!-- <table>
	
			<tr>
			 <td width="0px">Plant :</td>  <td><?php //echo $plantname ?></td> 
			 <td width="0px">From : <?php //echo date("d-m-Y",strtotime($_GET['date1'])) ?></td>  
			 <td width="0px">Until : <?php //echo date("d-m-Y",strtotime($_GET['date2'])) ?></td> 
			 
		 </tr>
	</table>-->	
    <table>
	
			<tr>
			
			 <td width="0px">Tanggal : <?php echo date("d-m-Y") ?></td>  
			 
			 
		 </tr>
	</table>	
		 
		<table bordered="1">  
			<thead align="center">
			<tr>
			<th>No</th>
			<th>Id Karyawan</th>
			<th>NIK</th>
	     	<th>Nama</th>
       		<th>Tanggal Masuk</th>
       		<th>Divisi</th>
       		<th>Jabatan</th>
       		<th>Status Karyawan</th>
      		<th>Agama</th>
       		<th>Jenis Kelamin</th>
       		<th>Tanggal Lahir</th>
       		<th>Kartu Keluarga</th>
       		<th>NPWP</th>
       		<th>Alamat</th>
       		<th>Domisili</th>
       		<th>No HP</th>
       		<th>Email</th>
       		<th>Status Pernikahan</th>
       		<th>Kontak Keluarga</th>
       		<th>Sisa Cuti</th>
			<th>Level</th>
			</tr>
		</thead>
		<tbody>
	 	
					
		</tbody>

		</div>
    </div>
</div>
   <?php
	//query menampilkan data
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan");
	$no = 1;
	while($rowshow = mysqli_fetch_assoc($sql)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$rowshow['id_karyawan'].'</td>
			<td>'.$rowshow['nik'].'</td>
			<td>'.$rowshow['nama'].'</td>
			<td>'.$rowshow['tanggal_masuk'].'</td>
            <td>'.$rowshow['divisi'].'</td>
            <td>'.$rowshow['jabatan'].'</td>
            <td>'.$rowshow['status'].'</td>
			<td>'.$rowshow['agama'].'</td>
			<td>'.$rowshow['jen_kel'].'</td>
			<td>'.$rowshow['tanggal_lahir'].'</td>
			<td>'.$rowshow['karkel'].'</td>
			<td>'.$rowshow['npwp'].'</td>
			<td>'.$rowshow['alamat'].'</td>
			<td>'.$rowshow['domisili'].'</td>
			<td>'.$rowshow['nohp'].'</td>
			<td>'.$rowshow['email'].'</td>
			<td>'.$rowshow['statusnikah'].'</td>
			<td>'.$rowshow['kontakkeluarga'].'</td>
			<td>'.$rowshow['jumlah_cuti'].'</td>
			<td>'.$rowshow['level'].'</td>
		</tr>
		';
		$no++;

		
	}
	
						
					 ?>
  </table>   