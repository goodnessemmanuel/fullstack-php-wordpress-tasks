<?php 
/**
 * Arrays in php
 * 
 * @author Aj
 */

 $grades = [20,10,5.5,60,11];

 echo $grades[0] + $grades[1] + $grades[2]  + $grades[3] + $grades[4];

 $languages = ["PHP", "Java", "C#", "Python", "Kotlin", "Go"];

 // modify array
 
 print_r($languages);

 $languages[5] = $languages[5] . "lang";


 $keys = array_keys($languages);

 print_r($keys);


 $config = [
    'db_host' => 'localhost',
    'port' => 9005,
    'user' => 'root',
    'password' => 'root',
    'keep_open' => true
 ];

echo $config['port'];


