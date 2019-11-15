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
include"koneksi.php";
$tampil=mysql_query("select*from pegawai where ID='$_GET[id]'");
$kolom=mysql_fetch_array($tampil);
?>

<form method="post" action="edit_pegawai.php">
<table width="283" border="0" align="center">
<tr>
<td colspan="3"><h2 align="center"> Masukkan Data Pegawai </h2></td>
</tr>
<tr>
<td width="79"> ID </td>
<td width="42"> : </td>
<td width="148"> <label> <input type="text" name="ID" id="ID" value="<?php echo"$kolom[0]"; ?>" readonly="true"/> </label> </td>
</tr>
<tr>
<td> Username </td>
<td> : </td>
<td> <label> <input type="text" name="Username" id="Username" value="<?php echo"$kolom[1]"; ?>"/> </label> </td>
</tr>
<tr>
<td> Password </td>
<td> : </td>
<td> <label> <input type="text" name="Password" id="Password" value="<?php echo"$kolom[2]"; ?>"/> </label> </td>
</tr>
<tr>
<td> Nama </td>
<td> : </td>
<td> <label> <input type="text" name="Nama" id="Nama" value="<?php echo"$kolom[3]"; ?>"/> </label> </td>
</tr>
<tr>
<td> Telepon </td>
<td> : </td>
<td> <label> <input type="text" name="Telepon" id="Telepon" value="<?php echo"$kolom[4]"; ?>"/> </label> </td>
</tr>
<tr>
<td>&nbsp; </td>
<td>&nbsp; </td>
<td align="right"> <label></label> <input type="submit" name="Submit" id="Submit" value="Edit"> <input type="submit" name="Cancel" id="Cancel" value="Cancel" /></td>
</tr>
</table>
</form>