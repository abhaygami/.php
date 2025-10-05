<?php
    header("Content-Type: application/json");

    include "./connection.php";

    $category = isset($_GET['category']) ? $_GET['category'] : "";
    $sql = "";
    if($category == "") {
        $sql = "SELECT product_id, category_id, product_name, price, stock, image FROM products";
    } else {
        $sql = "SELECT product_id, category_id, product_name, price, stock, image FROM products WHERE category_id IN (
            SELECT category_id
            FROM categories
            WHERE category_name = '$category'
        )";
    }

    $result = mysqli_query($conn,$sql);
    $products = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
    }

    echo json_encode($products);
?>
