<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="rollno">Enter RollNo : </label>
        <input type="number" name="rollno" value="<?php echo isset($_COOKIE['Rollno']) ? $_COOKIE['Rollno'] : ''; ?>" />
        <br/><br/>

        <label for="name">Enter Name : </label>
        <input type="text" name="name" value="<?php echo isset($_COOKIE['Name']) ? $_COOKIE['Name'] : ''; ?>" />
        <br/><br/>

        <input type="checkbox" name="remember"> Remember me
        <br/><br/>

        <input type="submit" name="submit" value="Login">
    </form>

    <?php
        if(isset($_POST['submit'])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                session_start();

                if ($_SESSION['rollno'] == $_POST['rollno'] && $_SESSION['name'] == $_POST['name']) {
                    $name = $_POST['name'];
                    $rollno = $_POST['rollno'];
                    if (isset($_POST['remember'])) {
                        setcookie("Name", $name, time() + 86400);  
                        setcookie("Rollno", $rollno, time() + 86400);  
                    }

                    header("Location: dashborad.php");
                    exit();
                } else {
                    echo "<br>Invalid rollno or Name!";
                }
            }
        }
    ?>

</body>
</html>
