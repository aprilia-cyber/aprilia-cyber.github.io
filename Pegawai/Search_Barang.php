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
$query=mysql_query("select*from barang where Nama like '%$_POST[text]%' order by ID");
echo"<h3 align='right'><a href='Home.php'> Home </a></h3>";
?>
</p>
<form action="Search_Barang.php" method="post">
<h5 align="center"><font face="Monotype Corsiva" size="7" color="#000000"> Data Barang </font></h5>
<input type="text" name="text" placeholder="Masukkan nama barang" required />
<input type="submit" name="submit" value="Cari" />
<table width="634" align="center" frame="below">
<tr bgcolor="#00CCFF">
<td width="34" height="39" align="center"> <font size="3"><b> ID </b></font></td>
<td width="334" align="center"> <font size="3"><b> NAMA </b></font></td>
<td width="96" align="center"> <font size="3"><b> HARGA </b></font></td>
<td width="59" align="center"> <font size="3"><b> STOK </b></font></td>
<td width="87" align="center"> <font size="3"><b> KET. </b></font></td>
</tr>

<?php
$i=0;
while($tampil=mysql_fetch_row($query))
{
	if($i%2==0)
		{
		$color="#FFFFFF";
		}
	else
		{
		$color="#DADADA";
		}
?>
<tr bgcolor= <?php echo"$color"; ?> >
<td bgcolor="#00CCFF"  align="center"><?php echo"$tampil[0]"; ?> </td>
<td><?php echo"$tampil[1]"; ?> </td>
<td align="center"><?php echo"$tampil[2]"; ?> </td>
<td align="center"><?php echo"$tampil[3]"; ?> </td>
<td align="center"><?php echo"$tampil[4]"; ?> </td>
</tr>
<?php
$i++;
}
?>
</table>
<h4 align="right"><a href="forminput_Barang.php"> + Tambah Barang Baru </a></h4>
</form>