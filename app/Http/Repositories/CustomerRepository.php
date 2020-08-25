<?php


namespace App\Http\Repositories;


use App\Customer;

class CustomerRepository
{
    protected $customer;
    public function __construct(Customer $customer)
    {
        $this->customer= $customer;
    }
}
