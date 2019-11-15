<?php
session_start();
if(!isset($_SESSION['Username']))
{
?>
<script language="javascript">
alert("Maaf anda harus login terlebih dahulu");
document.location="Login.php";
</script>
<?php
exit;
}
?>

<?php
include "koneksi.php";
$query=mysql_query("select pembelian.ID,barang.Nama,pegawai.Nama,pembelian.Tgl_Pembelian from barang,pegawai,pembelian where barang.ID=pembelian.ID_Barang and pegawai.ID=pembelian.ID_Pegawai and barang.Nama like '%$_POST[text]%' order by pembelian.ID ");
echo"<h3 align='right'><a href='Home.php'> Home </a></h3>";
?>
</p>
<form action="Search_Pembelian.php" method="post">
<h5 align="center"><font face="Monotype Corsiva" size="7" color="#993300"> Data Pembelian </font></h5>
Masukkan Nama Barang : 
<input type="text" name="text"  />
<input type="submit" name="submit" value="Search" />
<br />
<br />
<br />
<table border="1" align="center">
<tr>
<td width="21" height="38" align="center"> ID </td>
<td width="139" align="center"> Nama Barang </td>
<td width="171" align="center"> Nama Pegawai </td>
<td width="153" align="center"> Tanggal Pembelian </td>
<td width="46" align="center"> Edit </td>
<td width="47" align="center"> Delete </td>
</tr>
<?php
while($tampil=mysql_fetch_row($query))
{
?>
<tr>
<td><?php echo"$tampil[0]"; ?> </td>
<td><?php echo"$tampil[1]"; ?> </td>
<td><?php echo"$tampil[2]"; ?> </td>
<td><?php echo"$tampil[3]"; ?> </td>
<td><?php echo"<a href='formedit_Pembelian.php?id=$tampil[0]'> Edit </a>"; ?> </td>
<td><?php echo"<a href='delete_pembelian.php?id=$tampil[0]'> Delete </a>"; ?> </td>
</tr>
<?php
}
?>
</table>
<h4 align="right"><a href="forminput_DetailPembelian.php"> + Tambah Pembelian Barang </a></h4>
</form>