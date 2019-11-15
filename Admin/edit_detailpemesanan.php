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
$ID_Pemesanan=$_POST['ID_Pemesanan'];
$Nama_Barang=$_POST['Nama_Barang'];
	$id=mysql_query("select ID from barang where Nama='$Nama_Barang'");
	$ID_Barang=mysql_fetch_array($id);
$Harga=$_POST['Harga'];
$Byk_Pesan=$_POST['Byk_Pesan'];
	$query3=mysql_query("select Stok from barang where ID='$ID_Barang[ID]'");
	$Stok_awal=mysql_fetch_array($query3);
	$query4=mysql_query("select Byk_Pesan from detail_pemesanan where ID='$ID'");
	$Byk_Pesan_awal=mysql_fetch_array($query4);
	$stok="$Stok_awal[Stok]"+"$Byk_Pesan_awal[Byk_Pesan]"-$Byk_Pesan;

if($_POST['Submit'])
{
	if($stok<0)
		{
				?>
				<script language="javascript">
				alert("Maaf Stok tidak memenuhi ");
				document.location="Show_DetailPemesanan.php";
				</script>
				<?php
		}
	else
	{
	$query=mysql_query("update detail_pemesanan set Byk_Pesan='$Byk_Pesan' where ID='$ID'");
	$query7=mysql_query("update barang set Stok='$stok' where ID='$ID_Barang[ID]'");
		
		if($query)
		{
	
			if($query7)
			{
				?>
				<script language="javascript">
				alert("Detail pemesanan barang berhasil diperbarui ");
				document.location="Show_DetailPemesanan.php";
				</script>
				<?php
			}
			else
			{
			echo"Detail pemesanan barang GAGAL diperbarui... ";
			echo'<br> <br> <a href="Home.php"> Home </a>';
			}
		}
	}
}
else
{
header("location:Show_DetailPemesanan.php");
}
?>
