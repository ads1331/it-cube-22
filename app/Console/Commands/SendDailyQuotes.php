<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;
use App\Mail\DailyQuote;

class SendDailyQuotes extends Command
{
    protected $signature = 'send:daily-quotes';
    protected $description = 'Send daily quotes to subscribers';

    public function handle()
    {
        $subscriptions = Subscription::all();
        $quote = "Наступил новый день, стоит зайти и посмотреть что мы для вас приготовили";

        foreach ($subscriptions as $subscription) {
            Mail::to($subscription->email)->send(new DailyQuote($quote));
            $this->info("Email sent to {$subscription->email}");
        }

        $this->info('Daily quotes have been sent!');
    }
}