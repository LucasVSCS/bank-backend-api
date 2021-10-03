<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountTypeSeeder extends Seeder
{
    private $accountTypes = [
        'Poupança',
        'Corrente',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->accountTypes as $accountType) {
            DB::table('account_types')->insert([
                'name' => $accountType,
                'created_at' => now(),
            ]);
        }
    }
}
