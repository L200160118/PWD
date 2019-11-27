<html>
    <head> 
        <title> variable </title>
    </head>
    <body>
        <h1> nilai </h1>
        <form method='POST' action='kendali.php'>
        <p> Masukkan nilai angka (1-100) : <input type='text' name='nilai' size='3'></p>
        <p> <input type='submit' value='Proses' name='submit'> </p> 
        </form>
        <?php
            error_reporting(E_ALL ^ E_NOTICE);
            $nilai = $_POST['nilai'];
            $submit = $_POST['submit'];
            if($submit){
                if($nilai==''){
                    $huruf='"Nilai kosong/belum diisi"';}
                elseif($nilai <=20){
                    $huruf='E';
                }elseif($nilai <=40){
                    $huruf='D';
                }elseif($nilai <=60){
                    $huruf='C';
                }elseif($nilai <=80){
                    $huruf='B';
                }elseif($nilai <=100){
                    $huruf='E';
                }else{
                    $huruf=' "Nilai yang dimasukkan salah!!!" ';
                }
                echo "Nilai angka adalah $nilai<br>";
                echo "Maka nilai huruf adalah $huruf";
                }
                ?>
    </body>
</html>