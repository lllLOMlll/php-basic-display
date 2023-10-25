<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab 3 - Question 7</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style>
        td, th {
            width: 8em; 
            border: 1px solid black; 
            padding-left: 4px;
        }
        th {
            text-align:center;
        }
        /* Centering the table */
        table {
            border-collapse: collapse; 
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>

    <div class="container text-center">

        <!-- Create an multidimensional array -->
        <?php
        $multiCity = array(
            // The first array is for the header, index[0]
            array('City', 'Country', 'Continent'),
            array('Tokyo', 'Japan', 'Asia'),
            array('Mexico City', 'Mexico', 'North America'),
            array('New York City', 'USA', 'North America'),
            array('Mumbai', 'India', 'Asia'),
            array('Seoul', 'Korea', 'Asia'),
            array('Shanghai', 'China', 'Asia'),
            array('Lagos', 'Nigeria', 'Africa'),
            array('Buenos Aires', 'Argentina', 'South America'),
            array('Cairo', 'Egypt', 'Africa'),
            array('London', 'UK', 'Europe')
        );
        ?>

        <!-- DISPLAYING THE ARRAY -->
        <h1 class="mt-4">City Table - Part 1</h1>
        <table>
            <?php
        // Displaying header row
            echo '<tr>';
            // Using index[0] for the title of the table
            foreach ($multiCity[0] as $header) {
                echo "<th>$header</th>";
            }
            echo '</tr>';

        // Populating the table using a for loop and nested foreach loop
            // I start at 1 cause I dont want the index[0] --> the title of the table
            for ($i = 1; $i < count($multiCity); $i++) {
                echo '<tr>';
                foreach ($multiCity[$i] as $value) {
                    echo "<td>$value</td>";
                }
                echo '</tr>';
            }
            ?>
        </table>
        <br>
        <br>

        <!-- Creating an associative array -->
        <?php
        $multiCity = array(
            array(
                'City' => 'Tokyo', 
                'Country' => 'Japan', 
                'Continent' => 'Asia'
            ),
            array(
                'City' => 'Mexico City', 
                'Country' => 'Mexico', 
                'Continent' => 'North America'
            ),
            array(
                'City' => 'New York City', 
                'Country' => 'USA', 
                'Continent' => 'North America'
            ),
            array(
                'City' => 'Mumbai', 
                'Country' => 'India', 
                'Continent' => 'Asia'
            ),
            array('City' => 'Seoul', 
                'Country' => 'Korea', 
                'Continent' => 'Asia'
            ),
            array(
                'City' => 'Shanghai', 
                'Country' => 'China', 
                'Continent' => 'Asia'
            ),
            array(
                'City' => 'Lagos', 
                'Country' => 'Nigeria', 
                'Continent' => 'Africa'
            ),
            array(
                'City' => 'Buenos Aires', 
                'Country' => 'Argentina', 
                'Continent' => 'South America'
            ),
            array(
                'City' => 'Cairo', 
                'Country' => 'Egypt', 
                'Continent' => 'Africa'
            ),
            array(
                'City' => 'London', 
                'Country' => 'UK', 
                'Continent' => 'Europe'
            )
        );
        ?>

        <h1>City Table - Part 2</h1>
        <table>
            <?php
        // Displaying header row using foreach loop
            echo '<tr>';
            // For each element of the array, the key are 'City', 'Country', 'Continent'
            foreach ($multiCity[0] as $key => $value) {
                // Displaying the keys (titles)
                echo "<th>$key</th>";
            }
            echo '</tr>';

        // Populating the table using a for loop starting from index 0
            for ($i = 0; $i < count($multiCity); $i++) {
                echo '<tr>';
                foreach ($multiCity[$i] as $value) {
                    echo "<td>$value</td>";
                }
                echo '</tr>';
            }
            ?>
        </table>
        <br>

    </div>
</body>
</html>