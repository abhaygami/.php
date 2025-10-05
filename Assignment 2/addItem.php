<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./insertItem.js"></script>

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
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
            width: 650px;
            animation: fadeIn 0.6s ease-in-out;
        }

        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
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
        input[type="number"]:focus,
        input[type="file"]:focus,
        select:focus {
            border-color: #0d47a1;
            box-shadow: 0 0 6px rgba(13, 71, 161, 0.4);
            outline: none;
            transform: scale(1.02);
        }

        input[type="submit"],
        input[type="button"] {
            background: #0d47a1;
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
            background: #08306b;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        span {
            font-size: 12px;
            color: red;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>


</head>

<body>

    <h1>Add Item</h1>

    <form action="" method="post" id="addItem" enctype="multipart/form-data">

        <label for="productName">Product Name : </label>
        <input type="text" name="productName" id="productName" />
        <span id="errName" style="color:red"></span>
        <br /><br />

        <label for="category">Select category : </label>
        <select name="category" id="category">
        </select>
        <br /><br />

        <label for="price">Enter Price : </label>
        <!-- <input type="number" name="" id=""> -->
        <input type="number" name="price" id="price" />
        <span id="errPrice" style="color:red"></span>
        <br /><br />

        <label for="stock">Enter Stock : </label>
        <input type="number" name="stock" id="stock" />
        <span id="errStock" style="color:red"></span>
        <br /><br />

        <label for="image">Select Image : </label>
        <input type="file" name="uploadImage" id="uploadImage" />
        <span id="errImage" style="color:red"></span>
        <br /><br />



        <input type="submit" name="submit" value="Add" />

    </form>

</body>

</html>