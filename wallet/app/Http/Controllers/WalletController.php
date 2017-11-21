<?php

namespace App\Http\Controllers;

use App\User;
use App\Wallet;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Exceptions\CustomException;

class WalletController extends Controller
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

    private function createUser($email = null)
    {
        if(!$email) {
            return false;
        }

        $user = new User;
        $user->email = $email;
        $user->password = bcrypt(str_random(8));
        $user->save();

        return $user->id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StoreUserRequest $request)
    {
        
        $user_id = $this->createUser($request->email);

        $wallet = new Wallet;
        $wallet->user_id = $user_id;
        $wallet->save();

        return response()->json(['id' => $wallet->id]);
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
    public function show($email)
    {
        $user = User::where('email', $email)->first();
        if(!$user) {
            throw new CustomException("There is no user with email {$email}.");
        }
        $wallet = Wallet::where('user_id', $user->id)->first();
        if(!$user) {
            throw new CustomException("There is no wallet with email {$email}.");
        }
        $transactions = Transaction::where('wallet_id', '=', $wallet->id)->orderBy('created_at', 'desc')->limit(3)->get();

        return response()->json([
            'email' => $email,
            'balance' => $wallet->balance,
            'transactions' => $transactions->toArray()
        ]);

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
    public function destroy(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if(!$user) {
                throw new CustomException("There is no user with email {$request->email}.");
            }
            User::destroy($user->id);
            $wallet = Wallet::where('user_id', $user->id)->first();
            if(!$user) {
                throw new CustomException("There is no wallet with email {$request->email}.");
            }
            Wallet::destroy($wallet->id);

            return response()->json(['id' => $wallet->id]);

        } catch (\Exception $e) {
            if($e instanceof CustomException) {
                \App::abort(403, $e->getMessage());
            }
            \App::abort(403, "Unable to delete wallet for user using email {$request->email}.");
        }

    }
}
