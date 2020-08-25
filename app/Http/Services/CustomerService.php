<?php


namespace App\Http\Services;


use App\Http\Repositories\CustomerRepository;

class CustomerService
{
    protected $customerRepo;
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepo = $customerRepository;
    }
}
