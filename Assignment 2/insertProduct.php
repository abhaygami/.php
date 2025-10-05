<?php
    header("Content-type: application/json");
    include "./connection.php";

    $target_dir = "uploads/";
    $imagePath = "";

    if (isset($_FILES['uploadImage'])) {
        $imageFileType = strtolower(pathinfo($_FILES['uploadImage']['name'], PATHINFO_EXTENSION));
        $newimagename = "img" . uniqid() . "." . $imageFileType;
        $target_file = $target_dir . $newimagename;

        $check = getimagesize($_FILES['uploadImage']['tmp_name']);
        if ($check === false) {
            echo json_encode(["status" => "error", "message" => "File is not a valid image"]);
            exit;
        }

        $allowed_types = ["jpg", "jpeg", "png"];
        if (!in_array($imageFileType, $allowed_types)) {
            echo json_encode(["status" => "error", "message" => "Only JPG, JPEG and PNG are allowed"]);
            exit;
        }
        if (move_uploaded_file($_FILES['uploadImage']['tmp_name'], $target_file)) {
            $imagePath = $target_file;
        } else {
            echo json_encode(["status" => "error", "message" => "Error in uploading image"]);
            exit;
        }
    } else {
        echo json_encode(["status" => "error", "message" => "No image file uploaded."]);
        exit;
    }

    $productName = $_POST['productName'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // Retrieve category_id from the database based on the category name
    $sql_category = "SELECT category_id FROM categories WHERE category_name = '$category'";
    $result = mysqli_query($conn, $sql_category);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $categoryId = $row['category_id'];

        // Now, insert the product with the fetched category ID
        $sql = "INSERT INTO products (category_id, product_name, price, stock, image) VALUES ($categoryId, '$productName', $price, $stock, '$imagePath')";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(["status" => "success", "message" => "Product Added"]);
            exit;
        } else {
            echo json_encode(["status" => "error", "message" => "Error Occurred"]);
            exit;
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Category not found"]);
        exit;
    }

?>