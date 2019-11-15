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
$ID =$_POST['ID'];
$ID_Pegawai=$_POST['ID_Pegawai'];
$ID_Pengirim=$_POST['ID_Pengirim'];
$ID_Pembeli=$_POST['ID_Pembeli'];
$Tgl_Pesan=$_POST['Tgl_Pesan'];
$Tgl_Kirim=$_POST['Tgl_Kirim'];
$Status_Kirim=$_POST['stts'];

if($_POST['Submit'])
	{
		if($Status_Kirim=='1')
			{
			
			$query=mysql_query("update pemesanan set ID_Pengirim='$ID_Pengirim', Tgl_Kirim='$Tgl_Kirim', Status_Kirim='$Status_Kirim'  where ID='$ID' ");

			if($query)
				{
				?>
				<script language="javascript">
				alert("Data pemesanan berhasil diperbarui ");
				document.location="Show_Pemesanan.php";
				</script>
				<?php
				}
			else
				{
				echo"EDIT GAGAL...";
				echo'<br> <br> <a href="Home.php"> Home </a>';
				}
			}
		else
			{
			header("location:Show_Pemesanan.php");
			}

	}
else
	{
	header("location:Show_Pemesanan.php");
	}
?>