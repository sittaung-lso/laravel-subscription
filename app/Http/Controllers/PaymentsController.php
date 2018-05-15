<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    public function pay(Request $request, $plan)
    {
        Auth::user()->newSubscription('primary', $plan)->create($request->stripeToken);

        return redirect('/home');
    }
}
