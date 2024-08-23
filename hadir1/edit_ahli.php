<?php
#PANGGIL HEADER
include 'header.php';
#DAPATKAN URL
$AhliEdit = $_SESSION['user'];

#SAMBUNG KE TABLE AHLI
$dataAhli=mysqli_query($con,"
SELECT * FROM peserta AS t1
INNER JOIN hp AS t2
ON t1.nomHp=t2.nomHp
WHERE t1.nomKp='$AhliEdit'");
$EditData=mysqli_fetch_array($dataAhli);
?>
<?php

#TERIMA NILAI YG DI POST 
if (isset($_POST['submit'])) {
$data1 = $_POST['nama'];
$data2 = $_POST['hp'];
$data3 = $_POST['pass'];
$data4 = $_POST['jantina'];

#PROSES KEMASKINI
$result1 = mysqli_query($con, "UPDATE 
hp AS t1 INNER JOIN peserta AS t2
ON t1.nomHp = t2.nomHp
SET t1.nama = '$data1',
t2.jantina='$data4',t2.password='$data3' 
WHERE t1.nomHp='$data2'");

#MESEJ JIKA BERJAYA 
echo "<script>alert('Kemaskini rekod berjaya'); 
window.location='dashboard.php'</script>";
}
?>
<html>

<!-- PAPAR MENU -->
<div id="menu">
<?php include 'menu.php'; ?>
</div>

<!-- PAPAR ISI -->
<div id="isi">
<h2>KEMASKINI MAKLUMAT AHLI</h2>
<form method="POST" >
<p>NAMA:<br>
<input size="50" type="text" name="nama"
value="<?php echo $EditData['nama'];?>" autofocus></p>
<select name="jantina">
<option value="<?php echo $EditData['jantina'];?>">
<option value="LELAKI">LELAKI</option>
<option value="PEREMPUAN">PEREMPUAN</option>
</select>
<p>PASSWORD :<br>
<input type="text" name="pass" maxlength="6" 
value="<?php echo $EditData['password'];?>"></p>
<input type="text" name="kp"
value="<?php echo $EditData['nomKp'];?>" hidden>
<input type="text" name="hp"
value="<?php echo $EditData['nomHp'];?>" hidden>
<br>
<button name="submit" type="submit">SIMPAN</button>
<br>
<font color='red'>*Pastikan maklumat anda betul</font>
</form>
</div>
</html>