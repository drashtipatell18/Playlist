<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionSell;

class SubscriptionSellController extends Controller
{
    public function subscriptionsell(){
     $subscriptionsell = SubscriptionSell::all();
     return view('subscriptionsell.view_subscriptionsell',compact('subscriptionsell'));
    }

    public function createSubscriptionsell(){

    }

    public function storeSubscriptionsell(){

    }

    public function editSubscriptionsell(){

    }

    public function updateSubscriptionsell(){

    }

    public function destroySubscriptionsell(){
        
    }
}
