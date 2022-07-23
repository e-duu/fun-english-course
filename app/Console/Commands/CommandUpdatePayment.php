<?php

namespace App\Console\Commands;

use App\Models\Student;
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
        $jobs = Student::where('status', 'pending')->whereDate('dateEnd', '<', now())->update(['status' => 'unpaid', 'date' => null, 'dateEnd' => null]);
    }
}
