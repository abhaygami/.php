<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="adminName">Enter Admin Name: </label>
        <input type="text" name="adminName" />
        <br><br>

        <label for="password">Enter password: </label>
        <input type="text" name="password" />
        <br><br>

        <input type="text" name="captcha" placeholder="Enter Below Captcha">
        <img src="./captcha.php" alt="Captcha Image" /><br/><br>

        <input type="submit" value="Submit" name="submit" />
    </form>

    <?php
        if(isset($_POST['submit'])) {
            session_start();
            include "./connection.php";
            if($_POST['captcha'] != $_SESSION['captcha']) {
                echo "Invalid Captcha";
            } else {
                $sql = "SELECT * FROM admins WHERE adminName = '{$_POST['adminName']}' AND password = '{$_POST['password']}'";

                $res = mysqli_query($conn,$sql);
                if(mysqli_num_rows($res) == 0) {
                    echo "Invalid adminName or Password!!";
                } else {
                    $_SESSION['adminName'] = $_POST['adminName'];
                    header("location: adminDashboard.php");
                    exit;
                }
            }
        }
    ?>
</body>
</html>