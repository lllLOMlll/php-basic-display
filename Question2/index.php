<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lab 3 - Question 2</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container red">
		<?php
		$array_cities = array(
			"Tokyo", 
			"Mexico City", 
			"New York City", 
			"Mumbai", 
			"Seoul",
			"Shanghai", 
			"Lagos", 
			"Buenos Aires", 
			"Cairo", 
			"London"
		);
		?>
		<h1 class="my-5">Large Cities</h1>

		<!-- DISPLAYING CITIES SEPARATED BY COMMAS -->
		<?php
		$array_cities_comma = implode(", ", $array_cities); 
		echo $array_cities_comma;
		?>

		<br><br>


		<!-- SORTING AND DISPLAYING THE CITIES -->

		<?php
			// Sorting the aray
		sort($array_cities);
		?>
		<div>
			<ul>
				<?php 
				sort($array_cities);
				for ($i = 0; $i < count($array_cities); $i++) {
					echo "<li>" . $array_cities[$i] . "</li>";
				}
				?>
			</ul>
		</div>

		<!-- ADDING CITITES, SORTING AND DISPLAYING  -->
		<?php
		$array_cities2 = array(
			"Los Angeles", 
			"Calcutta", 
			"Osaka", 
			"Beijing"
		);

		// Adding the new cities to the array $array_cities2
		$array_cities3 = array_merge($array_cities2, $array_cities);

		// Sorting the array
		sort($array_cities3);
		?>

		<!-- Displaying the cities -->
		<div>
			<ul>
				<?php 
				sort($array_cities3);
				for ($i = 0; $i < count($array_cities3); $i++) {
					echo "<li>" . $array_cities3[$i] . "</li>";
				}
				?>
			</ul>
		</div>

	</div>
</body>
</html>
