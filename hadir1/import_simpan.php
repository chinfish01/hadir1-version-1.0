<?php
#SAMBUNG KE P/DATA
require 'database.php';

#TERIMA FAIL CSV POST
if(isset($_POST["import"])){
#SEMAK FAIL CSV BIAR JANGAN KOSONG
if(!empty($_FILES['file']['name'])){ 
$filename=$_FILES["file"]["tmp_name"];
$file = fopen($filename, "r");
while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
{
$NAME = $getData[0];
$LP = $getData[1];
$KP = $getData[2];
$HP = $getData[3];

#PASSWORD 6 DIGIT DARI KANAN 
$PW=(substr($KP,6));
#MASUKKAN DALAM TABLE hp 
mysqli_query($con, "INSERT INTO hp 
values ('".$HP."','".$NAME."')");

#MASUKKAN DALAM TABLE peserta 
mysqli_query($con, "INSERT INTO peserta
values
('".$KP."','".$LP."','".$PW."', 'PENGGUNA','".$HP."')");

#ALERT JIKA BERJAYA
echo "<script>alert('Pindah naik fail CSV berjaya'); 
window.location='senarai_ahli.php'</script>"; 
}
fclose($file);
}else{
#ALERT JIKA GAGAL
echo "<script>alert('Pindah naik fail CSV gagal');
 window.location='import_ahli.php'</script>";
}
}
?>