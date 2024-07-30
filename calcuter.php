<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notler Calculator</title>
    <style>
        table{
            border-collapse: collapse;
            width: 40%;
            margin: auto;
            text-align: center;
        }
        th, td{
            padding: 20px;
            font-size: 35px;
        }
        th{
            background-color: #f2f2f2;
        }
        h2{
            text-align: center;
            margin: auto;
            font-size: 40px;
        }
        h3{
            text-align: center;
            font-size: 50px;
        }
    </style>
</head>
<body>
    <h2>Grade Calculator</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table>
    <tr>
    <td>Vize Not:</td>
    <td><input type="number" name="midterm" min="0" max="100" required style="width: 500px; 
    margin: 40px; padding: 20px; font-size: 25px"></td>
    </tr>
    <tr>
    <td>Final Not:</td>
    <td><input type="number" name="final" min="0" max="100" required style="width: 500px; 
    margin: 40px; padding: 20px; font-size: 25px"></td>
    </tr>
    </table>
    <br>
    <input type="submit" name="submit" value="Calculate" style="display: block; 
    margin:0 auto; padding: 10px 20px; font-size: 18px">
    </form>

    <?php
    // Function to calculate the letter grade
    function calculateGrade($average) {
        if ($average >= 90) {
            return 'AA';
        } elseif ($average >= 80) {
            return 'BA';
        } elseif ($average >= 70) {
            return 'CB';
        } elseif ($average >= 60) {
            return 'DF';
        } else {
            return 'FF';
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $midterm = $_POST['midterm'];
        $final = $_POST['final'];

        // Calculate average
        $average = ($midterm + $final) / 2;

        // Convert average to letter grade
        $letterGrade = calculateGrade($average);

        // Output the results in a table
        echo "<h3>Results</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Standartlar</th><th>Value</th></tr>";
        echo "<tr><td>Vize Not</td><td>$midterm</td></tr>";
        echo "<tr><td>Final Not</td><td>$final</td></tr>";
        echo "<tr><td>Ortalama</td><td>$average</td></tr>";
        echo "<tr><td>harf</td><td>$letterGrade</td></tr>";
        echo "</table>";
    }
    ?>

</body>
</html>