<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
$conn=mysqli_connect('localhost','root','');
mysql_select_db('haha');

$username=$_POST['username'];
$password=$_POST['password'];
$submit=$_POST['submit'];

if($submit){
	$sql="select*from user where username='$username' and password='$password' ";
	$query=mysql_query($sql);
	$row=mysql_fetch_array($query);
	if($row['username']!==""){
		//berhasil login
		$_SESSION['username']=$row['username'];
		$_SESSION['status']=$row['status'];
		?>
		<script language script="javascript">
	alert('Anda Login Sebagai <php echo $row['username']; ?>');
	document.location='hasillogin.php';
	</script>
	<?php
	}else{
		//gagal login
		echo "username dan sandi salah";
		?>
		<script language script='javascript'>
		alert ('gagal login silahkan login kembali');
		document.location='login.php';
		</script>
		<?php
	}
}
?>
<form method='POST' name='form' action='login.php'>
<p align='center'>
Username &nbsp :&nbsp<input type='text' name='username'><br>
Password &nbsp :&nbsp<input type='password' name='password'><br>
<input type='submit' name='submit'>
</p>
</form>