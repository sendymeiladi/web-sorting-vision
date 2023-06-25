<?php
    $db = mysqli_connect('localhost','root','','smart_sorting');

    if(!$db){
        die("ERROR: Gagal Terhubung :". mysqli_connect_error());
    }
?>