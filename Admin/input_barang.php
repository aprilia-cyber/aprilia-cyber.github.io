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
$Nama = $_POST['Nama'];
$Harga_Beli=$_POST['Harga_Beli'];
$Harga_Jual=$_POST['Harga_Jual'];
$Byk_Beli=$_POST['Byk_Beli'];
$Keterangan=$_POST['Keterangan'];
$Nama_Pegawai = $_POST['ID_Pegawai'];
	$query2=mysql_query("select ID from pegawai where Nama='$Nama_Pegawai'");
	$ID_Pegawai=mysql_fetch_array($query2);
$Tgl_Pembelian=$_POST['Tgl_Pembelian'];

if($_POST['Submit'])
{
	if($_POST['Nama']=='')
		{
		?>
		<script language="javascript">
		alert("Masukkan nama barang baru");
		document.location="forminput_Barang.php";
		</script>
		<?php
		}
	else if($_POST['Harga_Beli']=='')
		{
		?>
		<script language="javascript">
		alert("Masukkan harga beli barang");
		document.location="forminput_Barang.php";
		</script>
		<?php
		}
	else if($_POST['Harga_Jual']=='')
		{
		?>
		<script language="javascript">
		alert("Masukkan harga jual barang");
		document.location="forminput_Barang.php";
		</script>
		<?php
		}
	else if($_POST['Byk_Beli']=='')
		{
		?>
		<script language="javascript">
		alert("Masukkan banyak pembelian barang");
		document.location="forminput_Barang.php";
		</script>
		<?php
		}
	else if($_POST['Tgl_Pembelian']=='')
		{
		?>
		<script language="javascript">
		alert("Masukkan tanggal pembelian barang");
		document.location="forminput_Barang.php";
		</script>
		<?php
		}
	else
		{
		
		$addname = mysql_query("insert into barang(Nama,Keterangan) values ('$Nama','$Keterangan')");
	
		$idbarang=mysql_query("select MAX(ID)from barang");
			$ID_Barang=mysql_fetch_array($idbarang);

		$query5=mysql_query("insert into pembelian(ID_Barang,ID_Pegawai,Tgl_Pembelian) values('$ID_Barang[0]','$ID_Pegawai[0]','$Tgl_Pembelian')");
		$query6=mysql_query("select MAX(ID) from pembelian");
			$ID_Pembelian=mysql_fetch_array($query6);


		$query7=mysql_query("insert into detail_pembelian(ID_Pembelian,ID_Barang,Harga_Beli,Harga_Jual,Byk_Beli) values('$ID_Pembelian[0]','$ID_Barang[0]','$Harga_Beli','$Harga_Jual','$Byk_Beli')");
	
		$query4=mysql_query("update barang set Harga='$Harga_Jual',Stok='$Byk_Beli' where ID='$ID_Barang[0]'");

				if($addname)
					{
					if($query7)
						{
						if($query4)
							{
								?>
								<script language="javascript">
								alert("Data Barang berhasil ditambahkan ");
								document.location="Show_Barang.php";
								</script>
								<?php
							}
						else
							{
								echo"INPUT DATA BARANG BARU GAGAL...";
								echo'<br> <br> <a href="Home.php"> Home </a>';
							}
						}
					}
		}
}
else
{
header("location:Show_Barang.php");
}
?>