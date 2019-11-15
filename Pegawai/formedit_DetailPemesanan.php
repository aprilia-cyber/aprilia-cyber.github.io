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
$tampil=mysql_query("select detail_pemesanan.*,barang.Nama from detail_pemesanan,barang where barang.ID=detail_pemesanan.ID_Barang and detail_pemesanan.ID='$_GET[id]'");
$kolom=mysql_fetch_array($tampil);
$pemesanan=mysql_query("select ID_Pegawai,Status_Kirim from pemesanan where ID='$kolom[ID_Pemesanan]'");
$data=mysql_fetch_array($pemesanan);
$Username=$_SESSION['Username'];
	$pegawai=mysql_query("select pegawai.ID from pegawai where Username='$Username'");
	$tampil=mysql_fetch_array($pegawai);

if($data[0]==$tampil[0])
	{
		if($data[1]=='1')
			{
				?>
				<script language="javascript">
				alert("Maaf pemesanan barang yang sudah terkirim tidak bisa diperbarui");
				document.location="Show_DetailPemesanan.php";
				</script>
				<?php
			}
		else
			{
				?>

<form method="post" action="edit_detailpemesanan.php">
<table width="363" border="0" align="center">
<tr> <td height="59" colspan="3"> <h2 align="center">Masukkan Perbaruan Data Detail Pemesanan </h2></td>
</tr>
<tr> <td width="123"> ID </td>
<td width="14"> : </td>
<td width="212" align="right"> <label> <input type="text" name="ID" id="ID" value="<?php echo"$kolom[0]"; ?>" readonly="true"/> </label> </td>
</tr>
<tr> <td> ID Pemesanan </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="ID_Pemesanan" id="ID_Pemesanan" value="<?php echo"$kolom[1]"; ?>" readonly="true" /></label> </td>
</tr>
<tr> <td> Nama Barang </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Nama_Barang" id="Nama_Barang" value="<?php echo"$kolom[5]"; ?>" readonly="true" />
</label> </td>
</tr>
<tr> <td> Harga </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Harga" id="Harga" value="<?php echo"$kolom[3]"; ?>" readonly="true"/> </label> </td>
</tr>
<tr> <td> Banyak Pesan </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Byk_Pesan" id="Byk_Pesan" value="<?php echo"$kolom[4]"; ?>"/> </label> </td>
<tr> <td>&nbsp;  </td>
<td>&nbsp;  </td>
<td align="right"> <label> <input type="submit" name="Submit" id="Submit" value="Edit"/> <input type="submit" name="Cancel" id="Cancel" value="Cancel"/></label> </td>
</tr>
</table>
</form>
				<?php
			}
	}
else
	{
		?>
		<script language="javascript">
		alert("Maaf anda tidak berhak memperbarui data pemesanan ini \nData ini hanya bisa diperbarui oleh pegawai yang melayani pemesanan");
		document.location="Show_DetailPemesanan.php";
		</script>
		<?php
	}
		?>