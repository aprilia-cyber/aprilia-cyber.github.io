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

<form method="post" action="input_detailpembelian.php">
<table width="436" border="0" align="center">
<tr> <td colspan="3"><h2 align="center"> Masukkan Data Detail Pembelian </h2></td>
</tr>
<tr> <td width="165"> ID Barang </td>
<td width="106"> : </td>
<td width="151"> <label> <select name="ID_Barang" id="ID_Barang">
<?php
include "koneksi.php";
$query=mysql_query("select*from barang");
while($tampil=mysql_fetch_array($query))
{
echo"<option value='$tampil[ID]'> $tampil[Nama] </option>";
}
?>
</select>
 </label> </td>
</tr>
<tr> <td> Harga Beli </td>
<td> : </td>
<td> <label> <input type="text" name="Harga_Beli" id="Harga_Beli"/> </label> </td>
</tr>
<tr> <td> Harga Jual </td>
<td> : </td>
<td> <label> <input type="text" name="Harga_Jual" id="Harga_Jual" /> </label> </td>
</tr>
<tr> <td> Banyak Beli </td>
<td> : </td>
<td> <label> <input type="text" name="Byk_Beli" id="Byk_Beli" /> </label> </td>
</tr>
<tr> <td> ID Pegawai </td>
  <td> : </td>
<td> <label> <input type="text" name="ID_Pegawai" id="ID_Pegawai" readonly="true"
value="<?php
			include"koneksi.php";
			$Username=$_SESSION['Username'];
			$pegawai=mysql_query("select pegawai.Nama from pegawai where Username='$Username'");
			$tampil=mysql_fetch_array($pegawai);
				echo"$tampil[Nama]"; ?>"/> 
</label> </td>
</tr>
<tr> <td> Tgl Pembelian </td>
  <td> : </td>
<td> <label> <input type="text" name="Tgl_Pembelian" id="Tgl_Pembelian" value="<?php $qtgl=mysql_query("SELECT now()"); $tgl=mysql_fetch_array($qtgl); echo"$tgl[0]"; ?>" readonly="true"/> 
</label> </td>
</tr>
<tr> <td colspan="3" align="right">      <label> <input name="Submit" type="submit" id="Submit" value="Add" /> <input name="Cancel" type="submit" value="Cancel" /> 
</label> </td>
</tr>
</table>
</form>