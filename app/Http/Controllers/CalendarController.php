<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;

class CalendarController extends Controller
{
    public function show(Request $request)
    {
        $ip = $request->ip();

        // Проверка наличия данных для текущего IP
        $userData = DB::table('user_quotes')->where('ip_address', $ip)->first();

        if ($userData) {
            // Если данные есть, используем их
            $quoteOrder = json_decode($userData->quote_order);
        } else {
            // Иначе создаем новый порядок цитат
            $allQuotes = DB::table('quotes')->pluck('id')->toArray();
            $lastQuote = array_pop($allQuotes); // Убираем последнюю цитату из массива
            shuffle($allQuotes); // Перемешиваем остальные цитаты
            $quoteOrder = $allQuotes;
            $quoteOrder[] = $lastQuote; // Добавляем последнюю цитату в конец

            // Сохраняем порядок в базу данных
            DB::table('user_quotes')->insert([
                'ip_address' => $ip,
                'quote_order' => json_encode($quoteOrder),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        
        $quotes = DB::table('quotes')->whereIn('id', $quoteOrder)->orderByRaw('FIELD(id, ' . implode(',', $quoteOrder) . ')')->get();

        
        $timezone = $request->session()->get('timezone', 'UTC'); 
        $currentTime = now($timezone);

        return view('indexx', compact('quotes', 'currentTime'));
    }
}
