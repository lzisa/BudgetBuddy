<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
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

        $category = new Category();
        $category->title='KFZ';
        $category->color='#123456';
        $category->save();

        $cat_uncategorized = new Category();
        $cat_uncategorized->title='Unkategorisiert';
        $cat_uncategorized->color='#9f75h';
        $cat_uncategorized->save();

        $sub_uncategorized= new Subcategory();
        $sub_uncategorized->title='unkategorisiert';
        $sub_uncategorized->category()->associate($cat_uncategorized);
        $sub_uncategorized->save();

        $subcategory= new Subcategory();
        $subcategory->title='tanken';
        $subcategory->category()->associate($category);
        $subcategory->save();

        $transaction = new Transaction();
        $transaction->title="Hofer Einkauf";
        $transaction->amount=4;
        $transaction->user()->associate($user);
        $transaction->subcategory()->associate($subcategory);
        $transaction->save();

        $transaction2 = new Transaction();
        $transaction2->title="T-Shirt H&M";
        $transaction2->amount=4;
        $transaction2->user()->associate($user);
        $transaction2->subcategory()->associate($subcategory);
        $transaction2->save();

        $transaction3 = new Transaction();
        $transaction3->title="Tanken";
        $transaction3->amount=80;
        $transaction3->user()->associate($user2);
        $transaction3->subcategory()->associate($subcategory);
        $transaction3->save();
    }
}
