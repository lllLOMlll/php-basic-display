<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lab 3 - Question 5</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container text-center">
		<?php
    // keys = country
    // values = city
		$cities = array(
			"Japan" => "Tokyo",
			"Mexico" => "Mexico City",
			"USA" => "New York City",
			"India" => "Mumbai",
			"Korea" => "Seoul",
			"China" => "Shanghai",
			"Nigeria" => "Lagos",
			"Argentina" => "Buenos Aires",
			"Egypt" => "Cairo",
			"England" => "London"
		);
		?>

		<h1 class="my-3 mb-4">Large cities</h1>
		<form method="post" action="">
			Please choose a city: 
			<select name="city">
				<?php
				foreach ($cities as $country => $city) {
					echo "<option value=\"$country\">$city</option>";
				}
				?>
			</select>
			<br>
			<br>
			<input style="background-color: #00ff00;" type="submit" value="Go">
		</form>
		<br>

		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	// In the form, the value of the <select> item is set to $country, so $_POST['city'] = country
    	// $cities[$_POST['city']] = looking in the array $cities at the index [$_POST['city']] = [The name of the city]
			if (isset($_POST['city']) && array_key_exists($_POST['city'], $cities)) {
				echo "<p class='fst-italic'>".$cities[$_POST['city']]." is in ".$_POST['city']."</p>";
			}
		}
		?>


	</div>
</body>
</html>
