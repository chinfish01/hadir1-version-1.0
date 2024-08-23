<?php
#KEKALKAN SETUP INI
#SET TIME ZONE WAKTU
date_default_timezone_set("Asia/Kuala_Lumpur");
$tarikhKini=date("Y-m-d");
$masaKini=date("H:i:s");
#SETTING DATABASE
$host="localhost";
$user="root";

#NAMA DB, UBAH DI SINI
$db="hadir1";
$password="";

#SAMBUNGAN PANGKALAN DATA
$con= mysqli_connect($host,$user,$password,$db);

#PAPARAN MSG JIKA SAMBUNGAN GAGAL
if (mysqli_connect_errno()){
echo "Database tidak berhubung!:".mysqli_connect_error();
}

#BOLEH UBAH DI SINI
#TETAPAN SISTEM 
$namasys = "PASTI HADIR";
$namasys1 = " SISTEM KEHADIRAN KELAB MUZIK";
$motto= "Accurate & Monitorize";

#UBAH TARIKH MENGIKUT KESESUAIAN
//TARIKH MESYUARAT/PERJUMPAAN
#UBAH KE:$tarikhKini;
//$tJumpa=$tarikhKini;//jika aktiviti sama tiap-tiap hari

#UBAH KE SUATU TARIKH CTH: '2024-12-10';
$tJumpa='2024-06-6';//Jika aktiviti satu kali shj.

//NAMA AKTIVITI
$aktiviti="KEHADIRAN AKTIVITI ";

?>