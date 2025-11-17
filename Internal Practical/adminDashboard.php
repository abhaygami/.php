<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="movieName" placeholder="Movie Name"><br><br>

        <input type="text" name="genre" placeholder="Genre"><br><br>

        <input type="text" name="rating" placeholder="Rating(<10)"><br><br>

        <label for="image">Select Image: </label>
        <input type="file" name="image"><br><br>

        <input type="submit" value="Add" name="submit">
    </form>

    <?php
        if(isset($_POST['submit'])) {
            include "./connection.php";

            $image="";

            $target_dir = "uploads/";
            $target_file =$target_dir . $_FILES['image']['name'];

            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $check = getimagesize($_FILES['image']['tmp_name']);
            if($check) {
                $allowed_types = ["jpeg","jpg","png"];
                if(in_array($imageFileType,$allowed_types)) {
                    if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)) {
                        $sql = "INSERT INTO movie(movieName, Genre, Rating, Image) VALUES ('{$_POST['movieName']}', '{$_POST['genre']}', '{$_POST['rating']}','$target_file')";

                        if(mysqli_query($conn,$sql)) {
                            echo "Value Inserted Successfully!";
                        } else {
                            echo "Insertion not done!";
                        }
                    } else {
                        echo "Uploading failed!!";
                    }
                } else {
                    echo "File type not allowed!!";
                }
            } else {
                echo "File is not actual Image !!";
            }
        }
    ?>
    <form action="./deleteMovie.php" method="post">
        <select name="rating">
            <option value="">Select Rating</option>
            <?php
                include "./connection.php";
                $qyr = "SELECT DISTINCT Rating FROM movie";
                $res = mysqli_query($conn,$qyr);

                while($row = mysqli_fetch_assoc($res)) {
                    echo "<option value'{$row["Rating"]}'>{$row["Rating"]}</option>";
                }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Delete" name="submit">
    </form>
</body>
</html>