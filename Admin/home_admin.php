<?php
session_start();
if(!isset($_SESSION['Username']))
{
?>
<script language="javascript">
alert("Maaf anda harus login terlebih dahulu !!!");
document.location="login_admin.html";
</script>
<?php
exit;
}
?>
<html>
<head>
<title>Home Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
        ul, li{
  margin: 0;
  padding: 0;
  list-style-type: none;
 }

 ul.utama li{
	display: inline-block;
	width: 200px;
	height: 50px;
	text-align: center;
	background-color: #00CCFF;
	font-size: x-large;
	color: #000000;
 }
 ul li:hover{
	background-color: #0000FF;
 }

 ul.utama a{
   color: #fff;
   text-decoration: none;
   line-height: 30px;
 }
 ul.sub{
  display: none;
 }
 ul.utama li:hover ul.sub{
  display: block;
  position: absolute;
 }
 ul.sub li{
  display: block;
  margin-top: 1px;
 }
</style><style type="text/css">
        ul, li{
  margin: 0;
  padding: 0;
  list-style-type: none;
 }

 ul.utama li{
	display: inline-block;
	width: 200px;
	height: 50px;
	text-align: center;
	background-color: #00CCFF;
	font-size: x-large;
	color: #000000;
 }
 ul li:hover{
	background-color: #0000FF;
 }

 ul.utama a{
   color: #fff;
   text-decoration: none;
   line-height: 30px;
 }
 ul.sub{
  display: none;
 }
 ul.utama li:hover ul.sub{
  display: block;
  position: absolute;
 }
 ul.sub li{
  display: block;
  margin-top: 1px;
 }
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (home_pegawai.psd) -->
<table id="Table_01" width="1366" height="800" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="2">
			<img src="images/home_pegawai_01.jpg" width="1366" height="92" alt=""></td>
	</tr>
	<tr>
		<td rowspan="2" background="images/home_pegawai_02.jpg" width="221" height="708" alt="">
		</td>
	  <td background="images/home_pegawai_03.jpg" width="1145" height="54" alt="">
	  <ul class="utama">
	<li><a href="about.php" target="isi">About Us </a></li>	
    <li><a href="#">Insert</a>
 
 <ul class="sub">
   <li><a href="forminput_Pegawai.php" target="isi">Data Pegawai</a></li>
   <li><a href="forminput_Barang.php" target="isi">Data Barang</a></li>
   <li><a href="forminput_Pembeli.php" target="isi">Data Pembeli</a></li>
   <li><a href="forminput_Pembelian.php" target="isi">Data Pembelian</a></li>
   <li><a href="forminput_Pemesanan.php" target="isi">Data Pemesanan</a></li>
   <li><a href="forminput_DetailPembelian.php" target="isi">Detail Pembelian</a></li>
   <li><a href="forminput_DetailPemesanan.php" target="isi">Detail Pemesanan</a></li>
  </ul>
 </li>
 <li><a href="#">Show</a>

  <ul class="sub">
   <li><a href="Show_Pegawai.php" target="isi">Data Pegawai</a></li>
   <li><a href="Show_Barang.php" target="isi">Data Barang</a></li>
   <li><a href="Show_Pembeli.php" target="isi">Data Pembeli</a></li>
   <li><a href="Show_Pembelian.php" target="isi">Data Pembelian</a></li>
   <li><a href="Show_Pemesanan.php" target="isi">Data Pemesanan</a></li>
   <li><a href="Show_DetailPembelian.php" target="isi">Detail Pembelian</a></li>
   <li><a href="Show_DetailPemesanan.php" target="isi">Detail Pemesanan</a></li>
  </ul>
 </li>
 
 <li><a href="#">Laporan</a>
 	<ul class="sub">
    <li><a href="Show_LaporanPembelian.php" target="isi">Laporan Pembelian</a></li>
   	<li><a href="Show_LaporanPemesanan.php" target="isi">Laporan Pemesanan</a></li>
	<li><a href="Search_LabaRugi.php" target="isi">Laporan Laba Rugi</a></li>
	</ul>
 </li>
 
 <li><a href="Logout.php">Logout</a></li>
</ul>

	  </td>
	</tr>
	<tr>
		<td><iframe width="1145" height="654" name="isi"></iframe>
	</td>
	</tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>