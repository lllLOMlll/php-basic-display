<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lab 3 - Question 1</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	    <style>
    .margin {
    	padding-left: 100px;
        padding-right: 400px;
    }
    </style>

</head>
<body>
	<div class="container">
		<?php
		$array_weather = array(
			"rain",
			"sunshine", 
			"clouds", 
			"hail", 
			"sleet",
			"snow",
			"wind");

		echo "<h1 class='my-5'>How's the weather ?</h1>";

		echo "<p class='margin'>We've seen all kinds of weather this month. At the beginning of the month, we had $array_weather[5] and $array_weather[6]. Then came $array_weather[1] with a few $array_weather[2] and some $array_weather[0]. At least we didn't get any $array_weather[3] or $array_weather[4].</p>";
		?>

	</div>

</body>
</html>