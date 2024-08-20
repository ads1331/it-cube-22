<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendDailyQuotes;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionConfirmation;
use Illuminate\Support\Facades\Artisan;

class SubscriptionController extends Controller
{
    public function create()
    {
        return view('subscribe');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        $subscription = Subscription::create($validated);

       // Mail::to($request->email)->send(new SubscriptionConfirmation());

        return redirect()->back()->with('success', 'You have been subscribed!'); 
    }
    public function sendDailyQuotes()
    {
        SendDailyQuotes::dispatch();

        // Перенаправление обратно с сообщением
        return redirect()->back()->with('status', 'Daily quotes are being sent!');
    }
}

