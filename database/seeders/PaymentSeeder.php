<?php

namespace Database\Seeders;

use App\Models\Payment;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::truncate();
        
        $f = Factory::create('en_EN');
				foreach (range(0, 10) as $index) {
					Payment::create([
						'amount' => $f->randomNumber(),
						'evidence' => $f->name(),
						'note' => $f->text(),
						'user_id' => $f->numberBetween(1, 10),
						'program_id' => $f->numberBetween(1, 10),
						'level_id' => $f->numberBetween(1, 10),
						'recipient_id' => $f->numberBetween(1, 10)
					]);
				}
    }
}
