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
$jumlah=$_POST['jumlah'];
$ID_Pemesanan=$_POST['ID_Pemesanan'];
$ID_Barang=$_POST['ID_Barang'];
$Harga=$_POST['Harga'];
$Stok=$_POST['Stok'];
$Byk_Pesan=$_POST['Byk_Pesan'];


for($i=0;$i<$jumlah;$i++)
{
	$sisa="$Stok[$i]"-"$Byk_Pesan[$i]";
	
		if($sisa<0)
			{
				?>
				<script language="javascript">
				alert("Maaf Stok tidak memenuhi ");
				document.location="Show_Pemesanan.php";
				</script>
				<?php
				$query2=mysql_query("select MAX(ID) from pemesanan");
				$ID_MAX=mysql_fetch_array($query2);
				$delete=mysql_query("delete from pemesanan where ID='$ID_MAX[0]'");
			}
		else
			{
			$query=mysql_query("insert into detail_pemesanan(ID_Pemesanan,ID_Barang,Harga,Byk_Pesan)values('$ID_Pemesanan[$i]','$ID_Barang[$i]','$Harga[$i]','$Byk_Pesan[$i]')");
			$query4=mysql_query("update barang set Stok='$sisa' where ID='$ID_Barang[$i]'");
			}
}

				?>
				<script language="javascript">
				document.location="Show_DetailPemesanan.php";
				</script>
				<?php


?>
