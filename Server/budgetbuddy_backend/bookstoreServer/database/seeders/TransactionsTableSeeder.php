<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'user';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();

        $user2 = new User();
        $user2->name = 'lzisa';
        $user2->email = 'lisazeitlhofer.lz@gmail.com';
        $user2->password = bcrypt('secret');
        $user2->save();

        $transaction = new Transaction();
        $transaction->title="Hofer Einkauf";
        $transaction->amount=4;
        $transaction->user()->associate($user);
        $transaction->save();

        $transaction2 = new Transaction();
        $transaction2->title="T-Shirt H&M";
        $transaction2->amount=4;
        $transaction2->user()->associate($user);
        $transaction2->save();

        $transaction3 = new Transaction();
        $transaction3->title="Tanken";
        $transaction3->amount=80;
        $transaction3->user()->associate($user2);
        $transaction3->save();

    }
}
