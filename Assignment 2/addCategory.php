<?php
    header("Content-Type: application/json");
    include "./connection.php";

    if (isset($_POST['category_name']) && !empty($_POST['category_name'])) {
        $categoryName = $_POST['category_name'];
        $sql = "INSERT INTO categories (category_name) VALUES ('$categoryName')";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(["status" => "success", "message" => "Category added successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error adding category: " . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Category name is required"]);
    }
?>