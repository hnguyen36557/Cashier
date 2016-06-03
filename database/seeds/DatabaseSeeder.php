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
        App\User::truncate();
        App\Product::truncate();
        App\Cart::truncate();

        factory(App\Product::class, 10)->create();
        factory(App\User::class, 10)->create()->each(function ($user) {
            $user->cart()->saveMany(
                factory(App\Cart::class, 2)->make()
            );
        });
    }
}
