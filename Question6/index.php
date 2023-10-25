<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab 3 - Question 6</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <?php
        // Array of temperatures
        $temperatures = array(68, 70, 72, 58, 60, 79, 82, 73, 75, 77, 73, 58, 63, 79, 78, 68, 72, 73, 80, 79, 68, 72, 75, 77, 73, 78, 82, 85, 89, 83);

        // Calculate average high temperature
        $average = array_sum($temperatures) / count($temperatures);

        // Sort temperatures in descending order (high to low)
        // rsort = reverse sort
        rsort($temperatures);

        // Get the five warmest high temperatures
        $warmest = array_slice($temperatures, 0, 5);

        // Get the five coolest high temperatures (-5 = extract the 5 last elements of the array)
        $coolest = array_slice($temperatures, -5);

        // Print the findings
        echo "<h1 class='my-3 mb-4'>High Temperatures for Spring Month</h1>";
        echo "<p>The average high temperature for the month was <strong>" . round($average, 2) . "&deg;F</strong></p>";


       echo "<p>List of <strong>five highest</strong> temperatures: <br>" . implode("°F <br>", $warmest) . "°F </p>";


        echo "<p>List of <strong>five lowest </strong> temparatures: <br>" . implode("°F <br>", $coolest) . " °F</p>";
        ?>



    </div>
</body>
</html>
