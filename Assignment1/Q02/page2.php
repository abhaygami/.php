<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Academic Details</h1>

    <form method="post" action="./page3.php">
        <label for="courses">Select Course : </label>
        <select name="courses">
            <option value="BScIT">BScIT</option>
            <option value="BCA">BCA</option>
            <option value="BBA">BBA</option>
            <option value="BScCS">BScCS</option>
            <option value="CA">CA</option>
        </select>
        <br/><br/>

        <label for="sem">Enter Semaster</label>
        <input type="number" name="sem" />
        <br/><br/>

        <label for="per">Enter Percentage</label>
        <input type="text" name="per" />
        <br/><br/>

        <a href="./page1.php">Prev</a>

        <input type="submit" name="submit" value="Fill" />
        
        <a href="./page3.php">Next</a>

    </form>

    <?php

        if(isset($_POST['submit'])) {
            session_start();

            $_SESSION['rollno'] = $_POST['rollno'];
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['dob'] = $_POST['dob'];
        } else {
            session_start();

            $_SESSION['rollno'] = "";
            $_SESSION['name'] = "";
            $_SESSION['dob'] = "";
        }
    ?>
</body>
</html>