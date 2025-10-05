<!DOCTYPE html>
<html>
<head>
    <title>CAPTCHA Test</title>
    <script>
        function refreshCaptcha() {
            document.getElementById("captcha_img").src = "captcha.php";
        }
    </script>
</head>
<body>
    <form method="post" action="">
        <p>Enter the text shown below:</p>
        
        <p>
            <img id="captcha_img" src="captcha.php" alt="CAPTCHA Image">
            <button type="button" onclick="refreshCaptcha()">🔄</button>
        </p>
        
        <input type="text" name="captcha" required>
        <input type="submit" value="Submit">
    </form>

    <?php
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_captcha = $_POST['captcha'];
            if ($user_captcha == $_SESSION['captcha']) {
                echo "<p style='color:green;'>CAPTCHA Verified Successfully ✅</p>";
            } else {
                echo "<p style='color:red;'>Invalid CAPTCHA ❌</p>";
            }
        }
    ?>
</body>
</html>
