<?php
    header("Content-Type: application/json");
    include "./connection.php";

    if (isset($_POST['product_id'])) {
        $productId = $_POST['product_id'];
        $sql = "DELETE FROM products WHERE product_id = '$productId'";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(["status" => "success", "message" => "Product deleted successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error deleting product: " . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Product ID is required"]);
    }
?>