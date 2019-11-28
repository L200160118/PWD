<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>
<html>
	<head>
	<title>Mengakses Data Session</title>
	</head>
	<body>
	<?php
	$_SESSION['counter']++;
	$_SESSION['nama_pengunjung'] = "Justha";
	echo "Selamat Datang ".$_SESSION['nama_pengunjung']."<br>";
	echo "Anda Telah Mengunjungi Halaman Ini Sebanyak ".$_SESSION['counter']."kali.";
	?>
	</body>
	</html>