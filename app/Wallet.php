<?php

namespace App;

use App\User;
use App\Wallet;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wallets';

    /**
     * Get the user record associated with the wallet.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the transactions for the wallet.
     */
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

}
