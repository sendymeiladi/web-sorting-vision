<?php
// Get all device and Add new device

require "../conf/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (credential($db) > 0) {
        if (!isset($_POST['serialNumber']) || !isset($_POST['location'])) {
            header('Content-Type: application/json');
            echo json_encode(array("success" => false, "message" => "Parameter nomor seri atau lokasi salah"));
            exit;
        }
        addDevice($db, $_POST['serialNumber'], $_POST['location']);
    } else {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Credentials tidak valid']);
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Check is user valid
    if (credential($db) > 0) {
        getAllDevice($db);
    } else {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Credentials tidak valid']);
        exit;
    }
}

function getAllDevice($db){
    $sql = "SELECT * FROM device";
    $result = mysqli_query($db, $sql);

    if ($result) {
        $data = array();
        $totalResult = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
            $totalResult++;
        }
        header('Content-Type: application/json');
        echo json_encode(array("success" => true, "totalResult" => $totalResult, "data" => $data));
    } else {
        header('Content-Type: application/json');
        echo json_encode(array("success" => false, "totalResult" => "0", "data" => "Data tidak ada"));
    }
}

function addDevice($db, $serialNumber, $location){
    $sql = "INSERT INTO device (serial_number, location, filled) VALUES ('$serialNumber', '$location', '1')";
    $result = mysqli_query($db, $sql);

    if ($result) {
        header('Content-Type: application/json');
        echo json_encode(array("success" => true));
    } else {
        header('Content-Type: application/json');
        echo json_encode(array("success" => false));
    }
}


function credential($db){
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET['username']) || !isset($_GET['password'])) {
            http_response_code(400);
            header('Content-Type: application/json');
            echo json_encode(['message' => 'Username dan password harus diisi']);
            exit;
        }

        $username = $_GET['username'];
        $password = $_GET['password'];
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            http_response_code(400);
            header('Content-Type: application/json');
            echo json_encode(['message' => 'Username dan password harus diisi']);
            exit;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    $sql_user = "SELECT username, name, role, password FROM user WHERE username='$username' AND active=1";
    $result_user = mysqli_query($db, $sql_user);

    // Check is username exist and password true
    $count = mysqli_fetch_array(mysqli_query($db, $sql_user));
    if ($count) {
        if (password_verify($password, $count['password'])) {
            $data = array();
            while ($row = mysqli_fetch_assoc($result_user)) {
                $data[] = $row;
            }
            return mysqli_num_rows($result_user);
            exit;
        } else {
            header('Content-Type: application/json');
            echo json_encode(array("success" => false, "message" => "Password salah"));
            exit;
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(array("success" => false, "message" => "Username salah"));
        exit;
    }
}
