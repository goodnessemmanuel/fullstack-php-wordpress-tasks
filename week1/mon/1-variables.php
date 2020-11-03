<?php

/**
 * Welcome to PHP variable program
 * 
 * @date 02/11/2020
 * @author AJ
 */


 $name = "Decagon"; // string
 $age = 20; // integer
 $isRunning = false; // boolean
 $height = 3.45; // float
 $connected = null; // null

 echo "$name | $age | $isRunning | $height | $connected\n";

 $student1 = 30;
 $student2 = 20;
 $student3 = 45.3;
 $student4 = 10.6;

 $avg = ($student1 +  $student2 +  $student3 +  $student4) /  4;



 echo $avg;
 echo "\n";

 $totalScore = 0;

 $totalScore += $student1;
 $totalScore += $student2;
 $totalScore =  $totalScore + $student3;
 $totalScore = $totalScore + $student4;

 echo $totalScore / 4;
 echo "\n";

 $salary = 10000;

 $salary  = $salary  *= ($salary * 10);

 $salary = $salary / 2;


 echo "%=== " . 10 % 3;
 echo "\n";

 echo $salary;
 echo "\n";


 $firstName = "John";
 $lastName = "Doe";

 $fullName = $firstName . " " . $lastName;
 echo $fullName;

 