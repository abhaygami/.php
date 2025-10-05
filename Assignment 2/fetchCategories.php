<?php
    include "./connection.php";

    $sql = "SELECT category_id, category_name FROM categories";

    $result = mysqli_query($conn,$sql);

    $categories = array();

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
    }

    echo json_encode($categories);
?>