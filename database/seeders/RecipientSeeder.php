<?php

namespace Database\Seeders;

use App\Models\Recipient;
use Faker\Factory;
use Illuminate\Database\Seeder;

class RecipientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipient::truncate();
        
        $recipients = [

            [
                'name' => 'Bank Rakyat Indonesia (BRI)',
                'code' => '002',
            ],
            
            [
                'name' => 'Bank Mandiri',
                'code' => '008',
            ],

        ];

        foreach ($recipients as $recipient) {
            Recipient::create($recipient);
        }
    }
}
