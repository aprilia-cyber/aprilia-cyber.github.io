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
$tampil=mysql_query("select pemesanan.*,pegawai.Nama,pembeli.Nama from pemesanan,pegawai,pembeli where pegawai.ID=pemesanan.ID_Pegawai and pembeli.ID=pemesanan.ID_Pembeli and pemesanan.ID='$_GET[id]'");
$kolom=mysql_fetch_array($tampil);

	if($kolom[4]==1) 
	{
		?>
		<script language="javascript">
		alert("Maaf barang yang suda terkirim tidak bisa diperbarui");
		document.location="Show_Pemesanan.php";
		</script>
		<?php
	}
	else
	{
?>


<form method="post" action="edit_pemesanan.php">

  <table border="0" align="center">
    <tr>
      <td colspan="5" align="center"> <font size="5"> Masukkan Data Pemesanan </font></td>
    </tr>
	    <tr>
      <td width="203"> ID </td>
      <td width="20"> : </td>
      <td width="280" colspan="3"><label>
        <input type="text" name="ID" readonly="true"
				value="<?php echo"$kolom[0]"; ?>"  /> 
      </label>      </td>
    </tr>
    <tr>
      <td width="203"> ID Pegawai </td>
      <td width="20"> : </td>
      <td width="280" colspan="3"><label>
        <input type="text" name="Nama_Pegawai" readonly="true"
				value="<?php echo"$kolom[7]"; ?>"  /> 
		<input type="hidden" name="ID_Pegawai" readonly="true"
				value="<?php echo"$kolom[1]"; ?>"  />
      </label>      </td>
    </tr>
	 <tr>
      <td width="203"> ID Pengirim </td>
      <td width="20"> : </td>
      <td width="280" colspan="3"><label>
       <input type="text" name="Nama_Pengirim" readonly="true"
				value="<?php
						include"koneksi.php";
						$Username=$_SESSION['Username'];
						$pegawai=mysql_query("select pegawai.Nama from pegawai where Username='$Username'");
						$tampil=mysql_fetch_array($pegawai);
						  echo"$tampil[Nama]";
						?>"  />
		 <input type="hidden" name="ID_Pengirim" readonly="true"
				value="<?php
						include"koneksi.php";
						$U=$_SESSION['Username'];
						$p=mysql_query("select pegawai.ID from pegawai where Username='$Username'");
						$look=mysql_fetch_array($p);
						  echo"$look[ID]";
						?>"  />
		
      </label>      </td>
    </tr>
    <tr>
      <td> ID Pembeli</td>
      <td> : </td>
      <td colspan="3"><label>
        <input type="text" name="Nama_Pembeli" readonly="true"
				value="<?php echo"$kolom[8]"; ?>"  />
		<input type="hidden" name="ID_Pembeli" readonly="true"
				value="<?php echo"$kolom[2]"; ?>"  />
        </label>      </td>
    </tr>
    <tr>
      <td> Tanggal Pesan</td>
      <td> : </td>
      <td colspan="3"><label>
        <input type="text" name="Tgl_Pesan" id="Tgl_Pesan" value="<?php echo"$kolom[3]"; ?>"  readonly="true"/>
        </label>      </td>
    </tr>
	  <tr>
      <td> Tanggal Kirim</td>
      <td> : </td>
      <td colspan="3"><label>
        <input type="text" name="Tgl_Kirim" id="Tgl_Kirim" value="<?php $qtgl=mysql_query("SELECT now()"); $tgl=mysql_fetch_array($qtgl); echo"$tgl[0]"; ?>" readonly="true"/>
        </label>      </td>
    </tr>
    <tr>
      <td> Status_Kirim </td>
      <td> : </td>
      <td> <label>

<input name="stts" type="radio" value="0" checked="checked"/>Belum Terkirim <br />
<input name="stts" type="radio" value="1" />Sudah Terkirim

</label></td>     </td>
    </tr>
	<tr><td colspan="5">-------------------------------------------------------------------------------</td>
	</tr>
    <tr >
      <td colspan="3" align="center"> <font size="4"> Barang yang dipesan : </font><br /><br />
        <label>
        <?php
		include"koneksi.php";

		$q=mysql_query("select barang.ID,Nama,detail_pemesanan.Byk_Pesan from barang,pemesanan,detail_pemesanan where pemesanan.ID=detail_pemesanan.ID_Pemesanan and barang.ID=detail_pemesanan.ID_Barang and pemesanan.ID='$_GET[id]'");
		
		$i=0;
			while($res=mysql_fetch_row($q))
			{
			echo"$res[2]  $res[1] <br>";
			$i++;
			}

		?>
        </label></td>
	  
    </tr>
   
    <tr>
      <td colspan="5" align="right"><label>
        <input name="Submit" type="submit" id="Submit" value="Edit" /><input name="Cancel" type="submit" id="Cancel" value="Cancel" />
              </label>      </td>
    </tr>
  </table>
 
</form>
<?php
}
?>