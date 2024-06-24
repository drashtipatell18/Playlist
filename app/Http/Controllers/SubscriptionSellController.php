<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionSell;
use App\Models\Subscription;
use App\Models\User;
use App\Models\VideoGroup;
use App\Models\Video;

class SubscriptionSellController extends Controller
{
    public function subscriptionsell()
    {
        $subscriptionsells = SubscriptionSell::with(['user', 'videoGroup', 'video', 'subscription'])->get();
        return view('subscriptionsell.view_subscriptionsell', compact('subscriptionsells'));
    }

    public function createSubscriptionsell()
    {
        $users = User::pluck('name', 'id');
        $groups = VideoGroup::pluck('group_name', 'id');
        $videos = Video::pluck('video_course_name', 'id');
        $subscriptions = Subscription::pluck('plan_name', 'id');
        return view('subscriptionsell.create_subscriptionsell', compact('users', 'groups', 'videos', 'subscriptions'));
    }

    public function storeSubscriptionsell(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required',
            'user_id' => 'required',
            'group_id' => 'required',
            'video_id' => 'required',
            'validity' => 'required',
            'price' => 'required',
            'payment_id' => 'required',
        ]);

        SubscriptionSell::create([
            'subscription_id' => $request->input('subscription_id'),
            'user_id' => $request->input('user_id'),
            'group_id' => $request->input('group_id'),
            'video_id' => $request->input('video_id'),
            'validity' => $request->input('validity'),
            'price' => $request->input('price'),
            'payment_id' => $request->input('payment_id'),
        ]);

        session()->flash('success', 'Subscription Sell added successfully!');
        return redirect()->route('subscriptionsell');
    }

    public function editSubscriptionsell($id)
    {
        $subscriptionsell = SubscriptionSell::find($id);
        $users = User::pluck('name', 'id');
        $groups = VideoGroup::pluck('group_name', 'id');
        $videos = Video::pluck('video_course_name', 'id');
        $subscriptions = Subscription::pluck('plan_name', 'id');
        return view('subscriptionsell.create_subscriptionsell', compact('subscriptionsell', 'users', 'groups', 'videos', 'subscriptions'));
    }

    public function updateSubscriptionsell(Request $request, $id)
    {
        $request->validate([
            'subscription_id' => 'required',
            'user_id' => 'required',
            'group_id' => 'required',
            'video_id' => 'required',
            'validity' => 'required',
            'price' => 'required',
            'payment_id' => 'required',
        ]);
        $subscriptionsell = SubscriptionSell::find($id);

        $subscriptionsell->update([
            'subscription_id' => $request->input('subscription_id'),
            'user_id' => $request->input('user_id'),
            'group_id' => $request->input('group_id'),
            'video_id' => $request->input('video_id'),
            'validity' => $request->input('validity'),
            'price' => $request->input('price'),
            'payment_id' => $request->input('payment_id'),
        ]);

        session()->flash('success', 'Subscription Sell Update successfully!');
        return redirect()->route('subscriptionsell');
    }

    public function destroySubscriptionsell($id)
    {
        $subscriptionsell = SubscriptionSell::find($id);
        $subscriptionsell->delete();
        return redirect()->route('subscriptionsell')->with('danger', 'Subscription Sell delete successfully.');
    }
}
