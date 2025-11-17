<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Contact Details</h1>

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

    <?php
        if(isset($_POST['submit'])) {
            session_start();
            $_SESSION['course'] = $_POST['courses'];
            $_SESSION['sem'] = $_POST['sem'];
            $_SESSION['per'] = $_POST['per'];
        } else {
            session_start();
            $_SESSION['course'] = "";
            $_SESSION['sem'] = "";
            $_SESSION['per'] = "";
        }
        
    ?>
</body>
</html>