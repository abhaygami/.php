<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Academic Details</h1>

    <?php
        session_start();
        $_SESSION['course'] = "";
        $_SESSION['sem'] = "";
        $_SESSION['per'] = "";
        if(isset($_POST['submit'])) {
            $semErr = $perError = "";
            $status = 1;

            if(empty($_POST['sem'])) {
                $semErr = "Sem Required!";
                $status = 0;
            } else if ($_POST['sem'] <= 0 || $_POST['sem'] > 10) {
                $semErr = "Enter valid sem!";
                $status = 0;
            }

            if(empty($_POST['per'])) {
                $perError = "Per Required!";
                $status = 0;
            } else if ($_POST['per'] <= 0 || $_POST['per'] > 100) {
                $perError = "Enter valid Per!";
                $status = 0;
            }

            if($status) {
                $_SESSION['course'] = $_POST['courses'];
                $_SESSION['sem'] = $_POST['sem'];
                $_SESSION['per'] = $_POST['per'];
                header("location:page3.php");
            }            
        }
    ?>

    <form method="post">
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
        <span id="semError" name="semError" style="color: red;"><?php echo $semErr ?></span>
        <br/><br/>

        <label for="per">Enter Percentage</label>
        <input type="text" name="per" />
        <span id="perError" name="perError" style="color: red;"><?php echo $perError ?></span>
        <br/><br/>

        <button><a href="./page1.php">Prev</a></button>

        <input type="submit" name="submit" value="Fill" />
        
        <a href="./page3.php">Next</a>

    </form>
</body>
</html>