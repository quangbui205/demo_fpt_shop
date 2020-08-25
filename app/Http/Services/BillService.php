<?php


namespace App\Http\Services;


use App\Http\Repositories\BillRepository;

class BillService
{
    protected $billRepo;
    public function __construct(BillRepository $billRepository)
    {
        $this->billRepo= $billRepository;
    }

    public function getAll()
    {
        return $this->billRepo->getAll();
    }

    public function findById($id)
    {
        return $this->billRepo->findById($id);
    }
}
