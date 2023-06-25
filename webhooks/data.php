<?php
require "../conf/database.php";


// if(!$db) {
//     die("koneksi_gagal :".mysqli_connect_error());
// } else {
//     echo "Koneksoi DB berhasil";
// }

$webHookRespone = json_decode(file_get_contents('php://input'), true);
$topic = $webHookRespone["topic"];
$payload = $webHookRespone["payload"];
$key_wh = $webHookRespone["key_wh"];
$number = intval($payload);

if ($key_wh == "SV_webhooks") {
     $sql = "UPDATE items SET amount = $number WHERE topic = '$topic'";
    mysqli_query($db, $sql);
} else {
    echo "Akses ditolak";
}


?>