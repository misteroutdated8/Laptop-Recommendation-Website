<html>
<body>

<form action="userInput.php" method="post">
CLOCK SPEED : 
<select name="clockSpeed">
  <!--<option value="1.10-2.50">1.10-2.50GHz</option>
  <option value="1.8-2.2">1.8-2.2GHz</option>
  <option value="1.60-2.50">1.60-2.50GHz</option>-->
  <option value="1.10">1.10-2.50GHz</option>
  <option value="1.8">1.8-2.2GHz</option>
  <option value="1.60">1.60-2.50GHz</option>
</select>

RAM :
<select name="ram">
  <option value="2">2GB</option>
  <option value="4">4GB</option>
  <option value="6">6GB</option>
  <option value="8">8GB</option>
</select>

STORAGE :
<select name="storage">
  <option value="500">500GB</option>
  <option value="1">1TB</option>
</select>

PRICE :
<select name="price">
  <!--<option value="25000">20,000-30,000 TK</option>
  <option value="30000-40000">30,000-40,000 TK</option>
  <option value="40000-50000">40,000-50,000 TK</option>
  <option value="50000-60000">50,000-60,000 TK</option>-->
  <option value="20000">20,000-30,000 TK</option>
  <option value="30000">30,000-40,000 TK</option>
  <option value="40000">40,000-50,000 TK</option>
  <option value="50000">50,000-60,000 TK</option>
</select>

<input type="submit">
</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $clockspeed=$_POST["clockSpeed"];
  $ram=$_POST["ram"];
  $storage=$_POST["storage"];
  $price=$_POST["price"];
  
  echo $clockspeed ." ". $ram." ". $storage." ". $price . "<br>";
  
  $clockspeed=$clockspeed/3;
  $ram=$ram/10;
  if($storage==500)
  {
	  $storage=$storage/1000;
  }
  $price=$price/90000;
  
  echo $clockspeed ." ". $ram." ". $storage." ". $price . "<br>";
  
  $prediction_data = array('clockspeed' => $clockspeed,
    'ram' => $ram,
    'storage' => $storage,
	'price' => $price);
	
	$json = json_encode($prediction_data);
	$file = 'json-file';

	file_put_contents($file, $json);
}
  
  

exec('python test.py');


$string = file_get_contents("example.json");
$json = json_decode($string, true);

$value = $json["test1"];
echo $value."<br>";

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
</body>
</html>

