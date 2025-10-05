<?php
    header("Content-Type: application/json");
    include "./connection.php";

    $product_id = $_POST['product_id'];

    session_start();
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["status" => "error", "message" => "Login is must"]);
        exit;
    } else {

        $cartArr = mysqli_fetch_assoc(mysqli_query($conn,"SELECT cart_id FROM cart WHERE user_id = {$_SESSION['user_id']}"));
        $cart_id = $cartArr['cart_id'];

        $query_qty = "SELECT quantity FROM cart_items WHERE product_id = $product_id";
        $qtyArr = mysqli_fetch_assoc(mysqli_query($conn, $query_qty));

        if ($qtyArr) {
            $sql = "UPDATE cart_items SET quantity = quantity + 1 WHERE product_id = $product_id";
        } else {
            $sql = "INSERT INTO cart_items (cart_id, product_id, quantity) VALUES ($cart_id, $product_id, 1)";
        }

        if(mysqli_query($conn,$sql)) {
            echo json_encode(["status" => "success", "message" => "Item added to cart"]);
            exit;
        } else {
            echo json_encode(["status" => "error", "message" => "Error Occured"]);
            exit;
        }
    }
?>