<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
$conn=mysqli_connect('localhost','root','','haha');
//mysql_select_db('haha');


$username=$_POST['username'];
$password=$_POST['password'];
$submit=$_POST['submit'];


if($submit){
	$sql="select*from user where username='$username' and password='$password' ";
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($query);

	if($row['username']!==""){
		//berhasil login
		$_SESSION['username']=$row['1'];
		$_SESSION['status']=$row['4'];
		header("location:hasil.php")
		?>
		
		<!--<script language="javascript">
		alert('Anda Login Sebagai <php echo $row['username']; ?>');
		window.location="hasil.php";
		</script>
		-->
		
		<?php
		//header("Location:hasil.php");
		//die();
		}else{
			echo "username dan sandi salah";
			header("location:login.php")
			
			?>
			<!--<script language script='Javascript'>
			alert ('gagal login silahkan login kembali');
			document.location='login.php';
			</script> -->
			<?php
	}
}
?>
<form method='POST' name='form' action='login.php'>
<p align='center'>
Username &nbsp :&nbsp<input type='text' name='username'><br>
Password &nbsp :&nbsp<input type='password' name='password'><br>
<input type='submit' name='submit' value='kirim'>
</p>
</form>