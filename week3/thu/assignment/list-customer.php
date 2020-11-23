<?php
require './settings.php';

 $paystack = new PayStack();

 try{

    $customers = $paystack->getCustomers();

 } 
 catch (Exception $err) {
     echo $err . PHP_EOL;
     $customers = [];
 }
 
 var_dump($customers);


