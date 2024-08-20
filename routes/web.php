<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\SubscriptionController;



Route::get('/', [CalendarController::class, 'show'])->name('index');


Route::get('/subscribe', [SubscriptionController::class, 'create'])->name('subg');
Route::post('/subscribe', [SubscriptionController::class, 'store']);

Route::get('/send-daily-quotes', [SubscriptionController::class, 'sendDailyQuotes'])->name('send.daily.quotes');
