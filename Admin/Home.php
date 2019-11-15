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
echo"<font face='Monotype Corsiva' size='6'>";
echo"Selamat Datang " .$_SESSION['Username'];
echo"</font>";
echo"<br> <br>";
echo'<br><a href="Show_Pegawai.php"> Data Pegawai </a>';
echo'<br><a href="forminput_Pegawai.php"> + Tambah Pegawai Baru </a>';
echo'<br><a href="Show_Barang.php"> Data Barang </a>';
echo'<br><a href="forminput_Barang.php"> + Tambah Barang Baru </a>';
echo'<br><a href="Show_Pembeli.php"> Data Pembeli </a>';
echo'<br><a href="forminput_Pembeli.php"> + Tambah Pembeli Baru </a>';
echo'<br><a href="Show_Pemesanan.php"> Data Pemesanan </a>';
echo'<br><a href="forminput_Pemesanan.php"> + Tambah Pesanan Baru </a>';
echo'<br><a href="Show_DetailPembelian.php"> Detail Pembelian </a>';
echo'<br><a href="forminput_DetailPembelian.php"> + Tambah Pembelian Barang </a>';
echo'<br><a href="Show_DetailPemesanan.php"> Detail Pemesanan </a>';
echo'<br><a href="Show_LaporanPembelian.php"> Laporan Pembelian </a>';
echo'<br><a href="Show_LaporanPemesanan.php"> Laporan Pemesanan </a>';
echo'<br><a href="Search_LabaRugi.php"> Laporan Laba Rugi </a>';
echo'<br><a href="Logout.php"> Logout </a>';
?>