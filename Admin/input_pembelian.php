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
$ID_Barang = $_POST['ID_Barang'];
$Nama_Pegawai = $_POST['ID_Pegawai'];
	$query2=mysql_query("select ID from pegawai where Nama='$Nama_Pegawai'");
	$ID_Pegawai=mysql_fetch_array($query2);
$Tgl_Pembelian = $_POST['Tgl_Pembelian'];

$query=mysql_query("insert into pembelian(ID_Barang,ID_Pegawai,Tgl_Pembelian) values ('$ID_Barang','$ID_Pegawai[0]','$Tgl_Pembelian')");

if($query)
{
echo"INPUT BERHASIL...";
echo"<br> <br> <a href='Home.php'> Home </a>";
}
else
{
echo"INPUT GAGAL...";
}
?>