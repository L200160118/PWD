<html>
    <head>
        <title> TUGAS MODUL 9 </title>
        <link rel='stylesheet' type='text/css' href='admin.css'>
        <style type='text/css'>
            table,th,td
                { border:1px; border-style:groove; }
			table1,th1,td1
                { border:2px; border-style:double;;}
        </style>
    </head>
    <body>
	<?php
	session_start();
	echo "Selamat Datang ".$_SESSION['username']." Anda Terdaftar Sebagai ".$_SESSION['status'];
	$conn=mysqli_connect('localhost', 'root', '' ,'haha');
	?>
	<style type="text/css">
	.bttn a {
    border-bottom: 2px solid #777777;
    border-left: 2px solid #000000;
    border-right: 2px solid #333333;
    border-top: 2px solid #000000;
    color: #000019;
    display: block;
    height: 2.5em;
    padding: 0 1em;
    width: 5em;       
    text-decoration: none;
	}</style>
	<a class='bttn'href='logout.php'>"--logout--"</a>
		<br/>
		<div id='div1' name='div1''>
		</br>
		</br>
        <p> Welcome <?php echo $_SESSION['username']; ?> </p>
		</div>
		<br/>
		</br>
		</br>
		</br>

		<br/>

		<div nme='div3'>
		 <h3>Members</h3>
        <table border='1' width='50%'>
            <tr>
                <td align='center' width='10%'><b>ID</b></td>
                <td align='center' width='30%'><b>Username</b></td>
				<td align='center' width='30%'><b>Password</td>
                <td align='center' width='40%'><b>Nama</td>
                <td align='center' width='30%'><b>Status</b></td>
                <td colspan= 2 align='center' width='30%'><b>Keterangan</b></td>
            </tr>
    <?php
        $cari = "select*from user;";
        $hasil_cari = mysqli_query($conn,$cari);
        while ($data = mysqli_fetch_row($hasil_cari)){
        echo"
            <tr>
				<td width='10%' class='td1'>$data[0]</td>
                <td width='30%' class='td1'>$data[1]</td>
                <td width='30%' class='td1'>$data[2]</td>
                <td width='40%'>$data[3]</td>
                <td width='30%'>$data[4]</td>
                <td><a href='update_form.php?kode_buku=$data[0]'>ubah</a></td>
                <td><a href='delete.php?kode_buku=$data[0]'>Hapus</a></td>
            </tr>";
        }
    ?>
	</div>

    </body>
</html>