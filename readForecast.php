<?php
/**
 * Author: Sherri Ashton
 * Date: Oct 29, 2023
 * Purpose: Practical 1 - Weather Forecast Display
 *  This PHP script dynamically generates a weather forecast based on data retrieved from a local 'forecast.txt' file.
 *  The forecast displays a visual representation of the weather condition (sun, rain, etc.) alongside temperature details.
 *  The temperatures are provided either in Celsius or Fahrenheit, based on the data in the file.
 *  At the end of the forecast, weekly average high and low temperatures are calculated and displayed.
 *  If no forecast data is found, a user-friendly error message is shown.
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>Forecast</title>
    <style>
        .container-fluid {
            /* This class is used as is from bootstrap. No changes required. */
        }

        /* This class creates the blue boxes of the correct width for each day. */
        .bg-primary {
            width: 500px;
            height: auto;
            min-height: 150px;
            padding: 10px;
            margin-bottom: 2px;
        }

        /* This sets the paragraphs away from the left margin */
        .bg-primary p {
            padding-left: 90px;
        }

        /* This floats the image to the left and sets the size. */
        .forecastImage {
            margin-right: 10px;
            width: 80px;
            float: left;
        }

        h5 {
            background-color: yellow;
            width: 500px;
            padding: 10px;
        }
    </style>
</head>
<body>
<?php
// Array for months
$monthArray = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

//Temperature codes for display
$degreeCodeCelsius = "&#8451;";
$degreeCodeFahrenheit = "	&#8457;";


// Weather condition to image mapping
$weatherImages = array(
    "sunny" => "images/sun.jpg",
    "rain" => "images/rain.jpg",
    "overcast" => "images/overcast.jpg",
    "partlyCloudy" => "images/partlyCloudy.jpg",
    "snow" => "images/snow.jpg",
    "lightning" => "images/lightning.jpg"
);
//variables for the average
$sumHighTemps = 0;
$sumLowTemps = 0;

// Reads the forecast file
$file = 'forecastData/forecast.txt';
if (file_exists($file) && filesize($file) > 0) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $daysCount = count($lines);
} else {
    $daysCount = 0;
}
?>

<div class="container-fluid">
    <?php
    echo "<h3>{$daysCount} Day Forecast for Charlottetown, PEI</h3>";
    if ($daysCount > 0) {
        foreach ($lines as $line) {
            $data = explode(";", $line);
            $day = $data[0];
            $date = $data[1] . " " . $monthArray[intval($data[2]) - 1] . " " . $data[3];
            $highTemp = $data[4];
            $lowTemp = $data[5];
            $sumHighTemps += $highTemp; // Add to the sum of temperatures
            $sumLowTemps += $lowTemp; // Add to the sum of temperatures
            $condition = $data[6];
            $additionalInfo = $data[7];
            $unit = $data[8] == "celsius" ? $degreeCodeCelsius : $degreeCodeFahrenheit;

            // Get the image for the condition
            $imageSrc = isset($weatherImages[$condition]) ? $weatherImages[$condition] : "images/default.jpg";
            // Display forecast data
            echo "<div class='bg-primary'>";
            echo "<h4>{$day}, {$date}</h4>";
            echo "<img src='{$imageSrc}' class='forecastImage'>";
            echo "<p>{$condition}.{$additionalInfo}</p>";
            echo "<p>High {$highTemp}{$unit}. Low {$lowTemp}{$unit}.</p>";
            echo "</div>";
        }
        // Calculate and display the weekly averages
        $avgHighTemp = $sumHighTemps / $daysCount;
        $avgLowTemp = $sumLowTemps / $daysCount;
        //Display the weekly averages
        echo "<h5>Weekly Temperature Averages: High: " . round($avgHighTemp, 2) . "{$unit} Low: " . round($avgLowTemp, 2) . "{$unit}</h5>";;  // You can compute the weekly averages here
        echo "Current as of: " . date("d/m/Y");
    } else {
        echo "<h2>Forecast is unavailable. Our web team has been notified.</h2>";
    }
    ?>
</div>
</body>
</html>