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
$Username=$_POST['Username'];
$Password=$_POST['Password'];
$Nama=$_POST['Nama'];
$Telp=$_POST['Telepon'];

if($_POST['Submit'])
{
	$query=mysql_query("update pegawai set ID='$ID',Username='$Username',Password='$Password',Nama='$Nama',Telp='$Telp' where ID='$ID' ");

		if($query)
		{
				?>
				<script language="javascript">
				alert("Data Pegawai berhasil diperbarui ");
				document.location="Show_Pegawai.php";
				</script>
				<?php
		}
		else
		{
		echo"DATA PEGAWAI BARU GAGAL DIPERBARUI...";
		echo'<br> <br> <a href="Show_Pegawai.php"> Data Pegawai </a>';
		}
}
else
{
header("location:Show_Pegawai.php");
}
?>