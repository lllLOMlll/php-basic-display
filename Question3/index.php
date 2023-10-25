<?php
session_start();

$valid = true; // Flag to check if the form inputs are valid

// VALIDATION!!!
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // CITY
    // Check if city is not empty and does not contain numbers
    if (empty($_POST['city'])) {
        $_SESSION['city_error'] = 'City is required.';
        $valid = false;
        // Regular expression. d = digit (0-9)
    } elseif (preg_match('/\d/', $_POST['city'])) {
        $_SESSION['city_error'] = 'City should not contain numbers.';
        $valid = false;
    } else {
        $city = $_POST['city'];
    }

    // MONTH
    // Check if month is selected
    if (empty($_POST['month'])) {
        $_SESSION['month_error'] = 'Month is required.';
        $valid = false;
    } else {
        $month = $_POST['month'];
    }

    // YEAR
    // Check if year is not empty, a valid number, and within the range of 2000 to 2023
    if (empty($_POST['year']) || !is_numeric($_POST['year'])) {
        $_SESSION['year_error'] = 'Year is required and should be a number.';
        $valid = false;
    } elseif ($_POST['year'] < 2000 || $_POST['year'] > 2023) {
        $_SESSION['year_error'] = 'Year should be between 2000 and 2023.';
        $valid = false;
    } else {
        $year = $_POST['year'];
    }

    // WEATHER
    // Check if at least one weather option is selected
    if (empty($_POST['weather'])) {
        $_SESSION['weather_error'] = 'At least one weather option must be selected.';
        $valid = false;
    } else {
        $weather = $_POST['weather'];
    }

    // CONCLUSION OF THE VALIDATION
    if ($valid) {
        $_SESSION['message'] = 'Form submitted successfully.';
        $_SESSION['mgcolor'] = true;
    } else {
        $_SESSION['message'] = 'Error: Please fix the form errors!';
        $_SESSION['mgcolor'] = false;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab 3 - Question 3</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-3">How's your weather?</h1>
        <p class="info">Please enter your information</p>



        <form action="" method="post">
            <!-- CITY -->
            <label class="format-form" style="font-weight: bold;">City:</label><br>
            <input class="format-form" type="text" name="city" value="<?= isset($city) ? $city : '' ?>">
            <!-- City error message -->
            <?php if (isset($_SESSION['city_error'])): ?>
                <p style ="color: red;" class="format-form"><?= $_SESSION['city_error'] ?></p>
                <!-- unset() function is used to remove the variable 'city-error' from the session  -->
                <?php unset($_SESSION['city_error']); ?>
            <?php endif; ?>
            <br><br>

            <!-- MONTH -->
            <label class="format-form" style="font-weight: bold;">Month:</label>
            <br>
            <select class="format-form" name="month">
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
            <br>
            <br>

            <!-- YEAR -->
            <label class="format-form" style="font-weight: bold;">Year:</label>
            <br>
            <input class="format-form" type="number" name="year">

            <!-- Year error message -->
            <?php if (isset($_SESSION['year_error'])): ?>
                <p style ="color: red;" class="format-form"><?= $_SESSION['year_error'] ?></p>
                <?php unset($_SESSION['year_error']); ?>
            <?php endif; ?>
            <br>
            <br>

            <!-- TYPE OF WEATHER -->
            <p class="format-form">Please choose the kinds of weather you experienced in the list below.</p>
            <p class="format-form">Choose all that apply:</p>

            <table class="format-form">
                <tr class="my-3">
                    <td><input class="my-2 me-2" type="checkbox" name="weather[]" value="Sunshine"> Sunshine<br></td>
                    <td><input class="my-2 ms-2" type="checkbox" name="weather[]" value="Hail"> Hail<br></td>
                    <td><input class="my-2 ms-2" type="checkbox" name="weather[]" value="Wind"> Wind<br></td>
                </tr>

                <tr>
                    <td><input class="my-2 me-2" type="checkbox" name="weather[]" value="Clouds"> Clouds<br></td>
                    <td><input class="my-2 ms-2" type="checkbox" name="weather[]" value="Sleet"> Sleet<br></td>
                    <td><input class="my-2 ms-2" type="checkbox" name="weather[]" value="Cold"> Cold<br></td>
                </tr>

                <tr>
                    <td><input class="my-2 me-2" type="checkbox" name="weather[]" value="Rain"> Rain<br></td>
                    <td><input class="my-2 ms-2" type="checkbox" name="weather[]" value="Snow"> Snow<br></td>
                    <td><input class="my-2 ms-2" type="checkbox" name="weather[]" value="Heat"> Heat<br></td>
                </tr>
            </table>
            <!-- Weather error message -->
            <?php if (isset($_SESSION['weather_error'])): ?>
                <p style ="color: red;" class="format-form"><?= $_SESSION['weather_error'] ?></p>
                <?php unset($_SESSION['weather_error']); ?>
            <?php endif; ?>
            <br>
            

            <!-- SUBMIT -->
            <input class="format-form mt-4" type="submit" value="Submit">
        </form>

        <br>
        <br>

        <!-- The class of the message (see style.css) is determined by the isset($_SESSION) -->
        <div class="message <?php
        if (isset($_SESSION['mgcolor']) && $_SESSION['mgcolor']) {
            echo 'success-message';
        } elseif (isset($_SESSION['mgcolor']) && !$_SESSION['mgcolor']) {
            echo 'error-message';
        }
    ?>">
    <p><span><?= isset($_SESSION['message']) ? $_SESSION['message'] : ""; ?></span></p>
</div>

<?php
        // Unset session variables after they've been used
session_unset();
?>

<!-- DISPLAYING THE RESULT -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['city']) && !empty($_POST['month']) && !empty($_POST['year']) && !empty($_POST['weather'])) {
    echo "<p>In $city in the month of $month $year, you observed the following weather:</p>";
    echo "<ul>";
    foreach($weather as $list) {
        echo "<li>$list</li>";
    }
    echo "</ul>";
}
?>
<br>

</div>
</body>
</html>
