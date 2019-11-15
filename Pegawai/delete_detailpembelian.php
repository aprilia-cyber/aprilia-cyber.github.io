<?php
session_start();
if(!isset($_SESSION['Username']))
{
?>
<script language="javascript">
alert("Maaf anda harus login terlebih dahulu !");
document.location="Login.php";
</script>
<?php
exit;
}
?>

<?php
include"koneksi.php";
$query=mysql_query("delete from detail_pembelian where ID='$_GET[id]'");

if($query)
{
header("location:Show_DetailPembelian.php");
}
else
{
echo"DELETE GAGAL...";
}
?>