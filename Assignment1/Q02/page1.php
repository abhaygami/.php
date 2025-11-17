<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Basic Detials For student</h1>

    <form method="post" action="./page2.php">

        <label for="rollno">Enter Roll No : </label>
        <input type="number" name="rollno" />
        <br/><br/>

        <label for="name">Enter Name : </label>
        <input type="text" name="name" />
        <br/><br/>

        <label for="dob">Enter date of birth : </label>
        <input type="date" name="dob" />
        <br/><br/>

        <input type="submit" name="submit" value="Fill">
        
        <a href="./page2.php">next</a>

    </form>
</body>
</html>