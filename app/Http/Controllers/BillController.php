<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Http\Services\BillService;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $billService;
    public function __construct(BillService $billService)
    {
        $this->billService = $billService;
    }

    public function index()
    {
        $bills = $this->billService->getAll();
        return view('bill.list-bill',compact('bills'));
    }

    public function viewDetail($id)
    {
        $bill = $this->billService->findById($id);
        $detail = Detail::where('bill_id', $id)->get();
        return view('bill.bill-detail', compact('bill', 'detail'));
    }
}
