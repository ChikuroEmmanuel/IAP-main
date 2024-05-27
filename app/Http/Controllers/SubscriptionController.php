<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Drugs;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{

    public function index(){
        $drugs = Drugs::orderBy("created_at","desc")->paginate(10);
        return view("subscribe",compact("drugs"));
    }
    // app/Http/Controllers/SubscriptionController.php
    public function showSubscriptionForm()
    {
        return view('subscription.form');
    }
    public function subscribe(Request $request)
    {
        $user = Auth::user();
        $plan = $request->input('plan');

        // Implement logic to validate the plan, calculate expiration, etc.

        $subscription =new Subscription([
            'user_id' => $user->id,
            'plan' => $plan,
            'expires_at' => now()->addMonths(1), // Example: subscribe for 1 month
        ]);
        

        return response()->json(['message' => 'Subscription successful', 'subscription' => $subscription]);
    }
    
    public function getSubscriptions()
    {
        $user = Auth::user();

        // Retrieve subscriptions for the current user
        $subscriptions = Subscription::where('user_id', $user->id)->get();

        return response()->json(['subscriptions' => $subscriptions]);
    }
}

 