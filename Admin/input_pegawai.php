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
$Username=$_POST['Username'];
$Password=$_POST['Password'];
$Nama=$_POST['Nama'];
$Telp=$_POST['Telepon'];


if($_POST['Submit'])
{
	if($_POST['Username']=='')
		{
		?>
		<script language="javascript">
		alert("Masukkan username pegawai baru");
		document.location="forminput_Pegawai.php";
		</script>
		<?php
		}
	else if($_POST['Password']=='')
		{
		?>
		<script language="javascript">
		alert("Masukkan password pegawai baru");
		document.location="forminput_Pegawai.php";
		</script>
		<?php
		}
	else if($_POST['Nama']=='')
		{
		?>
		<script language="javascript">
		alert("Masukkan nama pegawai baru");
		document.location="forminput_Pegawai.php";
		</script>
		<?php
		}
	else if($_POST['Telepon']=='')
		{
		?>
		<script language="javascript">
		alert("Masukkan Nomor Telepon pegawai baru");
		document.location="forminput_Pegawai.php";
		</script>
		<?php
		}
	else
		{
		$query=mysql_query("insert into pegawai(Username,Password,Nama,Telp) values('$Username','$Password','$Nama','$Telp')");
			if($query)
			{
				?>
				<script language="javascript">
				alert("Data Pegawai berhasil ditambahkan ");
				document.location="Show_Pegawai.php";
				</script>
				<?php
			}
			else
			{
				echo"DATA PEGAWAI BARU GAGAL DITAMBAHKAN...";
				echo'<br> <br> <a href="Home.php"> Home </a>';
			}
		}
}
else
{
header("location:Show_Pegawai.php");
}

?>