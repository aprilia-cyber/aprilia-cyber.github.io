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

<form method="post" action="input_detailpemesanan.php" name="form1">
<?php
$jsArray = "var idxhrg = new Array();";
?>
<table border="1">
<tr> <td colspan="3"> Masukkan Data Detail Pemesanan </td>
</tr>
<tr> 
</tr>
<tr> <td> ID Pemesanan </td>
<td> : </td>
<td> <label></label> <input type="text" name="ID_Pemesanan" id="ID_Pemesanan" value=""/></td>
</tr>
<tr> <td> ID Barang </td>
<td> : </td>
<td> <label>
  <input type="text" name="Harga3" id="Harga3" value=""/>
</label></td>
</tr>
<tr> <td> Harga </td>
<td> : </td>
<td><label> <input type="text" name="Harga" id="Harga" value=""/>
</label> </td>
</tr>
<tr> <td> Banyak Pesan </td>
<td> : </td>
<td> <label> <input type="text" name="Byk_Pesan" id="Byk_Pesan" /> </label> </td>
<tr> <td>&nbsp;  </td>
<td>&nbsp;  </td>
<td> <label> <input type="submit" name="Submit" id="Submit" /> </label> </td>
</tr>
</table>
    <script type="text/javascript">  
	<?php echo $jsArray; ?>    
    function changeValue(ID)
	{   
    document.getElementById('Harga').value = idxhrg[ID].index;  
    };  
    </script>
</form>
