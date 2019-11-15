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
$query=mysql_query("select*from pembeli order by ID");
echo"<h3 align='right'><a href='Home.php'> Home </a></h3>";
?>
</p>
<form action="Search_Pembeli.php" method="post">
<h5 align="center"><font face="Monotype Corsiva" size="7" color="#993300"> Data Pembeli </font></h5>
<input type="text" name="text" placeholder="Masukkan nama pembeli" required />
<input type="submit" name="submit" value="Cari" />
<br /><br /><br />
<table width="505" border="0" align="center" frame="below">
<tr bgcolor="#FFCC66"> 
<td width="35" height="43" align="center"> <font size="3"><b> ID </b></font></td>
<td width="170" align="center"> <font size="3"><b> NAMA </b></font> </td>
<td width="158" align="center"><font size="3"><b> ALAMAT </b></font></td>
<td width="114" align="center"><font size="3"><b> TELP. / HP </b></font> </td>
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
<td bgcolor="#FFCC66" align="center"><?php echo"$tampil[0]"; ?> </td>
<td align="center"><?php echo"$tampil[1]"; ?> </td>
<td align="center"><?php echo"$tampil[2]"; ?> </td>
<td align="center"><?php echo"$tampil[3]"; ?> </td>
</tr>
<?php
$i++;
}
?>
</table>
<h4 align="right"><a href="forminput_Pembeli.php"> + Tambah Pembeli Baru </a></h4>
</form>