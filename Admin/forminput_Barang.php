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

<form method="post" action="input_barang.php">
<table border="0" align="center">
<tr>
  <td colspan="3"> <h2 align="center">Masukkan Data Barang Baru </h2></td>
  <tr> <td width="123"> Nama </td>
<td width="51"> : </td>
<td width="152" align="right"> <label> <input type="text" name="Nama" id="Nama"/> </label> </td>

<tr> <td> Harga Beli </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Harga_Beli" id="Harga_Beli" /> </label> </td>
</tr>
<tr> <td> Harga Jual </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Harga_Jual" id="Harga_Jual" /> </label> </td>
</tr>
<tr> <td> Banyak Beli </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Byk_Beli" id="Byk_Beli" /> </label> </td>
</tr>
<tr> 
<td> Keterangan </td>
<td> : </td>
<td > <label> <select name="Keterangan" id="Keterangan">
<option value='Buah'> Buah </option>
<option value='Pak'> Pak </option>
<option value='Lusin'> Lusin </option>
<option value='Dus Kecil'> Dus Kecil </option>
<option value='Dus'> Dus </option>
<option value='Roll'> Roll </option>
<option value='Riem'> Riem </option>
</select>
 </label> </td>
</tr>
<tr> <td> ID Pegawai </td>
  <td> : </td>
<td align="right"> <label> <input type="text" name="ID_Pegawai" id="ID_Pegawai" readonly="true"
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
<td align="right"> <label> <input type="text" name="Tgl_Pembelian" id="Tgl_Pembelian" value="<?php $qtgl=mysql_query("SELECT now()"); $tgl=mysql_fetch_array($qtgl); echo"$tgl[0]"; ?>" readonly="true"/> 
</label> </td>
</tr>
<tr> <td colspan="3" align="right">     <label> <input name="Submit" type="submit" id="Submit" value="Add" /> <input name="Cancel" type="submit" value="Cancel" />
</label> </td>


</table>
</form>