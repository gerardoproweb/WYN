<?php
include("dbConnector.php");
$connector = new DbConnector();

$title = trim(strtolower($_POST['titulo']));
$title = mysql_escape_string($title);

$query = "SELECT titulo FROM productos WHERE titulo = '$title' LIMIT 1";
$result = $connector->query($query);
$num = mysql_num_rows($result);

echo $num;
mysql_close();
