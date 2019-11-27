<html>
    <head>
        <title> program bilangan angka </title>
    </head>
    <body>
    <form method='POST' action='tugas2.php'>
        <p> Masukkan angka : <input type='text' name='angka' size='20'> </p>
        <P> <input type="submit" value='proses' name='submit'> </p>
    </form>
    <?php
            error_reporting(E_ALL ^ E_NOTICE);
            $angka = $_POST['angka'];
            $submit = $_POST['submit'];
            if($submit){
                if($angka % 2){
                    $huruf='"Ganjil"';
                }else{
                    $huruf=' "Genap" ';
                }
                echo "Angka yang anda masukkan  $angka <br>";
                echo "Maka angka adalah $huruf <br>";
            }
    ?>
    </body>
</html>

            