<?php
#SAMBUNG KE DATABASE 
require 'database.php';
$KP=$_SESSION['user'];

#TERIMA NOMKP YANG DIPOST 
if (isset($_POST['nomkp'])) {
$NOMKP = $_POST['nomkp'];

#MASUK REKOD KE DLM TABLE
mysqli_query($con, "INSERT INTO hadir
VALUES (NULL, '$masaKini','$tarikhKini','$NOMKP')") 
or die (mysqli_error());
echo "<script>alert('Kehadiran Anda Telah Direkodkan'); 
</script>";
}
?>

<html>
<h2><?php echo strtoupper ($aktiviti); ?> 
&nbsp PADA <?php echo $tJumpa; ?></h2>

<?php
#KIRA HARI
$date1=date_create($tarikhKini);
$date2=date_create($tJumpa); 
$diff=date_diff($date1,$date2);
$totalday=$diff->format("%a");

#JIKA TARIKH KE DEPAN DARI TARIKH SEMASA
if($date2>$date1){
echo $totalday."HARI LAGI";

#JIKA TARIKH SAMA DENGAN TARIKH SEMASA 
}else if($date2==$date1){
$semak=mysqli_query($con, "SELECT * FROM hadir WHERE 
nomKp='$KP' AND
tarikh='$tarikhKini'");
$status2=mysqli_num_rows($semak);
if ($status2==0){
?>

<!-- PAPAR BUTANG HADIR -->
<form method="POST">
<input type="text" name="nomkp" value="<?php echo $KP; ?>"
size="50" hidden>
<button>HADIR</button>
</form>
<?php
}else {
echo "<h3>Anda sudah daftar kehadiran</h3>";
echo "<br>Klik PAPAR untuk log kehadiran lepas<br>";
?>
<a href="log.php"><button>PAPAR</button></a>
<?php
}

#JIKA TARIKH KE BELAKANG DARI TARIKH SEMASA
}else{
echo "Telah lepas ".$totalday." hari lalu"; 
}
?>
</html>