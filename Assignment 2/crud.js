$(document).ready(function() {
    $('#registrationForm').on('submit',function(e) {
        e.preventDefault();

        // Perform client-side validation
        let name = $('#name').val();
        let password = $('#password').val();
        let cnfPass = $('#cnfPass').val();
        // let captcha = $('#captcha').val();
        let hasError = false;

        // Reset error messages
        $("#errName").text("");
        $("#errPass").text("");
        $("#errCnfPass").text("");
        $("#errCaptcha").text("");

        if(name.trim() === "") {
            $("#errName").text("❌ Name can not be empty");
            hasError = true;
        }

        if(password.trim() === "") {
            $("#errPass").text("❌ Password required");
            hasError = true;
        }

        if(cnfPass.trim() === "") {
            $("#errCnfPass").text("❌ Password required");
            hasError = true;
        }

        if(password.trim() !== "" && cnfPass.trim() !== "" && password !== cnfPass) {
            $("#errCnfPass").text("❌ Password are not matched");
            hasError = true;
        }
        
        if(hasError) {
            return;
        }
       
        $.ajax({
            url: ($("#role").val() === "User")? "registerUser.php" : "registerAdmin.php",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if(response.status === "success") {
                    alert("Registration Done!!!");
                    window.location.href = "login.php";
                } else {
                    alert("❌ " + response.message);
                    refreshCaptcha();
                }
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error:", status, error);
                console.log("Response Text:", xhr.responseText);
            }
        })
    })
})

function refreshCaptcha() {
    document.getElementById("captcha_img").src = "captcha.php";
}