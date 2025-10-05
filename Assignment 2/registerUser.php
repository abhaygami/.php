<?php
header("Content-type: application/json");
include "connection.php";
session_start();
if ($_POST['captcha'] != $_SESSION['captcha']) {
    echo json_encode(["status" => "error", "message" => "Invalid Captcha"]);
    exit;
}

$name = $_POST['name'];
$password = $_POST['password'];

$sql = "INSERT INTO users (username,password,status) VALUES ('$name','$password','active')";

if (mysqli_query($conn, $sql)) {

    //It will get last inserted user_id
    $res = mysqli_query($conn, "SELECT MAX(user_id) as id FROM users");
    $row = mysqli_fetch_assoc($res);
    $user_id = $row['id'];

    $cart_sql = "INSERT INTO cart (user_id) VALUES ($user_id)";
    if (mysqli_query($conn, $cart_sql)) {

        echo json_encode(["status" => "success", "message" => "User registered"]);
        exit;
        
    } else {
        echo json_encode(["status" => "error", "message" => "User not registered"]);
        exit;
    }

} else {
    echo json_encode([
        "status" => "error",
        "message" => "User registration failed"
    ]);
    exit;
}
?>