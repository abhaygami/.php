<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $employee = array(
            "base_salary" => 50000,
            "bonus"=>5000
        );

        function calculateTotalSal() {
            global $employee,$totalSal;
            $totalSal = $employee['base_salary'] + $employee['bonus'];
        }

        calculateTotalSal();

        echo "Total salaray = $totalSal";
    ?>
</body>
</html>