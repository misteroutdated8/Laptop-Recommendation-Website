<?php
$arr = array(
    'a config',
    'b config',
    'c config' => 'with values'
);

//$myJSON = json_encode($arr);

$json = json_encode($arr);
$file = 'json-file';

file_put_contents($file, $json);

//echo $myJSON;


?>