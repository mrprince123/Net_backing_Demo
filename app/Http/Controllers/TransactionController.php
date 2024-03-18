<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = transaction::all();
        $data = compact('transactions');
        return view('Pages.transaction')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $request->validate([
            'amount' => 'required',
            'type' => 'required',
            'description' => 'required'
        ]);

        $transaction = new transaction();
        $transaction->amount = $request['amount'];
        $transaction->type = $request['type'];
        $transaction->description = $request['description'];
        $transaction->save();

        return redirect('Pages.transaction');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = transaction::find($id);
        $data = compact('transaction');
        return view('Pages.oneTransaction')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = transaction::find($id);
        $data = compact('transaction');
        return view('')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required',
            'type' => 'required',
            'description' => 'required'
        ]);

        $transaction = transaction::find($id);
        $transaction->amount = $request['amount'];
        $transaction->type = $request['type'];
        $transaction->description = $request['description'];
        $transaction->save();

        return redirect('');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = transaction::find($id);
        if (!is_null($transaction)) {
            $transaction->delete();
        }

        return redirect('Pages.transaction');
    }
}
