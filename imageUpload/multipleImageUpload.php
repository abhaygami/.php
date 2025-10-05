<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="image">Select Image: </label>
        <input type="file" name="images[]" multiple /><br/>
        <input type="submit" value="Submit" name="submit" /><br/>
    </form>

    <?php
        if(isset($_POST['submit'])) {
            $target_dir = "uploads/";

            $totalFiles = count($_FILES['images']['name']);

            for($i = 0; $i < $totalFiles; $i++) {
                $target_file = $target_dir . basename($_FILES['images']['name'][$i]);

                $check = getimagesize($_FILES['images']['tmp_name'][$i]);

                if($check === false) {
                    echo "$target_file is not actual Image! <br/>";
                    continue;
                }

                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                $allowedType = ["jpg","jpeg","png","gif"];

                if(!in_array($imageFileType,$allowedType)) {
                    echo "extension for $target_file is not supported! <br/>";
                    continue;
                }

                if(move_uploaded_file($_FILES['images']['tmp_name'][$i],$target_file)) {
                    echo "<img src='$target_file' width='150' style='margin:5px'><br/>";
                } else {
                    echo "Error for uploading $target_file ! <br/>";
                }
            } 
        }
    ?>
</body>
</html>