<?php
    header("Content-type: application/json");
    include "connection.php";
    session_start();
    if($_POST['captcha'] != $_SESSION['captcha']) {
        echo json_encode(["status" => "error", "message" => "Invalid Captcha"]);
        exit;
    }

    $name = $_POST['name'];
    $password = $_POST['password'];

    $sql = "INSERT INTO admins (admin_name,password) VALUES ('$name','$password')";

    if(mysqli_query($conn,$sql)) {
        echo json_encode(["status" => "success", "message" => "Admin registered"]);
        exit;
    } else {
        echo json_encode(["status" => "error", "message" => "Admin not registered"]);
        exit;
    }
?>