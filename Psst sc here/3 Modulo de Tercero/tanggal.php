<html>
<head>
<title> Fungsi tanggal dan waktu </title>
</head>
<body>
<?php
    date_default_timezone_set('Asia/Jakarta');
    $jam = date ("H:i:s A");
    $waktu = date ("d-m-Y");
    $hari = date ("l");
    $tanggal = date("d");
    $bulan = date ("F");
    $tahun = date ("Y");
    echo "sekarang jam $jam<br>";
    echo "sekarang tanggal $waktu<br>";
    echo "lebih detailnya hari $hari tanggal $tanggal bulan $bulan tahun $tahun";
?>
</body>
</html> 