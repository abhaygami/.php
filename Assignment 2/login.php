<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #2193b0, #6dd5ed);
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    h1 {
        color: #fff;
        margin-bottom: 20px;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }

    form {
        background: #fff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.2);
        width: 600px;  /* ⬅ wider form */
        animation: fadeIn 0.6s ease-in-out;
    }

    label {
        font-weight: bold;
        color: #333;
        display: block;
        margin-bottom: 6px;
    }

    input[type="text"],
    input[type="password"],
    select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 15px;
        transition: all 0.3s ease;
        margin-bottom: 14px;
    }

    input[type="text"]:focus,
    input[type="password"]:focus,
    select:focus {
        border-color: #0d47a1; /* darker blue border */
        box-shadow: 0 0 6px rgba(13,71,161,0.4);
        outline: none;
        transform: scale(1.02);
    }

    input[type="submit"],
    input[type="button"] {
        background: #0d47a1; /* ⬅ darker blue button */
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
        margin-top: 12px;
        transition: all 0.3s ease;
    }

    input[type="submit"]:hover,
    input[type="button"]:hover {
        background: #08306b; /* ⬅ even darker on hover */
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    a {
        color: #0d47a1;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #08306b;
        text-decoration: underline;
    }

    span {
        font-size: 12px;
        color: red;
    }

    img#captcha_img {
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-15px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

</head>
<body>
    <center><h1>Login</h2></center>
    <?php 
        include "connection.php";
        session_start();
        $nameErr = $passErr = "";
        $status = 1;
        if(isset($_POST['submit'])) {
            if(empty($_POST['name'])) {
                $nameErr = "Required";
                $status = 0;
            }
            if(empty($_POST['password'])) {
                $passErr = "Required";
                $status = 0;
            }

            if($status) {
                $name = trim($_POST['name']);
                $password = trim($_POST['password']);

                $sqlAdmin = "SELECT * FROM admins WHERE admin_name = '$name'";
                $resultAdmin = $conn->query($sqlAdmin);

                if($resultAdmin->num_rows > 0) {
                    $row = $resultAdmin->fetch_assoc();

                    if($password === $row['password']) {
                        $_SESSION['name'] = $row['admin_name'];
                        $_SESSION['admin_id'] = $row['admin_id'];
                        header("location:adminDashboard.php");
                        exit();
                    }
                }

                $sqlUser = "SELECT * FROM users WHERE username = '$name'";
                $resultUser = $conn->query($sqlUser);

                if($resultUser->num_rows > 0) {
                    $row = $resultUser->fetch_assoc();

                    if($password === $row['password']) {
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['name'] = $row['username'];
                        header("location:userDashboard.php");
                        exit();
                    }
                }
                echo "<script>alert('Invalid credentials!');</script>";
            }
        }
    ?>
    <form method="post">

        <label for="name">Enter Name: </label>
        <input type="text" name="name" id="name" placeholder="Username/Adminname"/>
        <span style="color:red"><?php echo $nameErr ?></span>
        <br/><br/>

        <label for="password">Enter Password: </label>
        <input type="text" name="password" id="password"/>
        <span style="color:red"><?php echo $passErr ?></span>
        <br/><br/>

        <input type="submit" value="Login" name="submit"><br/><br/>

        <label>Don't have account ? <a href="./registration.php">Register</a></label>
    </form>
</body>
</html>