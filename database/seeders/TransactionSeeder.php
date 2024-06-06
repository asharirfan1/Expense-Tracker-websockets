<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $names = [
            'Shoe',
            'Bills',
            'Grocery',
            'Electronics',
            'Clothing',
            'Books',
            'Furniture',
            'Toys',
            'Medicine',
            'Food'
        ];

        $transactions = [];

        foreach ($names as $name) {
            $transactions[] = [
                'name' => $name,
                'amount' => mt_rand(100, 10000) / 100, // random amount between 1.00 and 100.00 rupees
            ];
        }

        DB::table('transactions')->insert($transactions);
    }
}
