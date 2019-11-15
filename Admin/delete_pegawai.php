<?php
session_start();
if(!isset($_SESSION['Username']))
{
?>
<script language="javascript">
alert("Maaf anda harus login terlebih dahulu !");
document.location="login_admin.html";
</script>
<?php
exit;
}
?>

<?php
include"koneksi.php";
$query=mysql_query("delete from pegawai where ID='$_GET[id]'");

if($query)
{
header("location:Show_Pegawai.php");
}
else
{
echo"DELETE GAGAL...";
}
?>