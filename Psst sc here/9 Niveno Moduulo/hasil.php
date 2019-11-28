<?php
session_start();
echo "Selamat Datang ".$_SESSION['username']." Anda Terdaftar Sebagai ".$_SESSION['status'];
?>
<br>
Silahkan Logout dengan klik Link<a href='logout.php'> Disini</a>