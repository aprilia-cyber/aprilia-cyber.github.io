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

<form method="post" action="input_pembeli.php">
<table border="0" align="center">
<tr> <td colspan="3"> <h2 align="center">Masukkan Data Pembeli </h2></td>
</tr>
<tr> 
</tr>
<tr> <td> Nama </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Nama" id="Nama" /> </label> </td>
</tr>
<tr> <td> Alamat </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Alamat" id="Alamat" /> </label> </td>
</tr>
<tr> <td> Telp </td>
<td> : </td>
<td align="right"> <label> <input type="text" name="Telp" id="Telp" /> </label> </td>
</tr>
<tr> <td>&nbsp; </td>
<td>&nbsp;  </td>
<td align="right"> <label> <input name="Submit" type="submit" id="Submit" value="Add"  /> 
  </label> <input name="Cancel" type="submit" id="Cancel" value="Cancel"></td>
</tr>
</table>
</form>