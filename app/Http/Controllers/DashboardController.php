<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import Db yg Login
use Auth;

// Impport Db Transaction
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function dashboard() {
        $user           = Auth::user();

        $laba           = Transaction::where('status_transaction', 'SUKSES')->sum('total_transaction');

        $tot_penjualan  = Transaction::where('status_transaction', 'SUKSES')->count();

        $transactions   = Transaction::where('status_transaction', 'SUKSES')->orderBy('id', 'DESC')->get();

        $chart          = [
            'SUKSES' => Transaction::where('status_transaction', 'SUKSES')->count(),
            'PENDING' => Transaction::where('status_transaction', 'PENDING')->count(),
            'GAGAL' => Transaction::where('status_transaction', 'GAGAL')->count(),
        ];


        return view('dashboard.dashboard', compact('user', 'laba', 'tot_penjualan', 'transactions', 'chart'));
    }
}
