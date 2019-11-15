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

$kosong=mysql_query("select pemesanan.ID from pemesanan LEFT JOIN detail_pemesanan ON pemesanan.ID=detail_pemesanan.ID_Pemesanan where detail_pemesanan.ID is null");
while($id=mysql_fetch_array($kosong))
{
$del=mysql_query("delete from pemesanan where ID='$id[ID]'");
}

$query=mysql_query("select pemesanan.ID,pegawai.Nama,pembeli.Nama,pemesanan.Tgl_Pesan,Status_Kirim,ID_Pengirim,Tgl_Kirim from pegawai,pembeli,pemesanan where pegawai.ID=pemesanan.ID_Pegawai and pembeli.ID=pemesanan.ID_Pembeli and pemesanan.Tgl_Pesan like'$Thn-$Bln-$Tgl%' order by pemesanan.ID");
echo"<h3 align='right'><a href='Home.php'> Home </a></h3>";
?>
</p>
<form action="Search_Pemesanan.php" method="post">
<h5 align="center"><font face="Monotype Corsiva" size="7" color="#000000"> Data Pemesanan </font></h5>
Masukkan Tanggal Pesan : <br />

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
  </select>
<input type="submit" name="submit" value="Cari" />
<br />
<br />
<br />
<table width="1069" border="0" align="center" frame="below">
<tr bgcolor="#00CCFF">
<td width="37" height="49" align="center"> <font size="3"><b>ID</b></font> </td>
<td width="161" align="center"><font size="3"><b> NAMA PEGAWAI </b></font></td>
<td width="145" align="center"> <font size="3"><b>NAMA PEMBELI </b></font></td>
<td width="150" align="center"> <font size="3"><b>TANGGAL PESAN </b></font></td>
<td width="133" align="center"> <font size="3"><b>STATUS KIRIM </b></font></td>
<td width="160" align="center"><font size="3"><b> NAMA PENGIRIM </b></font></td>
<td width="159" align="center"> <font size="3"><b>TANGGAL PENGIRIMAN </b></font></td>
<td width="41" align="center"> </td>
<td width="45" align="center"> </td>
</tr>

<?php
$i=0;
while($tampil=mysql_fetch_row($query))
{
$pengirim=mysql_query("select pegawai.Nama  from pegawai where ID='$tampil[5]'");
$nama=mysql_fetch_array($pengirim);
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
<td bgcolor="#00CCFF" align="center"> <?php echo"$tampil[0]"; ?> </td>
<td align="center"> <?php echo"$tampil[1]"; ?> </td>
<td align="center"> <?php echo"$tampil[2]"; ?> </td>
<td align="center"> <?php echo"$tampil[3]"; ?> </td>
<td align="center"> <?php if($tampil[4]==1) { echo"Sudah Terkirim"; } else if($tampil[4]==0){echo"Belum Terkirim";} else{echo"status tidak terdaftar";}?> </td>
<td align="center"> <?php if($tampil[5]==0) { echo"-"; } else{echo"$nama[0]";} ?> </td>
<td align="center"> <?php if($tampil[6]==0) { echo"-"; } else{echo"$tampil[6]";} ?> </td>
<td align="center"> <?php echo"<a href='formedit_Pemesanan.php?id=$tampil[0]'> Edit </a>" ?> </td>
<td align="center"> <?php echo"<a href='delete_pemesanan.php?id=$tampil[0]'> Cancel </a>" ?> </td>
</tr>
<?php
$i++;
}
?>
</table>
<h4 align="right"><a href="forminput_Pemesanan.php"> + Tambah Pesanan Baru </a></h4>
</form>


