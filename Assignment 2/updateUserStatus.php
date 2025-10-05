<?php
    header("Content-Type: application/json");
    include "./connection.php";

    if (isset($_POST['user_id']) && isset($_POST['new_status'])) {
        $userId = $_POST['user_id'];
        $newStatus = $_POST['new_status'];

        // Escape the new status to prevent SQL injection
        $newStatus = mysqli_real_escape_string($conn, $newStatus);
        
        $sql = "UPDATE users SET status = '$newStatus' WHERE user_id = '$userId'";
        
        if (mysqli_query($conn, $sql)) {
            echo json_encode(["status" => "success", "message" => "User status updated successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error updating status: " . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid request"]);
    }
?>