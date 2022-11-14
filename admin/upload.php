<?php include "session.php"; ?>
<?php
  if(isset($_POST["upload"]))
  {
      $temp = "upload/";
      if (!file_exists($temp))
        mkdir($temp);
 
      $fileupload      = $_FILES['nama_file']['tmp_name'];
      $ImageName       = $_FILES['fileupload']['name'];
      $ImageType       = $_FILES['fileupload']['type'];
      $nama            = $_POST ['nama'];
      $id_file         = $_POST ['id_file'];
 
      if (!empty($fileupload)){
        // mengacak angka untuk nama file
        $acak = rand(00000000, 99999999);
 
        $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
        $ImageExt       = str_replace('.','',$ImageExt); // Extension
        $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
        $NewImageName   = $acak.'.'.$ImageExt;
 
        move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp.$NewImageName); // Menyimpan file
        {
          $sql="INSERT INTO tb_file (id_file, nama, fileupload) VALUES ('$id_file', '$nama','$fileupload')";
          $res=mysqli_query($koneksi, $sql) or die (mysqli_error());
 
        echo "<script>alert('Berhasil diupload'); location='index.php'</script>";
      }
  }
}
?>

<script>
      var _validFileExtensions = [".pdf", ".xlsx"];    
      function validate(file) {
	      if (file.type == "file") {
	          var sFileName = file.value;
	           if (sFileName.length > 0) {
	              var blnValid = false;
	              for (var j = 0; j < _validFileExtensions.length; j++) {
	                  var sCurExtension = _validFileExtensions[j];
	                  if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
	                      blnValid = true;
	                      break;
	                  }
	              }
	               
	              if (!blnValid) {
	                  alert("Maaf Hanya Boleh File yang Berextensi : " + _validFileExtensions.join(", "));
	                  file.value = "";
	                  return false;
	              }
	          }
	      }
	      return true;
	  }
  </script>