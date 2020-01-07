<?php

$value = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $value = test_input($_POST["value"]);
}

function test_input($data) {
  $data = trim($data);
  $data = (float)$data;
  return $data;
}




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sproject";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//$sql = "SELECT model, point, id FROM point WHERE point >= 0.8266 AND point <= .83";
//$sql = "SELECT id, model FROM config UNION SELECT id, model FROM point WHERE point >= 0.8266 AND point <= .83";
$sql = "SELECT config.model, point.id, point.point
FROM config
INNER JOIN point ON config.id = point.id where point.point >= ($value-.01) AND point.point <= ($value+.01)";
//$sql = "SELECT model, point, id FROM point";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Model: " . $row["model"]. " point: " . $row["point"]. " Id: " . $row["id"]. "<br>";
		//echo "Model: " . $row["model"]. " Id: " . $row["id"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>