<?php
    header("Content-Type: application/json");
    include "./connection.php";
    session_start();

    if(isset($_POST['product_id']) && isset($_SESSION['user_id'])) {
        $product_id = $_POST['product_id'];

        $cartArr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT cart_id FROM cart WHERE user_id = {$_SESSION['user_id']}"));
        if ($cartArr) {
            $cart_id = $cartArr['cart_id'];
            $sql = "DELETE FROM cart_items WHERE product_id = {$product_id} AND cart_id = {$cart_id}";
            if(mysqli_query($conn, $sql)) {
                echo json_encode(["status" => "success", "message" => "Item Removed"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error removing item: " . mysqli_error($conn)]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Cart not found for user"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid request or user not logged in"]);
    }
?>