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

<form method="POST" action="input_pegawai.php">
<table border="0" align="center">
<tr>
<td colspan="3"><h2 align="center"> Masukkan Data Pegawai </h2></td>
</tr>
<tr>

</tr>
<tr>
<td width="90"> Username </td>
<td width="15"> : </td>
<td width="212" align="right"> <label> <input type="text" name="Username" id="Username"/> </label> </td>
</tr>
<tr>
<td> Password </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Password" id="Password"/> </label> </td>
</tr>
<tr>
<td> Nama </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Nama" id="Nama"/> </label> </td>
</tr>
<tr>
<td> Telepon </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Telepon" id="Telepon"/> </label> </td>
</tr>
<tr>
<td>&nbsp; </td>
<td>&nbsp; </td>
<td align="right"> <label></label> <input type="submit" name="Submit" id="Submit" value="Add">
  <input type="submit" name="Cancel" id="Cancel" value="Cancel" /></td>
</tr>
</table>
</form>