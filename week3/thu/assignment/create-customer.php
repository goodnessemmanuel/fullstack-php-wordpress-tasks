<?php
require './settings.php';

 $paystack = new PayStack();

 try{

    $customer = $paystack->createCustomer("Ogechi", "Okezie", "ogechi@gmail.com", "08032356781");

 } 
 catch (Exception $err) {
     echo $err . PHP_EOL;
     $customer = null;
 }
 
 var_dump($customer);


