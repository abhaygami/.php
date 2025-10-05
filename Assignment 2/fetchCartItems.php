<?php
    session_start();
    header("Content-Type: application/json");

    include "./connection.php";

    $cartProducts = array();

    if (isset($_SESSION['user_id'])) {
        // First, get the cart_id for the logged-in user
        $cartArr = mysqli_fetch_assoc(mysqli_query($conn,"SELECT cart_id FROM cart WHERE user_id = {$_SESSION['user_id']}"));
        
        if($cartArr) {
            $cart_id = $cartArr['cart_id'];

            // Now, fetch the cart items using the retrieved cart_id
            $sql = "SELECT 
                p.product_name   AS ProductName,
                p.product_id     AS product_id,
                c.category_name  AS CategoryName,
                p.price          AS Price,
                ci.quantity      AS Quantity,
                p.image          AS ProductImage
            FROM cart_items ci
            JOIN products p 
                ON ci.product_id = p.product_id
            JOIN categories c 
                ON p.category_id = c.category_id  /* CORRECTED LINE */
            WHERE ci.cart_id = {$cart_id}
            ";
            
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)) {
                while($row = mysqli_fetch_assoc($result)) {
                    $cartProducts[] = $row;
                }
            }
        }
    }
    echo json_encode($cartProducts);
?>