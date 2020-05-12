<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// Import Class Validasi Request
use App\Http\Requests\API\ApiCheckRequest;

// Import DB Model
use App\Models\Product;
use App\Models\Transaction;


class ApiCheckoutController extends Controller
{
    public function checkout(ApiCheckRequest $request)
    {
        $data = $request->except('detail_transaction');

        $data['code'] = 'Trx' . time();

        $trancation = Transaction::create($data);

        $trancation->products()->attach($request->detail_transaction);

        foreach ($request->detail_transaction as $product) {

            Product::find($product)->decrement('stock');
        }

        if (!empty($trancation)) {

            return ResponsFormatter::succes($product, 'Data berhasil ditampilkan');

        } else return ResponsFormatter::failed($product, 'Data gagal ditampilkan');


    }


}
