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

<form action="ReportLabaRugi.php" method="post">
<h5 align="center"><font face="Monotype Corsiva" size="7" color="#000000"> Laporan Laba Rugi </font></h5>
<br /><br />
<table align="center" frame="border">
<tr align="center" bgcolor="#FF6666"><td width="331" height="51"><font size="+2"><b>Masukkan Bulan dan Tahun </b></font></td>
</tr>
    <tr align="center"><td height="65"><select name="Bulan" id="Bulan">
      <?php
		echo"<option value='%'> - </option>
				<option value='01'> Januari </option>
				<option value='02'> Februari </option>
				<option value='03'> Maret </option>
				<option value='04'> April </option>
				<option value='05'> Mei </option>
				<option value='06'> Juni </option>
				<option value='07'> Juli </option>
				<option value='08'> Agustus </option>
				<option value='09'> September </option>
				<option value='10'> Oktober </option>
				<option value='11'> Nopember </option>
				<option value='12'> Desember </option>";
		?>
    </select>
    <select name="Tahun" id="Tahun">
      <?php
		include "koneksi.php";
		echo"<option value='%'> - </option>";
		$mulai=1998;
		$querythn=mysql_query("select year(curdate())");
		$thn=mysql_fetch_array($querythn);
		for($mulai=1998; $mulai<=$thn[0]; $mulai++)
		{
		echo"<option value='$mulai'> $mulai </option>";
		}
		?>
    </select></td></tr>
 <tr align="center"><td> <input type="submit" name="submit" value="Tampil" /></td></tr></table>

</form>
