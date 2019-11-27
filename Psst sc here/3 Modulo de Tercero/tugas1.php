<html>
    <head>
        <title> program penjumlahan </title>
    </head>
    <body>
    <form method='POST' action='tugas1.php'>
        <p> Nilai A adalah : <input type='text' name='A' size='20'> </p>
        <p> Nilai B adalah : <input type='text' name='B' size='30'> </p>
        <P> <input type="submit" value='jumlahkan' name='submit'> </p>
    </form>
    <?php
        error_reporting(E_ALL ^ E_NOTICE);
        $A = $_POST['A'];
        $B = $_POST['B'];
        $C = $A +$B;
        $submit = $_POST['submit'];
        
        if($submit){
            echo "<br> Nilai A adalah $A";
            echo "<br> Nilai B adalah $B";
            echo "<br> Jadi Nilai A ditambah Nilai B adalah $C";
        }
    ?>
    </body>
</html>