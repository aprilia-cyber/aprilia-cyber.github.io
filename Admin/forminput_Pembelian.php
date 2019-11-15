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


<form method="post" action="input_pembelian.php">
<table border="1">
<tr> <td colspan="3"> Masukkan Data Pembelian </td>
</tr>
<tr> 
</tr>
<tr> <td> ID_Barang </td>
<td> : </td>
<td> <label>
  <select name="ID_Barang" id="ID_Barang">
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
<tr> <td> ID_Pegawai </td>
<td> : </td>
<td><label>
  <input type="text" name="ID_Pegawai" readonly="true"
  value="<?php
			include"koneksi.php";
			$Username=$_SESSION['Username'];
			$pegawai=mysql_query("select pegawai.Nama from pegawai where Username='$Username'");
			$tampil=mysql_fetch_array($pegawai);
				echo"$tampil[Nama]"; ?>"/>
</label></td>
</tr>
<tr> <td> Tgl_Pembelian </td>
<td> : </td>
<td> <label> <input type="text" name="Tgl_Pembelian" id="Tgl_Pembelian" /> </label> </td>
</tr>
<tr> <td>&nbsp; </td>
<td>&nbsp;  </td>
<td> <label> <input type="submit" name="Submit" id="Submit" /> </label> </td>
</tr>
</table>
</form>
