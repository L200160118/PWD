<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah-Data Mahasiswa</title>
</head>
    <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'informatika');

        $nim = $_GET['nim'];
        $cari = "SELECT * FROM mahasiswa WHERE NIM='$nim'";
        $hasil_cari = mysqli_query($conn, $cari);
        $data = mysqli_fetch_array($hasil_cari);

        function active_radio_button($value, $input) {
            // apabila value dari radio = yang diinput
            $result = $value == $input?'checked':'';
            return $result;
        }

        if($data>0) {
    ?>
        

<body>
    <center>
        <h3>Ubah Data Mahasiswa</h3>
        <table border='0' width='30%'>
            <form action="?nim=<?php echo $nim; ?>" method = 'POST'>
                <tr>
                    <td width='25%'>NIM</td>
                    <td width='5%'>:</td>
                    <td width='65%'> <input type="text" name='nim' size='10' value="<?php echo $data['NIM'] ?>"> </td>
                </tr>

                <tr>
                    <td width='25%'>Nama</td>
                    <td width='5%'>:</td>
                    <td width='65%'> <input type="text" name='nama' size='30' value="<?php echo $data['Nama'] ?>"> </td>
                </tr>

                <tr>
                    <td width='25%'>Kelas</td>
                    <td width='5%'>:</td>
                    <td width='65%'> 
                        <input type="radio" name='kelas' value='A' <?php echo active_radio_button("A",  $data['Kelas'])?>> A
                        <input type="radio" name='kelas' value='B' <?php echo active_radio_button("B",  $data['Kelas'])?>> B
                        <input type="radio" name='kelas' value='C' <?php echo active_radio_button("C",  $data['Kelas'])?>> C </td>
                </tr>

                <tr>
                    <td width='25%'>Alamat</td>
                    <td width='5%'>:</td>
                    <td width='65%'> <input type="text" name='alamat' size='40' value="<?php echo $data['Alamat'] ?>"> </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td><input type="submit" value='Ubah Data' name='submit'></td>
                </tr>
            </form>
            
            
        </table>
        
    <!-- </center> -->
    <?php
        error_reporting(E_ALL^E_NOTICE);
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $alamat = $_POST['alamat'];
        $submit = $_POST['submit'];
        $input="UPDATE `mahasiswa` SET `Nama`='$nama',`Kelas`='$kelas',`Alamat`='$alamat' WHERE NIM='$nim'";
        if($submit){
            if($nim==''){
                echo "</br> NIM tidak boleh kosong, diisi dulu";
            }elseif($nama==''){
                echo "</br> Nama tidak boleh kosong, diisi dulu";
            }elseif($alamat==''){
                echo "</br> Alamat tidak boleh kosong, diisi dulu";
            }else{
                mysqli_query($conn,$input);
                echo "
                    <script>
                        alert('Data Berhasil Diubah!');
                        document.location.href='formtugas.php';
                    </script>";
            }
        }
        }
    ?>

    <center>
        <br>
        <hr>
        <h3>Data Mahasiswa</h3>
        <table border="1">
            <tr>
                <td width="200" align="center"><b>NIM</b></td>
                <td width="200" align="center"><b>Nama</b></td>
                <td width="200" align="center"><b>Kelas</b></td>
                <td width="200" align="center"><b>Alamat</b></td>
                <td width="200" colspan="2" align="center"><b>Keterangan</b></td>
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
                                <td><a href='delete.php?nim=$data[NIM]'>Hapus</a></td>
                        </tr>";
                }

            ?>
        </table>
    </center>
</body>
</html>