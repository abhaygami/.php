<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contact Details</h1>

    <?php
        session_start();
        $_SESSION['email'] = "";
        $_SESSION['mobile'] = "";
        $_SESSION['address'] = "";
        if(isset($_POST['submit'])) {
            
            $mobileErr = $emailErr = "";
            $status = 1;

            if(empty($_POST['email'])) {
                $emailErr = "Email req!";
                $status = 0;
            } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email Invalid!";
                $status = 0;
            }

            if(empty($_POST['mobile'])) {
                $mobileErr = "Mobile req!";
                $status = 0;
            } else if(!preg_match('/^[6-9]\d{9}$/', $_POST['mobile'])) {
                $emailErr = "Mobile Invalid!";
                $status = 0;
            }

            if($status) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['mobile'] = $_POST['mobile'];
                $_SESSION['address'] = $_POST['address'];
                header("location:displayProfile.php");
            }
        }
    ?>

    <form method="post" action="./displayProfile.php">
        <label for="email">Enter EmailId : </label>
        <input type="email" name="email" />
        <br/><br/>

        <label for="mobile">Enter Mobile No. : </label>
        <input type="number" name="mobile" />
        <br/><br/>

        <label for="address">Enter Address</label>
        <input type="text" name="address" />
        <br/><br/>

        <a href="./page2.php">Prev</a>
        <input type="submit" value="Final submit" />
        

    </form>

    
</body>
</html>