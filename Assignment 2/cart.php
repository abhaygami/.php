<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f5f7fa;
    }

    /* Top menu bar */
    .menu {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: #0d47a1;
        color: white;
        padding: 12px 20px;
        text-align: right;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        z-index: 1000;
    }

    .menu a {
        color: white;
        text-decoration: none;
        font-weight: bold;
        padding: 8px 14px;
        border-radius: 6px;
        transition: background 0.3s ease;
    }

    .menu a:hover {
        background: #08306b;
    }

    .menu button {
        background: transparent;
        border: none;
        margin-left: 10px;
        padding: 0;
    }

    /* Left category menu (Dashboard) */
    .category-menu {
        position: fixed;
        top: 40px;
        left: 0;
        width: 220px;
        height: calc(100% - 60px);
        background: #fff;
        border-right: 1px solid #ddd;
        overflow-y: auto;
        padding: 15px;
        box-shadow: 2px 0 6px rgba(0,0,0,0.1);
    }

    .category-menu h3 {
        margin: 0 0 15px 0;
        text-align: center;
        color: #0d47a1;
    }

    .category-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .category-menu li {
        padding: 12px;
        cursor: pointer;
        border-radius: 6px;
        transition: background 0.3s ease, transform 0.2s;
    }

    .category-menu li a {
        text-decoration: none;       /* remove underline */
        color: #0d47a1;
        font-weight: bold;
        display: block;
        padding: 10px 12px;
        border-radius: 6px;
        transition: background 0.3s ease, transform 0.2s;
    }

    .category-menu li a:hover {
        background: #e3f2fd;
        transform: translateX(4px);
    }

    .category-menu li:hover {
        background: #e3f2fd;
        transform: translateX(4px);
    }

    /* Right cart menu */
    .cart-menu {
        position: fixed;
        top: 50px;
        right: 0;
        width: 220px;
        height: calc(100% - 60px);
        background: #fff;
        border-left: 1px solid #ddd;
        overflow-y: auto;
        padding: 15px;
        box-shadow: -2px 0 6px rgba(0,0,0,0.1);
    }

    .cart-menu h3 {
        margin: 0 0 15px 0;
        text-align: center;
        color: #0d47a1;
        background: #f0f4ff;
        padding: 8px;
        border-radius: 6px;
    }

    /* Dashboard main area */
    .dashboard {
        margin-top: 60px;
        margin-left: 240px;  /* space for category menu */
        margin-right: 240px; /* space for cart menu */
        padding: 20px;
    }

     table {
        width: 100%;
        border-collapse: separate; /* changed for card spacing */
        border-spacing: 20px;      /* spacing between card-like cells */
        background: transparent;   /* remove solid block so cards stand out */
    }

    th {
        background: #0d47a1;
        color: white;
        font-weight: bold;
        border-radius: 10px;
        padding: 14px;
    }

    td {
        background: #fff;
        border-radius: 14px;
        padding: 24px;                /* increased padding */
        min-width: 200px;             /* cards won’t shrink too small */
        min-height: 250px;            /* bigger height for card look */
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.12);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    /* Hover effect on card cell */
    td:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 18px rgba(0,0,0,0.25);
    }

    /* Image inside card */
    td img {
        max-width: 90%;              /* give breathing space inside card */
        height: auto;
        margin-bottom: 12px;
        border-radius: 10px;
        transition: transform 0.3s ease;
    }

    /* Smooth hover zoom on image */
    td:hover img {
        transform: scale(1.05);
    }

    /* Buttons inside card */
    td a, td button {
        background: #0d47a1;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s;
        text-decoration: none;
        font-size: 14px;
        margin-top: 10px;
        display: inline-block;
    }

    td a:hover, td button:hover {
        background: #08306b;
        transform: translateY(-2px);
    }
</style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./fetchCart.js"></script>
</head>
<body>
    <div class="menu">
        <button><a href="./userDashboard.php">dashboard</a></button>
    </div>

    <div class="dashboard">
        <table id="cartTable">
            <tr></tr>
        </table>
    </div>

    <div class="cart-menu" id="cart-menu">
        <h3>Cart</h3>
        <ul id="priceDetail">
        </ul>
    </div>
</body>
</html>