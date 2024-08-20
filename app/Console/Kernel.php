<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        \App\Console\Commands\SendDailyQuotes::class,
    ];
    
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('send:daily-quotes')->dailyAt('13:00');
    }
}
