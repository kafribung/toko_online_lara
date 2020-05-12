<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import Class Validasi Transaction
use App\Http\Requests\TransactionRequest;


// Import DB Transaction
use App\Models\Transaction;

class TransactionController extends Controller
{
    //READ
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'DESC')->get();

        return view('dashboard.transaction', compact('transactions'));
    }

    // Transaksi
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    //SHOW
    public function show($id)
    {
        $transaction = Transaction::with('products')->findOrfail($id);

        return view('dashboard.show_transaction', compact('transaction'));
    }


    //
    public function edit($id)
    {
        $transaction = Transaction::findOrfail($id);

        return view('dashboardEdit.transaction_edit', compact('transaction'));
    }

    //UPDATE
    public function update(TransactionRequest $request, $id)
    {
        $transaction = $request->all();

        Transaction::findOrFail($id)->update($transaction);

        return redirect('/transaction')->with('msg', 'Transaki Berhasil di Ubah !');
    }

    //DELETE
    public function destroy($id)
    {
        Transaction::destroy($id);

        return redirect('/transaction')->with('msg', 'Transaksi Berhasil di Hapus !');
    }

    //CHANGE STATUS
    public function status(Request $request, $id)
    {
        $request->validate([
            'status' => ['required', 'string']
        ]);

        Transaction::findOrFail($id)->update([
            'status_transaction' => $request->status
        ]);

        return redirect('/transaction')->with('msg', 'Status Berhasil di rubah');
    }
}
