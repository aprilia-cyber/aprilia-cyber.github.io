<?php
session_start();
include "koneksi.php";
if($_POST['Submit'])
{
	if($_POST['Username']=='')
		{
		?>
		<script language="javascript">
		alert("Masukkan Username Anda");
		document.location="login_admin.html";
		</script>
		<?php
		}
	else if($_POST['Password']=='')
		{
		?>
		<script language="javascript">
		alert("Masukkan Password Anda");
		document.location="login_admin.html";
		</script>
		<?php
		}
	else
	{
		$masuk=mysql_query("select*from pegawai where (Username='$_POST[Username]') and (Password='$_POST[Password]')");
		$nobaris=mysql_num_rows($masuk);
			if($nobaris==1)
			{
				if($_POST['Username']=='admin')
				{
				$_SESSION['Username']=$_POST['Username'];
				?>
				<script language="javascript">
				alert("Login Berhasil !!");
				document.location="home_admin.php";
				</script>
				<?php
				}
				else
				{
				?>
				<script language="javascript">
				alert("Maaf anda tidak terdaftar sebagai admin");
				document.location="login_admin.html";
				</script>
				<?php
				}
			}
			else
			{
			?>
			<script language="javascript">
			alert("Maaf username atau password salah \n Silahkan ulangi kembali");
			document.location="login_admin.html";
			</script>
			<?php
			}
		}
}
else
{
			?>
			<script language="javascript">
			alert("Maaf anda harus login terlebih dahulu");
			document.location="login_admin.html";
			</script>
			<?php
}
?>