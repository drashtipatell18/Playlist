<?php

namespace App\Http\Controllers;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscription(){
        $subscriptions = Subscription::all();
        return view('subscription.view_subscription',compact('subscriptions'));
    }
    public function createSubscription(){
        return view('subscription.create_subscription');
    }
    public function storeSubscription(Request $request){
        $request->validate([
            'plan_name' => 'required',
            'duration' => 'required',
        ]);

        Subscription::create([
            'plan_name' => $request->input('plan_name'),
            'duration' => $request->input('duration'),
            'description' => $request->input('description'),
        ]);

        session()->flash('success', 'Subscription added successfully!');
        return redirect()->route('subscription');
    }
    public function editSubscription($id){
        $subscription = Subscription::find($id);
        return view('subscription.create_subscription', compact('subscription'));
    }
    public function updateSubscription(Request $request, $id){
        $request->validate([
            'plan_name' => 'required',
            'duration' => 'required',
        ]);
        $subscription = Subscription::find($id);
        $subscription->update([
            'plan_name' => $request->input('plan_name'),
            'duration' => $request->input('duration'),
            'description' => $request->input('description'),
        ]);

        session()->flash('success', 'Subscription Updated successfully!');
        return redirect()->route('subscription');
    }

    public function destroySubscription($id){
        $subscription = Subscription::find($id);
        $subscription->delete();
        return redirect()->route('subscription')->with('danger', 'Subscription delete successfully.');
    }
}
