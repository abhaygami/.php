<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./crud.js"></script>
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
        margin-top: 50px;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.2);
        width: 650px;  /* ⬅ wider form */
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



    <h1>Registration</h2>

    <form id="registrationForm" action="registration.php" method="post">

        <label for="name">Enter Name: </label>
        <input type="text" name="name" id="name"/>
        <span id="errName" name="errName" style="color:red"></span>
        <br/><br/>

        <label for="role">Select Role: </label>
        <select name="role" id="role">
            <option value="User">User</option>
            <option value="Admin">Admin</option>
        </select>
        <br/><br/>

        <label for="name">Enter Password: </label>
        <input type="password" name="password" id="password"/>
        <span id="errPass" name="errPass" style="color:red"></span>
        <br/><br/>

        <label for="name">Confirm Password: </label>
        <input type="password" name="cnfPass" id="cnfPass"/>
        <span id="errCnfPass" name="errCnfPass" style="color:red"></span>
        <br/><br/>

        <label for="name">Enter below captcha: </label>
        <input type="text" name="captcha" id="captcha"/>
        <span id="errCaptcha" name="errCaptcha" style="color:red"></span>
        <br/>

        <img id="captcha_img" src="./captcha.php" alt="Captcha"/>
        <input type="button" value="🔃" onclick="refreshCaptcha()">

        <br/><br/>

        <input type="submit" value="Submit" name="submit"><br/><br/>
        <label>Already have account ? <a href="./login.php">LogIn</a></label>

    </form>

    

</body>
</html>