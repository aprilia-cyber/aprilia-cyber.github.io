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
$ID_Barang=$_POST['ID_Barang'];
$Harga_Beli=$_POST['Harga_Beli'];
$Harga_Jual=$_POST['Harga_Jual'];
$Byk_Beli=$_POST['Byk_Beli'];
$Nama_Pegawai = $_POST['ID_Pegawai'];
	$query2=mysql_query("select ID from pegawai where Nama='$Nama_Pegawai'");
	$ID_Pegawai=mysql_fetch_array($query2);
$Tgl_Pembelian=$_POST['Tgl_Pembelian'];

if($_POST['Submit'])
{
	$query5=mysql_query("insert into pembelian(ID_Barang,ID_Pegawai,Tgl_Pembelian) values('$ID_Barang','$ID_Pegawai[0]','$Tgl_Pembelian')");
		$query6=mysql_query("select MAX(ID) from pembelian");
		$ID_Pembelian=mysql_fetch_array($query6);
		echo"$ID_Pembelian[0]";

	$query=mysql_query("insert into detail_pembelian(ID_Pembelian,ID_Barang,Harga_Beli,Harga_Jual,Byk_Beli) values('$ID_Pembelian[0]','$ID_Barang','$Harga_Beli','$Harga_Jual','$Byk_Beli')");

	$query2=mysql_query("select barang.Stok from barang where ID='$ID_Barang'");
	$Stok_awal=mysql_fetch_array($query2);
	$query3="$Stok_awal[Stok]"+$Byk_Beli;

	$query4=mysql_query("update barang set Harga='$Harga_Jual',Stok='$query3' where ID='$ID_Barang'");


		if($query)
		{
			if($query4)
			{
				?>
				<script language="javascript">
				alert("Data Barang berhasil ditambahkan ");
				document.location="Show_Barang.php";
				</script>
				<?php
			}
			else
			{
			echo"DATA BARANG GAGAL DITAMBAHKAN...";
			echo'<br> <br> <a href="Home.php"> Home </a>';
			}
		}
}
else
{
header("location:Show_DetailPembelian.php");
}
?>
