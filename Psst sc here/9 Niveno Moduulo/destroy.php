<?php
session_start();
$id_session = session_id();
echo "Session ID Anda Adalah ".$id_session;
echo "<br><br>";
session_destroy();
$id_session2 = session_id();
echo "Session Id Anda Setelah Data Session di-Destroy :".$id_session2;
?>
