<?php
require './settings.php';

$customer_service = new CustomerService();

/* $customer = $customer_service->create("Chidi", "Okobia", "chidi@xmail.com", "09098786754");

if($customer !== null){
    echo "customer created successfully";
    var_dump($customer);
} */

$customers = $customer_service->getCustomers();
var_dump($customers);

