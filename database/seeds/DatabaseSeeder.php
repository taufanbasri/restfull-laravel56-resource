<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();

        User::flushEventListeners();
        Category::flushEventListeners();
        Product::flushEventListeners();
        Transaction::flushEventListeners();

        factory(User::class, 1000)->create();
        factory(Category::class, 30)->create();
        factory(Product::class, 30)->create()->each(function ($product) {
            $categories = Category::all()->random(mt_rand(1,5))->pluck('id');

            $product->categories()->attach($categories);
        });
        factory(Transaction::class, 1000)->create();
    }
}
