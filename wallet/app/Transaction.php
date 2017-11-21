<?php

namespace App;

use App\Wallet;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'wallet_id', 'debit', 'credit'
    ];

    /**
     * Get the wallet record associated with the tranaction.
     */
    public function wallet()
    {
        return $this->belongsTo('App\Wallet');
    }
}
