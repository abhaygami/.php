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
        $nameErr = $rollnoErr = $semErr = $divErr = $genderErr = $captchaErr = "";

        if(isset($_POST['submit'])) {
            if(empty($_POST['name'])) {
                $nameErr = "* Name Req!";
            } else if(!preg_match("/^[a-zA-Z ]+$/",$_POST['name'])) {
                $nameErr = "* Invalid Name!";
            }

            if(empty($_POST['rollno'])) {
                $rollnoErr = "* Rollno Req!";
            } else if(!is_numeric($_POST['rollno'])) {
                $rollnoErr = "* Rollno should be numeric!";
            } else if($_POST['rollno'] < 1) {
                $rollnoErr = "* Invalid Rollno!";
            }

            if(empty($_POST['sem'])) {
                $semErr = "* Sem Req!";
            } else if(!is_numeric($_POST['sem'])) {
                $semErr = "* Rollno should be numeric!";
            } else if($_POST['sem'] < 1 || $_POST['sem'] > 10) {
                $semErr = "* Invalid Sem!";
            }

            if($_POST['div'] == "") {
                $divErr = "* Select Div";
            }

            if(!isset($_POST['gender'])) {
                $genderErr = "* Select Gender";
            }

            if(empty($_POST['captcha'])) {
                $captchaErr = "* CAPTCHA Req!";
            } else if ($_POST['captcha'] !== $_SESSION['captcha']) {
                $captchaErr = "* Invalid CAPTCHA!";
            }
        }
    ?>
    <form action="" method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" />
        <span style="color: red"><?php echo $nameErr; ?></span><br/><br/>

        <label for="rollno">Rollno: </label>
        <input type="text" name="rollno" />
        <span style="color: red"><?php echo $rollnoErr; ?></span><br/><br/>

        <label for="sem">Sem: </label>
        <input type="text" name="sem" />
        <span style="color: red"><?php echo $semErr; ?></span><br/><br/>

        <label for="div">Select Div: </label>
        <select name="div">
            <option value="">Select Div</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>
        <span style="color: red"><?php echo $divErr; ?></span><br/><br/>

        <label for="gender">Gender: </label>
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="female">Female
        <span style="color: red"><?php echo $genderErr; ?></span><br/><br/>

        <label for="captcha">Enter CAPTCHA Shown in image: </label>
        <input type="text" name="captcha" />
        <img src="captcha.php" alt="Captcha Image" />
        <span style="color: red"><?php echo $captchaErr; ?></span><br/><br/>

        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>