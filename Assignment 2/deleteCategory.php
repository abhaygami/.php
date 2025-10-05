<?php
    header("Content-Type: application/json");
    include "./connection.php";

    if (isset($_POST['category_id'])) {
        $categoryId = $_POST['category_id'];
        $sql = "DELETE FROM categories WHERE category_id = '$categoryId'";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(["status" => "success", "message" => "Category deleted successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error deleting category: " . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Category ID is required"]);
    }
?>