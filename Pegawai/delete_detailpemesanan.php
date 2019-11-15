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
$data_pesan=mysql_query("select*from detail_pemesanan where detail_pemesanan.ID='$_GET[id]'");
$pesan=mysql_fetch_array($data_pesan);
$pemesanan=mysql_query("select ID_Pegawai,Status_Kirim from pemesanan where ID='$pesan[ID_Pemesanan]'");
$kolom=mysql_fetch_array($pemesanan);

$Username=$_SESSION['Username'];
	$pegawai=mysql_query("select pegawai.ID from pegawai where Username='$Username'");
	$t=mysql_fetch_array($pegawai);

if($kolom[0]==$t[0])
{
if($kolom[1]=='1')
	{
		?>
		<script language="javascript">
		alert("Maaf barang yang sudah terkirim tidak bisa dicancel");
		document.location="Show_DetailPemesanan.php";
		</script>
		<?php
	}
	else
	{
		$data_barang=mysql_query("select barang.* from barang,detail_pemesanan where barang.ID=detail_pemesanan.ID_Barang and detail_pemesanan.ID='$_GET[id]'");
		$barang=mysql_fetch_array($data_barang);
		$tambah="$barang[Stok]"+"$pesan[Byk_Pesan]";
		echo"$barang[ID]<br>$barang[Stok]<br>$pesan[Byk_Pesan]<br>'$status[0]'<br>$tambah";
		
		$edit=mysql_query("update barang set Stok='$tambah' where ID='$barang[ID]'");

		$query=mysql_query("delete from detail_pemesanan where ID='$_GET[id]'");

		if($query){header("location:Show_DetailPemesanan.php");}else{echo"DELETE GAGAL...";}
	}
}
else
{
		?>
		<script language="javascript">
		alert("Maaf anda tidak berhak membatalkan pemesanan ini \nPemesanan ini hanya bisa dicancel oleh pegawai yang melayani pemesanan");
		document.location="Show_DetailPemesanan.php";
		</script>
		<?php
}
?>