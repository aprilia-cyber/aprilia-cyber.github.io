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
$Tgl=$_POST['Tgl'];
$Bln=$_POST['Bln'];
$Thn=$_POST['Thn'];

if($_POST['submit'])
{
$query=mysql_query("select pemesanan.Tgl_Pesan,barang.Nama,detail_pemesanan.Harga,Byk_Pesan,(detail_pemesanan.Harga*detail_pemesanan.Byk_Pesan) as Total from pemesanan,detail_pemesanan,barang where pemesanan.ID=detail_pemesanan.ID_Pemesanan and barang.ID=detail_pemesanan.ID_Barang and pemesanan.Tgl_Pesan like'$Thn-$Bln-$Tgl%'");

$T=mysql_query("select SUM(detail_pemesanan.Harga*detail_pemesanan.Byk_Pesan) as Total from pemesanan,detail_pemesanan,barang where pemesanan.ID=detail_pemesanan.ID_Pemesanan and barang.ID=detail_pemesanan.ID_Barang and pemesanan.Tgl_Pesan like'$Thn-$Bln-$Tgl%'");
$Total=mysql_fetch_array($T);



echo"<h3 align='right'><a href='Home.php'> Home </a></h3>";
?>
<form action="Search_LaporanPemesanan.php" method="post">
<h5 align="center"><font face="Monotype Corsiva" size="7" color="#000000"> Laporan Pemesanan  <br><?php if($Tgl=='%'){echo"";}else{echo"$Tgl";} echo" ";  
if($Bln=='%'){echo"";}
else if($Bln=='01'){echo"Januari";}
else if($Bln=='02'){echo"Februari";}
else if($Bln=='03'){echo"Maret";}
else if($Bln=='04'){echo"April";}
else if($Bln=='05'){echo"Mei";}
else if($Bln=='06'){echo"Juni";}
else if($Bln=='07'){echo"Juli";}
else if($Bln=='08'){echo"Agustus";}
else if($Bln=='09'){echo"September";}
else if($Bln=='10'){echo"Oktober";}
else if($Bln=='11'){echo"Nopember";}
else if($Bln=='12'){echo"Desember";}
else{echo"Bulan Tak Terdefinisi";}
 echo" ";  
if($Thn=='%'){echo"";}else{echo"$Thn";} ?>
</font></h5>

Masukkan Tahun : <br />
<select name="Tgl">
		<?php
		include "koneksi.php";
		echo"<option value='%'> - </option>";
		
		$t=0;
		for($s=1; $s<=9; $s++)
			{
			echo"<option value='$t$s'> $t$s</option>";
			}
		for($st=10; $st<=31; $st++)
			{
			echo"<option value='$st'> $st</option>";
			}
		
		?>
  </select>
<select name="Bln">
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
<select name="Thn">
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
  </select><input type="submit" name="submit" value="Cari" />
<br />
<br>

<table width="1277" height="96" border="0" align="center">
  <tr>
    <td width="647" height="92"><table width="825" height="162" border="0" align="center" frame="below">
      <tr bgcolor="#00CCFF">
        <td width="182" height="49" align="center"><font size="3"><b>TANGGAL</b></font> </td>
        <td width="279" align="center"><font size="3"><b> NAMA BARANG </b></font></td>
        <td width="132" align="center"><font size="3"><b> HARGA </b></font></td>
		<td width="94" align="center"><font size="3"><b> BANYAK PESAN </b></font></td>
		<td width="116" align="center"><font size="3"><b> TOTAL </b></font></td>
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
        <td height="20" align="center"><?php echo"$tampil[0]"; ?> </td>
        <td align="center"><?php echo"$tampil[1]"; ?> </td>
        <td align="center"><?php echo"$tampil[2]"; ?> </td>
		<td align="center"><?php echo"$tampil[3]"; ?> </td>
		<td align="center"><?php echo"$tampil[4]"; ?> </td>
      </tr>
      <?php
$i++;
}
?>
<tr>
<td colspan="4" align="center"> <font size="5"> <br />Total Pemesanan Barang </font></td>
<td align="right"> <font size="5"><br /><?php echo"$Total[0]"; ?> </font></td>
<tr>

    </table></td>
  </tr><tr>
  <td colspan="5" align="center"> <br /> <br /></td>
  </tr>
</table>

</form>
<?php
}
else if($_POST['printall'])
{
header("location:ReportPemesananAll.php");
}
?>
<form action="ReportPemesanan.php" method="post">
<table align="center">
<tr>
<td>
<label>
  <input name="Tanggal" type="hidden" id="Tanggal" value="<?php echo $Tgl; ?>"/>
  </label>
  <label>
  <input name="Bulan" type="hidden" id="Bulan" value="<?php echo $Bln ; ?>"/>
  </label>
  <label>
  <input name="Tahun" type="hidden" id="Tahun" value="<?php echo $Thn ; ?>"/>
  </label>
  <input type="submit" name="print" value="Cetak Laporan" />
  </td></tr>
  </table>
</form>
