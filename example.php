<?php 

/*$r = exec('python run.py');

echo $r;*/

$result = exec('python NN.py');
$result = json_decode($result);

foreach($result as $row){
	echo $row . "<br>";
}

?>