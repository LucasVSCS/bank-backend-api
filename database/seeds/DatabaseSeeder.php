<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccountTypeSeeder::class);
        $this->call(TransactionTypeSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(AccountSeeder::class);
    }
}
