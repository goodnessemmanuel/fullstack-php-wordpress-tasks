<?php 
header("Content-Type: application/json");

$config = [
    'db_host' => 'localhost',
    'port' => 9005,
    'user' => 'root',
    'password' => 'root',
    'keep_open' => true
 ];


 echo json_encode($config);