<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculator</title>
    <style>
        .login-table {
            border-collapse: collapse;
            width: 75%;
            margin: auto;
            text-align: left;
        }
        .login-table th, .login-table td {
            padding: 10px;
            font-size: 30px;
            border: 1px solid #ccc;
        }
        .login-table th {
            background-color: #f2f2f2;
        }
        .login-table input[type="number"] {
            width: 95%;
            padding: 10px;
            font-size: 30px;
        }
        .login-table input[type="submit"] {
            width: 50%;
            padding: 10px;
            font-size: 30px;
            cursor: pointer;
        }
        h2 {
            text-align: center;
            margin: auto;
            font-size: 50px;
        }
        h3 {
            text-align: center;
            font-size: 40px;
        }
        .login-table td.submit-button {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Not Calculator</h2>
    <table class="login-table">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <tr>
                <th colspan="2">Enter Grades</th>
            </tr>
            <tr>
                <td>Vize Not:</td>
                <td><input type="number" name="midterm" min="0" max="100" required></td>
            </tr>
            <tr>
                <td>Final Not:</td>
                <td><input type="number" name="final" min="0" max="100" required></td>
            </tr>
            <tr>
                <td class="submit-button" colspan="2"><input type="submit" name="submit" value="Calculate"></td>
            </tr>
        </form>
    </table>

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
        echo "<table class='login-table'>";
        echo "<tr><th colspan='2'>Results</th></tr>";
        echo "<tr><td>Vize Not</td><td>$midterm</td></tr>";
        echo "<tr><td>Final Not</td><td>$final</td></tr>";
        echo "<tr><td>Ortalama</td><td>$average</td></tr>";
        echo "<tr><td>harf</td><td>$letterGrade</td></tr>";
        echo "</table>";
    }
    ?>

</body>
</html>