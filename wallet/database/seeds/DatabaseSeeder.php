<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
        	'id' => 1,
            'email' => 'john@wallet.io',
            'password' => bcrypt(str_random(8)),
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('wallets')->insert([
        	'id' => 1,
        	'user_id' => 1,
        	'balance' => (271 - 92 - 83),
        	'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        ]);


    	DB::table('transactions')->insert([
        	'wallet_id' => 1,
        	'debit' => 271,
        	'created_at' => date('Y-m-d H:i:s', time()),
        	'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('transactions')->insert([
        	'wallet_id' => 1,
        	'debit' => 92,
        	'created_at' => date('Y-m-d H:i:s', time()),
        	'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        DB::table('transactions')->insert([
        	'wallet_id' => 1,
        	'credit' => 83,
        	'created_at' => date('Y-m-d H:i:s', time()),
        	'updated_at' => date('Y-m-d H:i:s', time())
        ]);
        
    }
}
