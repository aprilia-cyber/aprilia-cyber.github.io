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
$tampil=mysql_query("select*from pembeli where ID='$_GET[id]'");
$kolom=mysql_fetch_array($tampil);
?>

<form method="post" action="edit_pembeli.php">
<table border="1">
<tr> <td colspan="3"> Masukkan Data Pembeli </td>
</tr>
<tr> <td> ID </td>
<td> : </td>
<td> <label> <input type="text" name="ID" id="ID" value="<?php echo"$kolom[0]"; ?>" readonly="true" /> </label> </td>
</tr>
<tr> <td> Nama </td>
<td> : </td>
<td> <label> <input type="text" name="Nama" id="Nama" value="<?php echo"$kolom[1]"; ?>"/> </label> </td>
</tr>
<tr> <td> Alamat </td>
<td> : </td>
<td> <label> <input type="text" name="Alamat" id="Alamat" value="<?php echo"$kolom[2]"; ?>" /> </label> </td>
</tr>
<tr> <td> Telp </td>
<td> : </td>
<td> <label> <input type="text" name="Telp" id="Telp" value="<?php echo"$kolom[3]"; ?>"/> </label> </td>
</tr>
<tr> <td>&nbsp; </td>
<td>&nbsp;  </td>
<td> <label> <input type="submit" name="Submit" id="Submit" value="Edit" /> </label> </td>
</tr>
</table>
</form>