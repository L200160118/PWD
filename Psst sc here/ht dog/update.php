<?php
	$conn= mysqli_connect('localhost', 'root', '','buku');
	
	$kode_buku=$_POST['kode_buku'];
	$nama_buku=$_POST['nama_buku'];
	$jenis_buku=$_POST['jenis_buku'];
	$submit=$_POST['submit'];
	$update="UPDATE buku set kode_buku ='$kode_buku', nama_buku ='$nama_buku',jenis_buku='$jenis_buku' WHERE kode_buku ='$kode_buku' ";
	
	if($submit){
		mysqli_query($conn,$update);
		echo "
		<script>
		alert('data berhasil di update');
		document.location.href='form.php';
		</script>";
		}	
?>