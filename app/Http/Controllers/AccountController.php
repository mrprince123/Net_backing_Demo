<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index()
    {
        $account = account::all();
        $data = compact('account');
        return view('Pages.account')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->validate(
            [
                'account_number' => 'required|unique:accounts',
                'balance' => 'required'
            ]
        );

        $account = new account();
        $account->account_number =  $request['account_number'];
        $account->balance =  $request['balance'];
        $account->save();

        return redirect('Pages.account');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = account::find($id);
        $data = compact('account');
        return view('Pages.oneAccout')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = account::find($id);
        $data = compact('account');
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
        $request->validate(
            [
                'account_number' => 'required|unique:accounts, account_number,' . $id,
                'balance' => 'required'
            ]
        );

        $account = account::find($id);
        $account->account_number =  $request['account_number'];
        $account->balance =  $request['balance'];
        $account->save();

        return redirect('Pages.account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = account::find($id);

        if (!is_null($account)) {
            $account->delete();
        };

        return redirect('Pages.account');
    }
}
