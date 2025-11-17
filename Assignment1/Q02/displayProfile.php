<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <?php
        session_start();
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['mobile'] = $_POST['mobile'];
        $_SESSION['address'] = $_POST['address'];




        echo "<table border="."2"." >
        <tr>
            <th>RollNo</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Course</th>
            <th>Sem</th>
            <th>Per</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Address</th>
        </tr>

        <tr>
            <td>{$_SESSION['rollno']}</td>
            <td>{$_SESSION['name']}</td>
            <td>{$_SESSION['dob']}</td>
            <td>{$_SESSION['course']}</td>
            <td>{$_SESSION['sem']}</td>
            <td>{$_SESSION['per']}</td>
            <td>{$_SESSION['mobile']}</td>
            <td>{$_SESSION['email']}</td>
            <td>{$_SESSION['address']}</td>
        </tr>
    </table>";

    ?>


    <form action="./login.php" method="post">
        <center>
            <input type="submit" value="Login"/>
        </center>
    </form>

</body>
</html>