<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
</head>

<?php
    $conn= mysqli_connect('localhost','root','', 'informatika');
?>

<body>
    <center>
        <h3>Masukkan Data Mahasiswa</h3>
        <table border='0' width='30%'>
            <form action="formtugas.php" method = 'POST'>
                <tr>
                    <td width='25%'>NIM</td>
                    <td width='5%'>:</td>
                    <td width='65%'> <input type="text" name='nim' size='10' > </td>
                </tr>

                <tr>
                    <td width='25%'>Nama</td>
                    <td width='5%'>:</td>
                    <td width='65%'> <input type="text" name='nama' size='30'> </td>
                </tr>

                <tr>
                    <td width='25%'>Kelas</td>
                    <td width='5%'>:</td>
                    <td width='65%'> 
                        <input type="radio" name='kelas' value='A' checked> A
                        <input type="radio" name='kelas' value='B'> B
                        <input type="radio" name='kelas' value='C'> C </td>
                </tr>

                <tr>
                    <td width='25%'>Alamat</td>
                    <td width='5%'>:</td>
                    <td width='65%'> <input type="text" name='alamat' size='40'> </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td><input type="submit" value='Masukkan' name='submit'></td>
                </tr>
            </form>
            
            
        </table>
        
    
    <?php
        error_reporting(E_ALL^E_NOTICE);
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $alamat = $_POST['alamat'];
        $submit = $_POST['submit'];
        $input="INSERT INTO mahasiswa(nim,nama,kelas,alamat) VALUES ('$nim','$nama','$kelas','$alamat')";
        if($submit){
            if($nim==''){
                echo "</br> NIM tidak boleh kosong, diisi dulu";
            }elseif($nama==''){
                echo "</br> Nama tidak boleh kosong, diisi dulu";
            }elseif($alamat==''){
                echo "</br> Alamat tidak boleh kosong, diisi dulu";
            }else{
                mysqli_query($conn,$input);
                echo "</br>Data Berhasil Dimasukkan !";
            }
        }
    ?>

    <br>
    <hr>
    <h3>Data Mahasiswa</h3>
    <table border="1">
        <tr>
            <td width="200" align="center"><b>NIM</b></td>
            <td width="200" align="center"><b>Nama</b></td>
            <td width="200" align="center"><b>Kelas</b></td>
            <td width="200" align="center"><b>Alamat</b></td>
            <td width="200" colspan="2" align="center"><b>Aksi</b></td>
        </tr>
        <?php
            $cari = "SELECT * FROM mahasiswa order by NIM";
            $hasil_cari = mysqli_query($conn, $cari);
            // mengambil satu array dari tabel mahasiswa
            // fungsi ini akan mengembalikan nilai false dibaris array terakhir
            while ($data = mysqli_fetch_array($hasil_cari)) {
                echo "<tr>
                            <td>$data[NIM]</td>
                            <td>$data[Nama]</td>
                            <td>$data[Kelas]</td>
                            <td>$data[Alamat]</td>
                            <td><a href='ubah.php?nim=$data[NIM]'>Ubah</a></td>
                            <td><a href='hapus.php?nim=$data[NIM]'>Hapus</a></td>
                     </tr>";
            }
        ?>
    </table>
</body>
</html>