<html>
    <head>
        <title> TUGAS MODUL 9 </title>
        <link rel='stylesheet' type='text/css' href='style.css'>
        <style type='text/css'>
            table,th,td
                { border:1px; border-style:none; }
			table1,th1,td1
                { border:2px; border-style:double; cellpadding:2;}
        </style>
    </head>
    <body>
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
		$_SESSION['username']=$row['username'];
		$_SESSION['status']=$row['status'];
		
		if($_SESSION['status']=='administrator'){
			header("location:admin.php");
		}elseif($_SESSION['status']=='member'){
			header("location:member.php");
		}else{
			echo "username dan sandi salah";
		header("location:login.php");
		}
		?>
		
		<!--<script language="javascript">
		alert('Anda Login Sebagai <php echo $row['username']; ?>');
		window.location="hasil.php";
		</script>
		-->
		
		<?php
		//header("Location:hasil.php");
		//die();

			
			?>
			<!--<script language script='Javascript'>
			alert ('gagal login silahkan login kembali');
			document.location='login.php';
			</script> -->
			<?php
	}
}
?>
		<br/>
		<div id='div1' name='div1''>
		</br>
		</br>
        <h2> <marquee> Welcome Stranger <?php echo $row[1]; ?> </marquee></h2>
		</div>
		<br/>
		</br>
		</br>
		</br>

		<br/>
		<div id='div2' name='div2'>
        <form action='tugas.php' method='post' name='form' class='groove'>
            <table width='20%' border='6' align='center' cellpadding='6'>
                <tr>
                    <td class='td' width='15%'> Username </td>
                    <td width='2%'> : </td>
                    <td width='83%'><input name='username' type='text' id='username'></td>
                </tr>
                <tr>
                    <td class='td' width='15%'>Password </td>
                    <td> : </td>
                    <td><input name='password' type='password' id='password'></td>
                </tr>
                <tr>
                    <td> &nbsp; </td>
                    <td> &nbsp; </td>
                    <td> <input name='submit' type='submit' id='submit' value='Kirim'>
                    </td>
                </tr>
            </table>
        </form>

    </body>
</html>