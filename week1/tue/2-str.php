<?php 

$text = "Welcome to decagon";

echo strtoupper($text);
echo strtolower($text);


$data = explode(" ", $text);

print_r($data);

var_dump(strpos($text, "decagon"));

// https://www.php.net/manual/en/function.echo.php