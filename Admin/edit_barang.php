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
$ID =$_POST['ID'];
$Nama = $_POST['Nama'];
$Harga = $_POST['Harga'];
$Stok =$_POST['Stok'];

$query = mysql_query("update barang set ID='$ID',Nama='$Nama',Harga='$Harga',Stok='$Stok' where ID='$ID'");
if($query)
{
echo"EDIT BERHASIL...";
echo'<br><br> <a href="Show_Barang.php"> Data Barang </a>';
}
else
{
echo"EDIT GAGAL...";
}
?>