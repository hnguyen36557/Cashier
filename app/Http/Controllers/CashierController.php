<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Stripe\Stripe;


class CashierController extends Controller
{

    public function index(User $user) {
        $user = Auth::user();
        return view('cart', compact('user'));
    }

    public function store(User $user) {
        Stripe::setApiKey('sk_test_Bnvo5RaqwOTx3hdyNvkZbSlw');
        $total = Auth::user()->cart->sum(function ($cart) {
            return $cart->product->price * $cart->quantity;
        });


        $user->charge($total * 100, ['source' => Input::get('stripeToken')]);


        return 'Charged';
    }
}
