<?php


namespace App\Http\Repositories;


use App\Bill;

class BillRepository
{
    protected $bill;
    public function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    public function getAll()
    {
        return $this->bill->all();
    }

    public function findById($id)
    {
        return $this->bill->findOrFail($id);
    }
}
