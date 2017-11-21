<?php

namespace App\Http\Controllers;

use App\User;
use App\Wallet;
use App\Transaction;
use Illuminate\Http\Request;
use App\Exceptions\CustomException;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function add(Request $request)
    {

        try {

            $user = User::where('email', $request->email)->first();
            if(!$user) {
                throw new CustomException("There is no user with email {$request->email}.");
            }
            $wallet = Wallet::where('user_id', $user->id)->first();
            if(!$wallet) {
                throw new CustomException("There is no wallet with email {$request->email}.");
            }
            $data = [
                'wallet_id' => $wallet->id,
                'debit' => $request->amount,
                'credit' => 0
            ];

            $transaction_id = $this->create($data);
            return response()->json(['id' => $transaction_id]);

        } catch (\Exception $e) {
            if($e instanceof CustomException) {
                \App::abort(403, $e->getMessage());
            }
            \App::abort(403, "Unable to add credits for user using email {$request->email}.");
        }
        
    }

    public function deduct(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if(!$user) {
                throw new CustomException("There is no user with email {$request->email}.");
            }
            $wallet = Wallet::where('user_id', $user->id)->first();
            if(!$wallet) {
                throw new CustomException("There is no wallet with email {$request->email}.");
            }

            $data = [
                'wallet_id' => $wallet->id,
                'debit' => 0,
                'credit' => $request->amount
            ];

            $transaction_id = $this->create($data);
            return response()->json(['id' => $transaction_id]);
        } catch (\Exception $e) {
            if($e instanceof CustomException) {
                \App::abort(403, $e->getMessage());
            }
            \App::abort(403, "Unable to deduct credits for user using email {$request->email}.");
        }
    }

    private function getBalance($wallet_id)
    {
        $wallet = Wallet::where('id',$wallet_id)->first();
        return $wallet->balance;
    }

    private function updateBalance($wallet_id, $change)
    {
        $initial_balance = $this->getBalance($wallet_id);
        $new_balance = $initial_balance + $change;
        Wallet::where('id', $wallet_id)->update(array('balance' => $new_balance));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function create($data)
    {
        $transaction = new Transaction;
        $transaction->wallet_id = $data['wallet_id'];
        $transaction->debit = $data['debit'];
        $transaction->credit = $data['credit'];
        $transaction->save();

        if($data['debit'] > 0) {
            $this->updateBalance($data['wallet_id'], $data['debit']);
        }
        if($data['credit'] > 0) {
            $this->updateBalance($data['wallet_id'], -$data['credit']);
        }

        return $transaction->id;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
