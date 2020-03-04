<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catalog\Accounting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountingsController extends Controller
{
    public function index()
    {
        $accountings = Accounting::paginate(25);
        return \view('admin.accountings.index', compact('accountings'));
    }
}
