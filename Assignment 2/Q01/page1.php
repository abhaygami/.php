<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Basic Detials For student</h1>

    <?php
        session_start();
        $_SESSION['rollno'] = "";
        $_SESSION['name'] = "";
        $_SESSION['dob'] = "";
        if(isset($_POST['submit'])) {

            $nameErr = $rollnoErr = "";
            $status = 1;

            if(empty($_POST['rollno'])) {
                $rollnoErr = "Rollno Required!!";
                $status = 0;
            } else if(!is_numeric($_POST['rollno'])) {
                $rollnoErr = "Rollno should be numeric!!";
                $status = 0;
            }

            if(empty($_POST['name'])) {
                $nameErr = "Name Required!!";
                $status = 0;
            }

            if($status) {
                $_SESSION['rollno'] = $_POST['rollno'];
                $_SESSION['name'] = $_POST['name'];
                $_SESSION['dob'] = $_POST['dob'];
                header("location:page2.php");
            }
        }
    
    ?>

    <form method="post">

        <label for="rollno">Enter Roll No : </label>
        <input type="number" name="rollno" name="rollno" />
        <span id="rollnoErr" name="rollnoErr" style="color: red;"><?php echo $rollnoErr ?></span>
        <br/><br/>

        <label for="name">Enter Name : </label>
        <input type="text" name="name" />
        <span id="nameErr" name="nameErr" style="color: red;"><?php echo $nameErr ?></span>
        <br/><br/>

        <label for="dob">Enter date of birth : </label>
        <input type="date" name="dob" required/>
        <br/><br/>

        <input type="submit" name="submit" value="Fill">
        
        <button><a href="./page2.php">next</a></button>

    </form>
    
</body>
</html>