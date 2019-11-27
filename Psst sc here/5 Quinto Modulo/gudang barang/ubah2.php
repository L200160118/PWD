<HTMl>
    <head><title>Edit Barang</title></head>
    <?php
		$conn = mysqli_connect('localhost','root','','118');
		
	    $kode_barang = $_GET['kode_barang'];
        $cari = "SELECT * FROM barang WHERE kode_barang='$kode_barang'";
        $hasil_cari = mysqli_query($conn, $cari);
        $data = mysqli_fetch_array($hasil_cari);

        if($data>0) {
    ?>
    <body>
        <center>
        <h3>Ubah data barang </h3>
        <table border='0' width='30%'>
            <form action="?kode_barang=<?php echo $kode_barang; ?>" method='POST'>
                <tr>
                    <td width='25%'>Kode Barang</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name='kode_barang' size='10'value="<?php echo $data['kode_barang'] ?>"></td>
                </tr>
                <tr>
                    <td width='25%'>Nama Barang</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name='nama_barang' size='30'value="<?php echo $data['nama_barang'] ?>"></td>
                </tr>
                <tr>
                    <td width='25%'>Gudang</td>
                    <td width='5%'>:</td>
                    <td width='65%'><select name="kode_gudang" id=""value="<?php echo $data['gudang'] ?>">
                        <?php
                        $sql = "select * from gudang";
                        $retval = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($retval)){
                            echo "<option value='$row[kode_gudang]'>$row[nama_gudang]</option>";
                        }
                        ?></select>
                    </td>
                </tr>
                </table>
            
            <input type="submit" name="submit" value='ubah'>
            </form>
            <?php
            error_reporting(E_ALL ^ E_NOTICE);
            $kode_barang = $_POST['kode_barang'];
            $nama_barang = $_POST['nama_barang'];
            $kode_gudang = $_POST['kode_gudang'];
            $submit = $_POST['submit'];
            $input = "UPDATE barang SET kode_barang='$kode_barang',nama_barang='$nama_barang', kode_gudang='$kode_gudang' WHERE barang.kode_barang = '$kode_barang'";
            if($submit){
                mysqli_query($conn,$input);
                echo'</br>Data berhasil diubah';
				header("Location:form.php");
				die();
            }
		}
            ?>
           <hr>
           <h3>Data Barang</h3>
            <table border='1' width='50%'>
                <tr>
                    <td align='center' width='20%'><b>Kode Barang</b></td>
                    <td align='center' width='30%'><b>Nama Barang</b></td>
					<td align='center' width='15%'><b>Nama Gudang</b></td>
                    <td align='center' width='15%'><b>Lokasi Gudang</b></td>
					<td width="200" colspan="2" align="center"><b>Aksi</b></td>
                </tr>
                <?php
                $cari = "select * from barang, gudang where barang.kode_gudang = gudang.kode_gudang";
                $hasil_cari = mysqli_query($conn,$cari);
                while($data = mysqli_fetch_row($hasil_cari)){
                    echo"
                    <tr>
                    <td width='20%'>$data[0]</td>
                    <td width='30%'>$data[1]</td>
                    <td width='10%'>$data[4]</td>
					<td width='10%'>$data[5]</td>
					<td><a href='ubah.php?kode_barang=$data[0]'>Ubah</a></td>
                    <td><a href='hapus.php?kode_barang=$data[0]'>Hapus</a></td>
                    </tr>
                    ";
                }
                ?>
            </table>
        
        </center>
    </body>
</HTMl>