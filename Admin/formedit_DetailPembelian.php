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
include"koneksi.php";
$tampil=mysql_query("select detail_pembelian.ID,ID_Pembelian,barang.Nama,detail_pembelian.Harga_Beli,Harga_Jual,Byk_Beli,pegawai.Nama,pembelian.Tgl_Pembelian from barang,pegawai,pembelian,detail_pembelian where barang.ID=detail_pembelian.ID_Barang and pembelian.ID=detail_pembelian.ID_Pembelian and pegawai.ID=pembelian.ID_Pegawai and detail_pembelian.ID='$_GET[id]'");
$kolom=mysql_fetch_array($tampil);
$pembelian=mysql_query("select ID_Pegawai from pembelian where ID='$kolom[ID_Pembelian]'");
$data=mysql_fetch_array($pembelian);
$Username=$_SESSION['Username'];
	$pegawai=mysql_query("select pegawai.ID from pegawai where Username='$Username'");
	$tampil=mysql_fetch_array($pegawai);

?>

<form method="post" action="edit_detailpembelian.php">
<table width="377" border="0" align="center">
<tr>
  <td height="65" colspan="3"> <h2 align="center">Masukkan Perbaruan Data Pembelian Barang </h2></td>
  <tr> <td> ID </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="ID" id="ID" value="<?php echo"$kolom[0]"; ?>" readonly="true"/> </label> </td>
</tr>
<tr> <td> ID Pembelian </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="ID_Pembelian" id="ID_Pembelian" value="<?php echo"$kolom[1]"; ?>" readonly="true"/></label> </td>
</tr>
  <tr> <td width="128"> Nama Barang </td>
<td width="11"> : </td>
<td width="224" align="right"> <label> <input type="text" name="Nama_Barang" id="Nama_Barang" value="<?php echo"$kolom[2]"; ?>" readonly="true"/> 
  </label> </td>
<tr> <td> Harga Beli </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Harga_Beli" id="Harga_Beli" value="<?php echo"$kolom[3]"; ?>"/> </label> </td>
</tr>
<tr> <td> Harga Jual </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Harga_Jual" id="Harga_Jual" value="<?php echo"$kolom[4]"; ?>"/> </label> </td>
</tr>
<tr> <td> Banyak Beli </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Byk_Beli" id="Byk_Beli" value="<?php echo"$kolom[5]"; ?>"/> </label> </td>
</tr>
<tr> <td> Nama Pegawai </td>
  <td> : </td>
<td align="right"> <label> <input type="text" name="Nama_Pegawai" id="Nama_Pegawai" readonly="true" value="<?php echo"$kolom[6]"; ?>"/> 
</label> </td>
</tr>
<tr> <td> Tgl Pembelian </td>
  <td> : </td>
<td align="right"> <label> <input type="text" name="Tgl_Pembelian" id="Tgl_Pembelian" value="<?php echo"$kolom[7]"; ?>" readonly="true"/> 
</label> </td>
</tr>
<tr> <td colspan="3" align="right">     <label> <input name="Submit" type="submit" id="Submit" value="Edit" /> <input name="Cancel" type="submit" value="Cancel" />
</label> </td>


</table>
</form>