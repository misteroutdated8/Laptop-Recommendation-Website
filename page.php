<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style>
         /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
         .row.content {height: 1500px}
         /* Set gray background color and 100% height */
         .sidenav {
         background-color: #f1f1f1;
         height: 100%;
         }
         /* Set black background color, white text and some padding */
         footer {
         background-color: #555;
         color: white;
         padding: 15px;
         }
         /* On small screens, set height to 'auto' for sidenav and grid */
         @media screen and (max-width: 767px) {
         .sidenav {
         height: auto;
         padding: 15px;
         }
         .row.content {height: auto;} 
         }
      </style>
   </head>
   <body>
      <div class="container-fluid">
         <div class="row content">
            <div class="col-sm-2 sidenav">
               <form action="page.php" method="post">
                  <h4>Choose Specification</h4>
                  <br>
									<form action="page.php" method="post">
                  <ul class="nav nav-pills nav-stacked">
                     <li class="active">
                        <p><b>CLOCK SPEED : </b></p>
                        <!--<input type="radio" name="clockSpeed" value="1.10" checked>1.10-2.50GHz<br>
                           <input type="radio" name="clockSpeed" value="1.8">1.8-2.2GHz<br>
                           <input type="radio" name="clockSpeed" value="1.60"> 1.60-2.50GHz-->
                        <input type="radio" name="clockSpeed" value="1.10" id="cs1.1" checked> 1.10-1.60GHz<br>
                        <input type="radio" name="clockSpeed" value="1.6" id="cs1.61"> 1.61-2GHz<br>
                        <input type="radio" name="clockSpeed" value="2" id="cs2.1"> 2.1-2.50GHz
                     </li>
                     <br>
                     <li>
                        <p><b>RAM :</b></p>
                        
                        <input type="radio" name="ram" value="4" checked id="ram4">4GB<br>
                        <input type="radio" name="ram" value="6" id="ram6">6GB<br>
                        <input type="radio" name="ram" value="8" id="ram8">8GB
                     </li>
                     <br>
                     <li>
                        <p><b>STORAGE :</b></p>
                        <input type="radio" name="storage" value="500" id="storage500" checked>500GB<br>
                        <input type="radio" name="storage" value="1" id="storage1">1TB
                     </li>
                     <br>
                     <li>
                        <p><b>PRICE :</b></p>
                        <input type="radio" name="price" value="25000" id="price25" checked>20,000-30,000 TK<br>
                        <input type="radio" name="price" value="35000" id="price35">30,000-40,000 TK<br>
                        <input type="radio" name="price" value="45000" id="price45">40,000-50,000 TK<br>
                        <input type="radio" name="price" value="55000" id="price55">50,000-60,000 TK
                     </li>
                     <br>
                     <li>
                        <input type="submit" name="submit">
                     </li>
                  </ul>
               </form>
            </div>
            <?php
               if(isset($_POST['submit']))
               {
               	if ($_SERVER["REQUEST_METHOD"] == "POST") {
               	  $clockspeed=$_POST["clockSpeed"];
               	  $ram=$_POST["ram"];
               	  $storage=$_POST["storage"];
               	  $price=$_POST["price"];
               	  
               	  //echo "choosen specification : " .$clockspeed ." ". $ram." ". $storage." ". $price . "<br>";
               	  
               	  $clockspeed=$clockspeed/3;
               	  $ram=$ram/10;
               	  if($storage==500)
               	  {
               		  $storage=$storage/1000;
               	  }
               	  $price=$price/90000;
               	  
               	  //echo $clockspeed ." ". $ram." ". $storage." ". $price . "<br>";
               	  
               	  $prediction_data = array('clockspeed' => $clockspeed,
               		'ram' => $ram,
               		'storage' => $storage,
               		'price' => $price);
               		
               		$json = json_encode($prediction_data);
               		$file = 'json-file';
               
               		file_put_contents($file, $json);
               	}
               }
               	  
               	  
               
               	exec('python test.py');
               
               
               	$string = file_get_contents("example.json");
               	$json = json_decode($string, true);
               
               	$value = $json["test1"];
               	echo "predictive accuracy : " .$value."<br>";
               
               	$servername = "localhost";
               	$username = "root";
               	$password = "";
               	$dbname = "spproject";
               
               	// Create connection
               	$conn = mysqli_connect($servername, $username, $password, $dbname);
               	// Check connection
               	if (!$conn) {
               		die("Connection failed: " . mysqli_connect_error());
               	}
               
               	//$sql = "SELECT model, point, id FROM point WHERE point >= 0.8266 AND point <= .83";
               	//$sql = "SELECT id, model FROM config UNION SELECT id, model FROM point WHERE point >= 0.8266 AND point <= .83";
               	$sql = "SELECT config.model, point.id, point.point, config.brand, config.processor, config.clock_speed, config.ram, config.storage, config.price, config.display_size
               	FROM config
               	INNER JOIN point ON config.id = point.id where point.point >= ($value-.01) AND point.point <= ($value+.01)";
               	//$sql = "SELECT model, point, id FROM point";
               	$result = mysqli_query($conn, $sql);
               
               
               
               
               	echo '<div class="col-sm-10">
               	  
               	  <table class="table table-hover">
               	<thead>
               	  <tr>
               		<th>Brand</th>
               		<th>Model</th>
               		<th>Processor</th>
               		<th>Clock Speed</th>
               		<th>Ram</th>
               		<th>Storage</th>
               		<th>Price</th>
               		<th>Display Size</th>
               		<th>Point</th>
               	  </tr>
               	</thead>
               	<tbody>';
               
               
               	if (mysqli_num_rows($result) > 0) {
               		// output data of each row
               		while($row = mysqli_fetch_assoc($result)) {
               			//echo "Model: " . $row["model"]. " point: " . $row["point"]. " Id: " . $row["id"]. "<br>";
               			echo '<tr>
               				<td>'.$row["brand"].'</td>
               				<td>'.$row["model"].'</td>
               				<td>'.$row["processor"].'</td>
               				<td>'.$row["clock_speed"].'</td>
               				<td>'.$row["ram"].'</td>
               				<td>'.$row["storage"].'</td>
               				<td>'.$row["price"].'</td>
               				<td>'.$row["display_size"].'</td>
               				<td>'.$row["point"].'</td>
               			  </tr>';
               		}
               	} else {
               		echo " ";
               	}
               
               	mysqli_close($conn);
               
               ?>
            </tbody>
            </table>
         </div>
      </div>
      </div>
      <footer class="container-fluid">
         <p>Footer Text</p>
      </footer>
   </body>
</html>
