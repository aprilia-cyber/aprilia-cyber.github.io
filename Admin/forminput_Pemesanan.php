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

<form method="post" action="input_pemesanan.php">

  <table border="0" align="center">
    <tr>
      <td colspan="5" align="center"><h2> Masukkan Data Pemesanan </h2></td>
    </tr>
    <tr>
      <td width="203"> ID Pegawai </td>
      <td width="20"> : </td>
      <td width="280" colspan="3"><label>
        <input type="text" name="ID_Pegawai" readonly="true"
				value="<?php
						include"koneksi.php";
						$Username=$_SESSION['Username'];
						$pegawai=mysql_query("select pegawai.Nama from pegawai where Username='$Username'");
						$tampil=mysql_fetch_array($pegawai);
						  echo"$tampil[Nama]";
						?>"  />
      </label>      </td>
    </tr>
    <tr>
      <td> ID Pembeli</td>
      <td> : </td>
      <td colspan="3"><label>
        <select name="ID_Pembeli" id="ID_Pembeli">
          <?php
include "koneksi.php";
$query=mysql_query("select*from pembeli");
while($tampil=mysql_fetch_array($query))
{
echo"<option value='$tampil[ID]'> $tampil[Nama] </option>";
}
?>
        </select>
        </label>      </td>
    </tr>
    <tr>
      <td> Tanggal Pesan</td>
      <td> : </td>
      <td colspan="3"><label>
        <input type="text" name="Tgl_Pesan" id="Tgl_Pesan" value="<?php $qtgl=mysql_query("SELECT now()"); $tgl=mysql_fetch_array($qtgl); echo"$tgl[0]"; ?>" readonly="true"/>
        </label>      </td>
    </tr>
	<tr><td colspan="5">-------------------------------------------------------------------------------</td>
	</tr>
    <tr >
      <td colspan="3" >     Nama Barang<br />
        <label>
        <?php
		include"koneksi.php";
		$query=mysql_query("select * from barang");
		$i = 0;
		while($tampil=mysql_fetch_array($query))
		{
		echo" <input type='checkbox' name=pilihan[$i] value='$tampil[ID]'> <font size='4'> $tampil[Nama] </font><br>"; 
		$i++;
		}
		?>
        </label></td>
	  
    </tr>
   
    <tr>
      <td colspan="5" align="right"><label>
        <input name="Submit" type="submit" id="Submit" value="Insert" />
        <input name="Cancel" type="submit" id="Cancel" value="Cancel" />
              </label>      </td>
    </tr>
  </table>
</form>