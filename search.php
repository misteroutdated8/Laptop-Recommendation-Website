<?php
$str = file_get_contents('example.json');
$json = json_decode($str, true);
$fuckU = $json['test1'];
//echo $fuckU;
//echo "<td><input type='text' value='$fuckU'/></td>";
?>

<html>
<body>

<form action="result.php" method="post">
Value: <input type="text" name="value" value="<?php echo $fuckU; ?>"><br>
<input type="submit">
</form>

</body>
</html>

