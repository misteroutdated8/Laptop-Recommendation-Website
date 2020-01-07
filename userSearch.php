<?php
  $clockspeed=$_REQUEST["clockSpeed"];
  $ram=$_REQUEST["ram"];
  $storage=$_REQUEST["storage"];
  $price=$_REQUEST["price"];
  
  $clockspeed=$clockspeed/3;
  $ram=$ram/10;
  if($storage==500)
  {
	  $storage=$storage/1000;
  }
  $price=$price/90000;
  
  $prediction_data = array('clockspeed' => $clockspeed,
    'ram' => $ram,
    'storage' => $storage,
	'price' => $price);
	
$json = json_encode($prediction_data);
$file = 'json-file';

file_put_contents($file, $json);

  
  /*echo $clockspeed;
  echo "<br>";
  echo $ram;
  echo "<br>";
  echo $storage;
  echo "<br>";
  echo $price;*/
?>