<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Q03.php" method="post" enctype="multipart/form-data">
        Upload File : 
        <input type="file" name="fileToUpload" />
        <input type="submit" name="submit" value="Upload" />
        
    </form>
</body>
</html>

<?php
    $target_dir = "uploads/";
    define("maxSize",2*(1024*1024));
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        print_r($target_file);

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        print_r($imageFileType);



        if(isset($_POST['submit'])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            if($check !== false) {
                echo "<br>File is image";
                $uploadOk = 1;
            } else {
                echo "<br>File is not image";
                $uploadOk = 0;
            }
        }

        if(file_exists($target_file)) {
            echo "<br>File already exist";
            $uploadOk = 0;
        }

        if($_FILES["fileToUpload"]["size"] > maxSize) {
            echo "<br>image size is large";
            $uploadOk = 0;
        }

        if($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg") {
            echo "<br>extension can't be use ";
            $uploadOk = 0;
        }

        if($uploadOk == 0) {
            echo "<br> File not uploaded";
        } else {
            if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)) {
                echo "<br>File is uploaded<br><br>";

                echo "<img src="."$target_file"." alt="."uploaded image".">";
            } else {
                echo "<br>Error occured";
            }
        }

        
    }
?>