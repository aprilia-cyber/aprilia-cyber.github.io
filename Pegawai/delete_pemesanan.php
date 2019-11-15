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
$tampil=mysql_query("select ID_Pegawai,Status_Kirim from pemesanan where ID='$_GET[id]'");
$kolom=mysql_fetch_array($tampil);
$Username=$_SESSION['Username'];
	$pegawai=mysql_query("select pegawai.ID from pegawai where Username='$Username'");
	$t=mysql_fetch_array($pegawai);

if($kolom[0]==$t[0])
{

	if($kolom[1]==1) 
	{
		?>
		<script language="javascript">
		alert("Maaf barang yang suda terkirim tidak bisa dicancel");
		document.location="Show_Pemesanan.php";
		</script>
		<?php
	}
	else
	{
		$id_pesan=mysql_query("select*from detail_pemesanan where ID_Pemesanan='$_GET[id]'");
		while($detail=mysql_fetch_array($id_pesan))
			{
			echo"$detail[ID]<br>";
			echo"$detail[Byk_Pesan]<br>";
			$data_barang=mysql_query("select barang.* from barang,detail_pemesanan where barang.ID=detail_pemesanan.ID_Barang and detail_pemesanan.ID='$detail[ID]'");
			$barang=mysql_fetch_array($data_barang);
			echo"$barang[ID]<br>";
			echo"$barang[Stok]<br>";

			$tambah="$barang[Stok]"+"$detail[Byk_Pesan]";
			echo"$tambah<br><br>";

			$edit=mysql_query("update barang set Stok='$tambah' where ID='$barang[ID]'");
			$deldetail=mysql_query("delete from detail_pemesanan where ID='$detail[ID]'");
			}

		$query=mysql_query("delete from pemesanan where ID='$_GET[id]'");
		
			if($query){header("location:Show_Pemesanan.php");}else{echo"DELETE GAGAL...";}
		
	}
}
else
{
		?>
		<script language="javascript">
		alert("Maaf anda tidak berhak membatalkan pemesanan ini \nPemesanan ini hanya bisa dicancel oleh pegawai yang melayani pemesanan");
		document.location="Show_Pemesanan.php";
		</script>
		<?php
}

?>