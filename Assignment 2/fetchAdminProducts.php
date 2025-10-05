<?php
    header("Content-Type: application/json");
    include "./connection.php";

    $sql = "SELECT product_id, product_name, price, stock, image FROM products";
    $result = mysqli_query($conn, $sql);
    $products = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
    }

    echo json_encode($products);
?>