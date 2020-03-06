<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catalog\Accounting;
use App\Models\Catalog\Status;
use App\Models\Catalog\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountingsController extends Controller
{
    public function index()
    {
        $accountings = Accounting::query();
        if(\request()->filled('status')){
            $accountings = $accountings->where('status_id', \request('status'));
        }
        if(\request()->filled('supplier')){
            $accountings = $accountings->where('supplier_id', \request('supplier'));
        }
        $amount = $accountings->pluck('amount');
        $amount = array_sum($amount->toArray());
        return \view('admin.accountings.index', [
            'accountings' => $accountings->paginate(10),
            'statuses' =>  Status::get(),
            'suppliers' => Supplier::get(),
            'amount' => $amount,
        ]);
    }
}
