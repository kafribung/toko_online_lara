<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

// Import DB Product
use App\Models\Product;

class ApiProductController extends Controller
{
    public function all(Request $request)
    {
        $id        = $request->input('id');
        $slug      = $request->input('slug');
        $nama      = $request->input('name');
        $type      = $request->input('type');
        $priceUp   = $request->input('price_Up');
        $priceDown  = $request->input('price_Down');

        if (!empty($id)) {

            $product = Product::with('galleries')->findOrFail($id);

            return $this->succes($product, 'Data berhasil ditampilkan');

        }

        if (!empty($slug)) {

            $product = Product::with('galleries')->where('slug', $slug)->first();

            return $this->succes($product, 'Data berhasil ditampilkan');

        }


        $product = Product::with('galleries');

        if (!empty($nama)) {
            $product = $product->where('name', 'LIKE', '%' . $nama . '%')->first();

            return $this->succes($product, 'Data berhasil ditampilkan');
        }

        if (!empty($type)) {
            $product = $product->where('type', 'LIKE', '%' . $type . '%')->get();
            return $this->succes($product, 'Data berhasil ditampilkan');
        }

        if (!empty($priceUp)) {
            $product = $product->where('price', '>=', $priceUp)->get();
            return $this->succes($product, 'Data berhasil ditampilkan');
        }

        if (!empty($priceDown)) {
            $product = $product->where('price', '<=', $priceDown)->get();
            return $this->succes($product, 'Data berhasil ditampilkan');
        }

        $product = $product->get();
        return $this->succes($product, 'Data berhasil ditampilkan');




        return $this->failed('Data gagal ditampilkan !');
    }



    // Method Respone JSON
    public function succes($data, $msg)
    {
        $response = [
            'meta' => [
                'code'   => 200,
                'status' => 'succes',
                'msg'    => $msg,
            ],

            'data' => $data
        ];

        return response()->json($response);
    }

    public function failed($msg)
    {
        $response = [
            'meta' => [
                'code'   => 400,
                'status' => 'failed !',
                'msg'    => $msg,
            ],

            'data' => null
        ];

        return response()->json($response);
    }
}
