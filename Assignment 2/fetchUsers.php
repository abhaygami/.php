<?php
    header("Content-Type: application/json");
    include "./connection.php";

    $sql = "SELECT user_id, username, status FROM users";
    $result = mysqli_query($conn, $sql);
    $users = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }

    echo json_encode($users);
?>