<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    public function pay(Request $request, $plan)
    {
        $user = Auth::user();

        if ($user->subscribed('primary')) {
            $user->subscription('primary')->swap($plan);
        } else {
            Auth::user()->newSubscription('primary', $plan)->trialDays(14)->
            withCoupon('10off')->create($request->stripeToken);
        }

        return redirect('/home');
    }

    public function cancel()
    {
        // user will un-subscribed but carry the rest of his times.
        Auth::user()->subscription('primary')->cancel();

        // user will become never subscribed before.
//        Auth::user()->subscription('primary')->cancelNow();

        return redirect('/home');
    }
}
