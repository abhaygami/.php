<?php
    $conn = mysqli_connect("localhost:3306","root","","movie");
    if(!$conn) {
        echo "Connection Failed!";
    }
?>