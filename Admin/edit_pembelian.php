<?php
session_start();
if(!isset($_SESSION['Username']))
{
?>
<script language="javascript">
alert("Maaf anda harus login terlebih dahulu !!!");
document.location="Login.php";
</script>
<?php
exit;
}
?>

<?php
include "koneksi.php";
$ID = $_POST['ID'];
$ID_Barang = $_POST['ID_Barang'];
$ID_Pegawai = $_POST['ID_Pegawai'];
$Tgl_Pembelian = $_POST['Tgl_Pembelian'];

$query=mysql_query("update pembelian set ID='$ID',ID_Barang='$ID_Barang',ID_Pegawai='$ID_Pegawai',Tgl_Pembelian='$Tgl_Pembelian' where ID='$ID' ");

if($query)
{
echo"EDIT BERHASIL...";
echo"<br> <br> <a href='Show_Pembelian.php'> Data Pembelian </a>";
}
else
{
echo"EDIT GAGAL...";
}
?>