<?php
require "../conf/database.php";

if (!isset($_GET['username']) || !isset($_GET['password'])) {
    header('Content-Type: application/json');
    echo json_encode(array("success" => false, "message" => "Parameter salah"));
    exit;
}

$username = $_GET['username'];
$password = $_GET['password'];

$sql = "SELECT username, name, role, password FROM user WHERE username='$username' AND active=1";
$result = mysqli_query($db, $sql);
$count = mysqli_fetch_array(mysqli_query($db, $sql));

if ($count) {
    if (password_verify($password, $count['password'])) {
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        header('Content-Type: application/json');
        echo json_encode(array("success" => true, "data" => $data));
    } else {
        header('Content-Type: application/json');
        echo json_encode(array("success" => false, "message" => "Password salah"));
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(array("success" => false, "message" => "Username salah"));
}
