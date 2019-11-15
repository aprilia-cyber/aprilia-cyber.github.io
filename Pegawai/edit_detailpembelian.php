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
$ID=$_POST['ID'];
$ID_Pembelian=$_POST['ID_Pembelian'];
$Nama_Barang=$_POST['Nama_Barang'];
	$query=mysql_query("select ID from barang where Nama='$Nama_Barang'");
	$ID_Barang=mysql_fetch_array($query);
$Harga_Beli=$_POST['Harga_Beli'];
$Harga_Jual=$_POST['Harga_Jual'];
$Nama_Pegawai=$_POST['Nama_Pegawai'];
	$query2=mysql_query("select ID from pegawai where Nama='$Nama_Pegawai'");
	$ID_Pegawai=mysql_fetch_array($query2);
$Tgl_Pembelian=$_POST['Tgl_Pembelian'];
$Byk_Beli=$_POST['Byk_Beli'];
	$query3=mysql_query("select Stok from barang where ID='$ID_Barang[ID]'");
	$Stok_awal=mysql_fetch_array($query3);
	$query4=mysql_query("select Byk_Beli from detail_pembelian where ID='$ID'");
	$Byk_Beli_awal=mysql_fetch_array($query4);
	$stok="$Stok_awal[Stok]"-"$Byk_Beli_awal[Byk_Beli]"+$Byk_Beli;
	
if($_POST['Submit'])
{

	$query5=mysql_query("update pembelian set Tgl_Pembelian='$Tgl_Pembelian' where ID='$ID_Pembelian'");
	$query6=mysql_query("update detail_pembelian set Harga_Beli='$Harga_Beli',Harga_Jual='$Harga_Jual',Byk_Beli='$Byk_Beli' where ID='$ID'");
	$query7=mysql_query("update barang set Harga='$Harga_Jual',Stok='$stok' where ID='$ID_Barang[ID]'");

	if($query5)
	{
	
		if($query6)
		{
	
			if($query7)
			{
				?>
				<script language="javascript">
				alert("Detail Pembelian berhasil diperbarui ");
				document.location="Show_DetailPembelian.php";
				</script>
				<?php
			}
			else
			{
			echo"Detail Pembelian GAGAL diperbarui... ";
			echo'<br> <br> <a href="Home.php"> Home </a>';
			}
		}
	}
	
}
else
{
header("location:Show_DetailPembelian.php");
}
?>
