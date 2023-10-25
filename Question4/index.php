<?php
session_start();

// The initial tranportation modes
$transportation = array(
    "Automobiles",
    "Jets",
    "Ferries",
    "Subway"
);

// Check if user additions exist in the session
if (isset($_SESSION['added_transportations'])) {
    $addedTransportations = $_SESSION['added_transportations'];
    $transportation = array_merge($transportation, $addedTransportations);
}

// Adding the new transportations
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['transportation'])) {
        // Take the user input and separate each when there is an "," creating an array
        $newTransportations = explode(',', $_POST['transportation']);
        // array_map is applying a function to every item of an array. In that case : triming 
        $newTransportations = array_map('trim', $newTransportations);

        // Limit to a maximum of 10 additional transportation modes 
        if (count($newTransportations) <= 10) {  
            // First time the user enters a new transportation
            if (!isset($_SESSION['added_transportations'])) {
                $_SESSION['added_transportations'] = $newTransportations;
            } else {
                // When the user already added transportations. Adding new ones to the old list.
                $_SESSION['added_transportations'] = array_merge($_SESSION['added_transportations'], $newTransportations);
            }
        }

        // Redirect to refresh the page and prevent form resubmission
               header("Location: index.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab 3 - Question 4</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5 mb-3">How Are You Traveling?</h1>
    <p>Travel takes many forms, whether across town, across the country, or around the world.</p>
    <p class="ms-5">Here is a list of some common modes of transportation:</p>

    <!-- Display the elements of the array -->
    <div class="ms-4">
        <ul>
            <?php foreach ($transportation as $mode) : ?>
                <li><?php echo $mode; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Add more transportation form -->
    <?php if (count($transportation) < 14) : ?>
        <form action="" method="post">
            <label class="mb-2">
                Please add other modes of transportation to the list, separated by commas (Up to
                <?php echo 14 - count($transportation); ?>):
            </label>
            <br>
            <input type="text" name="transportation">
            <!-- SUBMIT -->
            <input type="submit" value="Go">
        </form>
    <?php endif; ?>
</div>
</body>
</html>
