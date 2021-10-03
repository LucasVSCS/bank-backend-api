<?php

use App\AccountType;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = User::take(1)->first();
        $accountType = AccountType::take(1)->first();

        DB::table('accounts')->insert([
            'account_number' => strtoupper(Str::random(8)),
            'current_balance' => rand(10, 5000),
            'user_id' => $userId->id,
            'account_type_id' => $accountType->id,
            'created_at' => now(),
        ]);
    }
}
