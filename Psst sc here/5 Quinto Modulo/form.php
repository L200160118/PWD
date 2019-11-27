<<html>
<head><title>Data Mahasiswa</title></head>
<?php
$conn = mysqli_connect('localhost','root','','informatika');
?>
<body>
<center>
<h1>Masukkan Data Mahasiswa:</h1>
<table border='0' width='30%'>
<form method='POST' action='form.php'>
<tr>
<td width='25%'>NIM</td>
<td width='5%'>:</td>
<td width='65%'><input type='text' name='nim' size='10'></td></tr>
<td width='25%'>Nama</td>
<td width='5%'>:</td>
<td width='65%'><input type='text' name='nama' size='30'></td></tr>
<td width='25%'>Kelas</td>
<td width='5%'>:</td>
<td width='65%'><input type='radio' value='A' checked name='kelas'> A
<input type='radio' value='B' name='kelas'> B
<input type='radio' value='C' name='kelas'> C
</td></tr>
<td width='25%'>Alamat</td>
<td width='5%'>:</td>
<td width='65%'><input type='text' name='alamat' size='40'></td></tr>
</table>
<input type='submit' value='Masukkan' name='submit'>
</form>
<?php
error_reporting(E_ALL ^ E_NOTICE);
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
$submit = $_POST['submit'];
$input="insert into mahasiswa (nim,nama,kelas,alamat) values ('$nim','$nama','$kelas','$alamat')";
if($submit){
    if($nim==''){
        echo "</br>NIM tidak boleh kosong, diisi dulu";
    }elseif($nama==''){
        echo "</br>Nama tidak boleh kosong, diisi dulu";
    }elseif($alamat==''){
        echo "</br>alamat tidak boleh kosong, diisi dulu";
    }else{
        mysqli_query($conn,$input);
        echo'</br>data berhasil dimasukkan';
    }
}
?>
<hr>
<h3>data mahasiswa</h3>
<table border='1' width='50%'>
<tr>
<td align='center' width='20%'><b>NIM</td>
<td align='center' width='30%'><b>Nama</td>
<td align='center' width='10%'><b>Kelas</td>
<td align='center' width='30%'><b>Alamat</td>
</tr>
<?php
$cari="select * from mahasiswa order by nim";
$hasil_cari=mysqli_query($conn,$cari);
while($data=mysqli_fetch_row($hasil_cari)){
    echo"
<tr>
<td width='20%'>$data[0]</td>
<td width='30%'>$data[1]</td>
<td width='10%'>$data[2]</td>
<td width='30%'>$data[3]</td>
</tr>";
} 
?>
</table></center></body></html>