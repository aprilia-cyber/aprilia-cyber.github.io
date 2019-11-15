<?php
session_start();
if(!isset($_SESSION['Username']))
{
?>
<script language = "javascript">
alert("Maaf anda harus login terlebih dahulu");
document.location="Login.php";
</script>
<?php
exit;
}
?>

<?php 
include "koneksi.php";
$kosong=mysql_query("select detail_pemesanan.* from pemesanan RIGHT JOIN detail_pemesanan ON pemesanan.ID=detail_pemesanan.ID_Pemesanan where pemesanan.ID is null");
while($detail=mysql_fetch_array($kosong))
			{
			$data_barang=mysql_query("select barang.* from barang,detail_pemesanan where barang.ID=detail_pemesanan.ID_Barang and detail_pemesanan.ID='$detail[ID]'");
			$barang=mysql_fetch_array($data_barang);

			$tambah="$barang[Stok]"+"$detail[Byk_Pesan]";

			$edit=mysql_query("update barang set Stok='$tambah' where ID='$barang[ID]'");
			$deldetail=mysql_query("delete from detail_pemesanan where ID='$detail[ID]'");
			}


$query=mysql_query("select detail_pemesanan.ID,ID_Pemesanan,pegawai.Nama,barang.Nama,detail_pemesanan.Harga,Byk_Pesan,pemesanan.Status_Kirim from pegawai,barang,detail_pemesanan,pemesanan where barang.ID=detail_pemesanan.ID_Barang and pemesanan.ID=detail_pemesanan.ID_Pemesanan and pegawai.ID=pemesanan.ID_Pegawai order by detail_pemesanan.ID");
echo"<h3 align='right'><a href='Home.php'> Home </a></h3>";
?>

</p>
</p>
<form action="Search_DetailPemesanan.php" method="post">
<h5 align="center"><font face="Monotype Corsiva" size="7" color="#000000"> Detail Pemesanan </font></h5>
<input type="text" name="text" placeholder="Masukkan ID Pemesanan" required />
<input type="submit" name="submit" value="Cari" />
<br />
<br />
<br />
<table width="1063" border="0" align="center" frame="below">
<tr bgcolor="#00CCFF">
<td width="30" height="50" align="center"><font size="3"><b> ID </b></font></td>
<td width="100" align="center"> <font size="3"><b>ID PEMESANAN</b></font> </td>
<td width="190" align="center"><font size="3"><b> NAMA PEGAWAI </b></font></td>
<td width="314" align="center"><font size="3"><b> NAMA BARANG </b></font></td>
<td width="95" align="center"> <font size="3"><b>HARGA </b></font></td>
<td width="82" align="center"><font size="3"><b> BANYAK PESAN </b></font></td>
<td width="127" align="center"><font size="3"><b> STATUS KIRIM </b></font></td>
<td width="43" align="center"></td>
<td width="44" align="center"></td>
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
<td bgcolor="#00CCFF" align="center"> <?php echo"$tampil[0]"; ?> </td>
<td align="center"> <?php echo"$tampil[1]"; ?> </td>
<td align="center"> <?php echo"$tampil[2]"; ?> </td>
<td align="center"> <?php echo"$tampil[3]"; ?> </td>
<td align="center"> <?php echo"$tampil[4]"; ?> </td>
<td align="center"> <?php echo"$tampil[5]"; ?> </td>
<td align="center"> <?php if($tampil[6]==1) { echo"Sudah Terkirim"; } else if($tampil[6]==0){echo"Belum Terkirim";} else{echo"status tidak terdaftar";}?></td>
<td align="center"> <?php echo"<a href ='formedit_DetailPemesanan.php?id=$tampil[0]'> Edit </a>"; ?> </td>
<td align="center"> <?php echo"<a href ='delete_detailpemesanan.php?id=$tampil[0]'> Cancel </a>"; ?> </td>
</tr>

<?php
$i++;
}
?>
</table>
</form>