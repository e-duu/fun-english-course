<?php

namespace App\Console;

use App\Models\SppMonth;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // $schedule->call(function () {

        //     $spp = SppMonth::where('status', 'pending')->where('user_id', auth()->user()->id)->get();
        //     $spp->query()
        //         ->where('date', '<', today()->subDays(1))
        //         ->update(['status' => 'unpaid']);
        // })->daily();
        $schedule->call(function () {
            Student::where('status', 'pending')
                ->whereDate('dateEnd', '<', now())
                ->update([
                    'status' => 'unpaid',
                    'date' => null,
                    'dateEnd' => null,
                ]);
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
