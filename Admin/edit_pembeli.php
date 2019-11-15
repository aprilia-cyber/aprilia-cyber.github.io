<?php
session_start();
if(!isset($_SESSION['Username']))
{
?>
<script language="javascript">
alert("Maaf anda harus login terlebih dahulu !!!");
document.location="login_admin.html";
</script>
<?php
exit;
}
?>

<?php
include "koneksi.php";
$ID=$_POST['ID'];
$Nama=$_POST['Nama'];
$Alamat=$_POST['Alamat'];
$Telp=$_POST['Telp'];

$query=mysql_query("update pembeli set ID='$ID',Nama='$Nama',Alamat='$Alamat',Telp='$Telp' where ID='$ID' ");

if($query)
{
echo"EDIT BERHASIL...";
echo'<br> <br> <a href="Show_Pembeli.php"> Data Pembeli </a>';
}
else
{
echo"EDIT GAGAL...";
}
?> 