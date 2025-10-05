$(document).ready(function () {

    loadCategories();

    $("#addItem").submit(function (e) {

        e.preventDefault();

        let valid = true;

        // Clear old errors
        $("#errName, #errPrice, #errStock").text("");

        // Validate product name
        if ($("#productName").val().trim() === "") {
            $("#errName").text("❌ Product Name is required");
            valid = false;
        }

        // Validate price
        if ($("#price").val().trim() === "" || $("#price").val() <= 0) {
            $("#errPrice").text("❌ Enter valid price");
            valid = false;
        }

        // Validate stock
        if ($("#stock").val().trim() === "" || $("#stock").val() < 0) {
            $("#errStock").text("❌ Enter valid stock quantity");
            valid = false;
        }

        // Validate image (must be selected)
        let file = $("#uploadImage").val();
        if (file === "") {
            $("#errImage").text("❌ Please select an image");
            valid = false;
        }

        if (!valid) {
            return;
        }

        let formData = new FormData(this);

        $.ajax({
            url: "insertProduct.php",
            type: "POST",
            data: formData,
            processData: false, // Prevents jQuery from processing the data
            contentType: false, // Prevents jQuery from setting the Content-Type header
            dataType: "json",
            success: function(response) {
                if(response.status == "success") {
                    alert("Product added");
                    window.location.href = "adminDashboard.php";
                } else {
                    alert("❌ " + response.message)
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("AJAX error: " + textStatus + " - " + errorThrown);
            }
        })
        
    });
});

function loadCategories() {
    $.ajax({
        url: "./fetchCategories.php",
        dataType: "json",
        method: "GET",
        success: function(categories) {
            let list = $("#category");
            list.empty();
            categories.forEach(function(cat) {
                // Modified line to include the delete button
                list.append(`<option value="${cat.category_name}">${cat.category_name}</option>`);
            });
        }
    });
}