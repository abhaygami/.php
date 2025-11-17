<?php
    if(isset($_POST['submit'])) {
        include "./connection.php";
        $rating = $_POST['rating'];

        $sql = "DELETE FROM movie WHERE Rating = '$rating'";

        if(mysqli_query($conn, $sql)) {
            echo "Record(s) having rating $rating deleted successfully!";
            header("location: adminDashboard.php");
        } else {
            echo "Error deleting record!";
        }
    }
?>