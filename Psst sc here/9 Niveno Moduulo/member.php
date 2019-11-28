<html>
    <head>
        <title> TUGAS MODUL 9 </title>
        <link rel='stylesheet' type='text/css' href='member.css'>
        <style type='text/css'>
            table,th,td
                { border:1px; border-style:none; }
			table1,th1,td1
                { border:1px; border-style:none;;}
        </style>
    </head>
    <body>
	<?php
	session_start();
	$conn=mysqli_connect('localhost', 'root', '' ,'haha');
	?>
	<style type="text/css">
	.bttn a {
    border-bottom: 2px solid #777777;
    border-left: 3px solid #000000;
    border-right: 3px solid #333333;
    border-top: 2px solid #000000;
    color: #000001;
    display: block;
    height: 1.5em;
    padding: 0 1em;
    width: 5em;       
    text-decoration: none;
	}</style>
	<h4>Selamat Datang <?php echo $_SESSION['username'];?> Anda Terdaftar Sebagai <?php echo $_SESSION['status'];?></h4>

		<br/>
		<div id='div1' name='div1''>
		</br>
		</br>
        <p> Welcome <?php echo $_SESSION['username']; ?> </p>
		</div>		</br>
		<div name='div3'>
		 <h4>Data Diri</h4>
        <table border='0' width='15%'>

    <?php
        $cari = "select*from user where username='$_SESSION[username]'";
        $hasil_cari = mysqli_query($conn,$cari);
        while ($data = mysqli_fetch_row($hasil_cari)){
        echo"
			<tr>
                <td align='left' ><b>ID</b></td>
				<td>:</td>
				<td class='td1'>$data[0]</td>
                </tr>
			<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
            <tr>
				<td align='left' width='20%'><b>Username</b></td>
				<td>:</td>
				<td width='40%' class='td1'>$data[1]</td>
            </tr>
			<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
			<tr>
				<td align='left' width='20%'><b>Password</td>
				<td>:</td>
				<td width='40%' class='td1'>$data[2]</td>
			</tr>
			<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
			<tr>
				<td align='left' width='20%'><b>Nama</td>
				<td>:</td>
                <td width='40%' class='td1'>$data[3]</td>
			</tr>
			<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
			<tr>
				<td align='left' width='20%'><b>Status</b></td>
				<td>:</td>
				<td width='40%' class='td1'>$data[4]</td>
			</tr>
			";
        }
    ?>
	</div>
	<div class='bttn'>	<a class='bttn'href='logout.php'>"--logout--"</a> </div>

    </body>
</html>