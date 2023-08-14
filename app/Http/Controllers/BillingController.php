<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class BillingController extends Controller
{
    public function index() {
        $transactions = Transaction::where('user_id', auth()->user()->id)->get();
        return view('provider.billing', compact('transactions'));
    }
}
