<?php
    $conn = mysqli_connect("localhost:3306","root","","assignment2");
    if(!$conn) {
        echo $conn->error;
    }
?>