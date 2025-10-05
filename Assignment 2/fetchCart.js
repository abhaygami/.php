let totalPrice = 0;
let totalProducts = 0;

$(document).ready(function() {
    loadCartItems();
});

function loadCartItems() {
    totalPrice = 0;
    totalProducts = 0;
    $.ajax({
        url: "./fetchCartItems.php",
        dataType: "json",
        method: "GET",
        success: function(data) {
            $("#cartTable").empty();
            if(data.length > 0) {
                let newRow = $("<tr></tr>");
                data.forEach(function(product) {
                    let cell = `
                        <td>
                            <center><img src="${product.ProductImage}" width="250" height="250"/></center>
                        </td>
                        <td>
                            <center>
                            <strong>${product.ProductName}</strong><br>
                            Category: ${product.CategoryName}<br>
                            Price: ${product.Price}<br>
                            Quantity: ${product.Quantity}<br>
                            <button onClick = "removeFromCart(${product.product_id})">Remove Product</button></center>
                        </td>`;
                        totalProducts++;
                        totalPrice += (product.Price * product.Quantity);
                    newRow.append(cell);
                    $("#cartTable").append(newRow);
                    newRow = $("<tr></tr>");
                });
            } else {
                $("#cartTable").append("<tr><td>No products found</td></tr>");
            }
            calculateCart();
        }       
    });
}

function removeFromCart(product_id) {
    $.ajax({
        url: "removeItemFromCart.php",
        dataType: "json",
        data: {product_id: product_id},
        method: "POST",
        success: function(response) {
            if(response.status == "success") {
                alert(response.message);
                loadCartItems();
            } else {
                alert(response.message);
            }
        }
    });
}

function calculateCart() {
    $("#priceDetail").empty(); // Clear existing content
    $("#priceDetail").append(`<li>Total Products: ${totalProducts}</li>`);
    $("#cart-menu").append(`<h3>Total Price: ${totalPrice}</h3>`);
    let currentDate = new Date();

    // Generate a random number of days between 1 and 5 (inclusive)
    let randomDays = Math.floor(Math.random() * 5) + 1;

    // Add the random number of days to the current date
    currentDate.setDate(currentDate.getDate() + randomDays);

    // Format the date for display (e.g., "Mon Oct 02 2023")
    let deliveryDate = currentDate.toDateString();

    $("#cart-menu").append(`<h4>Deliver expected by:</h4>`);
    $("#cart-menu").append(`<h3 style="color: green;">${deliveryDate}</h3>`);
}