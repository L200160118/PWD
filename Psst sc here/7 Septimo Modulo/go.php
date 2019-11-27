<?php
	$conn=mysqli_connect('localhost', 'root', '' ,'modul7');
	ERROR_REPORTING(E_ALL ^ E_NOTICE);
	$nama=$_POST['nama'];
	$hr=$_POST['hr'];
	$bln=$_POST['bln'];
	$thn=$_POST['thn'];
	$tgl=$thn-$bln-$hr;
	$alamat=$_POST['alamat'];
	$kota=$_POST['kota'];
	$kirim=$_POST['kirim'];
	$query=INSERT INTO `member` (`id`, `nama`, `tanggal`, `alamat`, `kota`, `gabung`) VALUES (NULL, '$nama', '$thn-$bln-$hr', '$alamat', '$kota', CURRENT_TIMESTAMP);
	if($kirim){
		mysqli_query($conn, $kirim);
        echo "</br>Data Berhasil dimasukkan";
        }else{
		echo "INSERT INTO `member` (`id`, `nama`, `tanggal`, `alamat`, `kota`, `gabung`) VALUES (NULL, '$nama', '$thn-$bln-$hr', '$alamat', '$kota', CURRENT_TIMESTAMP);";
    ?>
		