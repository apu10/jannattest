<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Image;
use App\Models\Payment;
use App\Models\Spice;
use App\Models\Address;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        


        $spices = Spice::factory()->create([
            'name'=>'Medium',
            'icon'=>"<i class=\'fas fa-pepper-hot\' style=\'font-size:48px;color:red\'></i>",
        ]);
        $spices = Spice::factory()->create([
            'name'=>'Hot',
            'icon'=>'<i class=\'fas fa-pepper-hot\' style=\'font-size:48px;color:red\'></i><i class=\'fas fa-pepper-hot\' style=\'font-size:48px;color:red\'></i>',

        ]);
        $spices = Spice::factory()->create([
            'name'=>'Very Hot',
            'icon'=>'<i class=\'fas fa-pepper-hot\' style=\'font-size:48px;color:red\'></i><i class=\'fas fa-pepper-hot\' style=\'font-size:48px;color:red\'></i><i class=\'fas fa-pepper-hot\' style=\'font-size:48px;color:red\'></i>',

        ]);
    $address= Address::factory(20)->create();
    $users= User::factory(20)
        ->create()
        ->each(function($user)use ($address){
            $image = Image::factory()
                ->user()
                ->make();
            $user->images()->save($image);
        });
    $orders = Order::factory(10)

        ->make()
        ->each(function ($order) use ($users){
            $order->customer_id =  $users->random()->id;
            $order->save();

            $payment= Payment::factory()->make();
            $order->payment()->save($payment);



        });
        $spices= Spice::all();
        $carts = Cart::factory(20)->create();
        $categories = Category::factory(10)->create();
        $products = Product::factory(50)
            ->create()
            ->each(function ($product) use ($orders, $carts, $categories){
                $product->category_id = $categories->random();
                $order = $orders->random();
                $order->products()->attach([
                    $product->id =>['quantity'=>mt_rand(1,3)]
                ]);
                $cart = $carts->random();
                $cart->products()->attach([
                    $product->id =>['quantity'=>mt_rand(1,3)]
                ]);

                $images= Image::factory(mt_rand(2,4))->make();
                $product->images()->saveMany($images);

            });


    }
}
