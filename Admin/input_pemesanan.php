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

<?php
include "koneksi.php";
$Nama_Pegawai=$_POST['ID_Pegawai'];
	$query2=mysql_query("select ID from pegawai where Nama='$Nama_Pegawai'");
	$ID_Pegawai=mysql_fetch_array($query2);
$ID_Pembeli=$_POST['ID_Pembeli'];
$Tgl_Pesan=$_POST['Tgl_Pesan'];
$Status_Kirim=0;



if($_POST['Submit'])
{
$query=mysql_query("insert into pemesanan(ID_Pegawai,ID_Pembeli,Tgl_Pesan,Status_Kirim) values('$ID_Pegawai[0]','$ID_Pembeli','$Tgl_Pesan','$Status_Kirim')");	
	

echo"<form method='post' action='input_detailpemesanan.php' name='form1'>";
	
	echo"<h3 align='center'> <font size='5'> Masukkan Data Detail Pemesanan </font></h3><br>";
			
	$i = 0;
	foreach($_POST['pilihan'] as $pil)
	{
		if($pil)
		{		
			include"koneksi.php";
			$query=mysql_query("select * from barang where ID='$pil'");
			$query2=mysql_query("select MAX(ID) from pemesanan");
			
			while($tampil=mysql_fetch_array($query))
			{
				while($tampil2=mysql_fetch_array($query2))
				{
				echo"<table border='0' align='center'>
					<tr> </tr>
					<tr> <td> ID Pemesanan </td>
						 <td> : </td>
						 <td> <label></label> <input type='text' name='ID_Pemesanan[$i]' id='ID_Pemesanan' value='$tampil2[0]' readonly='true'/></td></tr>
					<tr> <td> ID Barang </td>
						 <td> : </td>
						 <td><font size='4'> $tampil[Nama] </font><input type='hidden' name='ID_Barang[$i]' id='ID_Barang' value='$tampil[ID]'/></td>
					</tr>
					<tr> <td> Harga </td>
						 <td> : </td>
						 <td><label> <input type='text' name='Harga[$i]' id='Harga' value='$tampil[Harga]' readonly='true'/></label> </td></tr>
					<tr> <td> Stok Barang </td>
						 <td> : </td>
						 <td><label> <input type='text' name='Stok[$i]' id='Stok' value='$tampil[Stok]' readonly='true'/></label> </td></tr>
					<tr> <td> Banyak Pesan </td>
						 <td> : </td>
   						 <td> <label> <input type='text' name='Byk_Pesan[$i]' id='Byk_Pesan' /> </label> </td></tr>
					<tr> <td colspan='3'> ___________________________________________________</tr>
					</table><br>"; 
				
				}
			}
			$i++;
		}
		
	}
	echo"<table align='center'>
			<tr>
			<td align='center'><label> <input name='Submit' type='submit' id='Submit' value='Insert' />
										<input type='hidden' name='jumlah' id='jumlah' value='$i'/></label>
			</td>
			</tr>
			</table>";
	echo"</form>";
	
}
else
{
header("location:Show_Pemesanan.php");
}
?>
