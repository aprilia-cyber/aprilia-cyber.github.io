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
$Nama=$_POST['Nama'];
$Alamat=$_POST['Alamat'];
$Telp=$_POST['Telp'];

if($_POST['Submit'])
{
	$query=mysql_query("insert into pembeli(Nama,Alamat,Telp) values ('$Nama','$Alamat','$Telp')");

		if($query)
		{
				?>
				<script language="javascript">
				alert("Data Pembeli berhasil ditambahkan ");
				document.location="forminput_pemesanan.php";
				</script>
				<?php
		}
		else
		{
		echo"DATA PEMBELI GAGAL DITAMBAHKAN...";
		echo'<br> <br> <a href="Home.php"> Home </a>';
		}
}
else
{
header("location:Show_Pembeli.php");
}
?> 