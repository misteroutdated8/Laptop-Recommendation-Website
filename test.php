<?php
$data = '{
	"name": "Aragorn",
	"race": "Human"
}';

$character = json_decode($data);
echo $character->race;
$string = "this is a string";
exec("example.php $string");
?>