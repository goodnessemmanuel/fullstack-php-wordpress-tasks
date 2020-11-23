<?php
/**
 * Customer service
 */

interface CustomerService {    

    /**
     * createCustomer
     *
     * @param  mixed $first_name
     * @param  mixed $last_name
     * @param  mixed $email
     * @param  mixed $phone
     * @return Customer
     */
    public function createCustomer(string $first_name, string $last_name, string $email, string $phone): Customer;   

    /**
     * getCustomers
     *
     * @return array
     */
    public function getCustomers(): array;
}