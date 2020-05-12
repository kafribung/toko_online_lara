<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import Class DB Transaction
use App\Models\Transaction;

class ApiTransactionController extends Controller
{
    public function transaction(Request $requrst, $id=null)
    {
        $code = $requrst->input('code');

        if (!empty($code)){
            $transaction =  Transaction::with('products')->where('code' , $code)->first();

            return ResponsFormatter::succes($transaction, 'Data berhasil ditampilkan');
        }else if($id != null) {
            $transaction =  Transaction::with('products')->find($id);

            return ResponsFormatter::succes($transaction, 'Data berhasil ditampilkan');
        } else return ResponsFormatter::failed('Data gagal ditampilkan !');

    }
}
