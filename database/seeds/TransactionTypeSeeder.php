<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTypeSeeder extends Seeder
{

    private $transactionTypes = [
        'Depósito',
        'Saque',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->transactionTypes as $transactionType) {
            DB::table('transaction_types')->insert([
                'name' => $transactionType,
                'created_at' => now(),
            ]);
        }
    }
}
