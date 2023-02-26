<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Services\CartService;
class testController extends Controller
{
    //
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index()
    {
        //
        $categories= Category::all();
        $products=Product::all();
        $cart = $this->cartService->getFromCookie();
        return view('frontend.componants.onlineorder')->with([
            'categories'=> $categories,
            'cart'=>$cart,
        ]);
    }

    public function test()
    {

    }
}
