<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Models\User;
use Illuminate\Console\Command;

class CommandUpdatePayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan to update payment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        $billing = Student::where('status', 'pending')->whereDate('dateEnd', '<', now())->get();
        
        $billing->update([
            'status' => 'unpaid', 
            'date' => null, 
            'dateEnd' => null
        ]);

        $user = User::where('id', 45)->get();
        $user->update([
            'parent' => 'Dede Sunandar',
            'city' => 'Jakarta',
            'country' => 'Indonesia',
        ]);

        $this->info('Hourly Update has been send successfully');
    }

}
