<?php
include "koneksi.php";
$query=mysql_query("select*from barang order by ID");
echo"<h3 align='right'><a href='HomeGuest.php'> Home </a></h3>";
?>
</p> 
<form action="Search_Barang.php" method="post">
<h5 align="center"><font face="Monotype Corsiva" size="7" color="#993300"> Data Barang </font></h5>
Masukkan nama barang : 
<input type="text" name="text" />
<input type="submit" name="submit" value="Search" />
<table width="397" align="center" frame="below">
<tr bgcolor="#0099FF">
<td width="41" height="39" align="center"> <font size="3"><b> ID </b></font></td>
<td width="175" align="center"> <font size="3"><b> NAMA </b></font></td>
<td width="105" align="center"> <font size="3"><b> HARGA </b></font></td>
<td width="56" align="center"> <font size="3"><b> STOK </b></font></td>
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
<td bgcolor="#0099FF"  align="center"><?php echo"$tampil[0]"; ?> </td>
<td><?php echo"$tampil[1]"; ?> </td>
<td align="center"><?php echo"$tampil[2]"; ?> </td>
<td align="center"><?php echo"$tampil[3]"; ?> </td>
</tr>
<?php
$i++;
}
?>
</table>
</form>