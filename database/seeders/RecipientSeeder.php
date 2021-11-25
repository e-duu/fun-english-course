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
        [
            'name' => 'Bank Negara Indonesia (BNI)',
            'code' => 200,
        ],
        [
            'name' => "Bank Sinarmas",
            'code' => 153,
        ],
        [
            'name' => "Bank Permata",
            'code' => 013,
        ],
        [
            'name' => "Bank Central Asia (BCA)",
            'code' => 014,
        ],
        ];

        foreach ($recipients as $recipient) {
            Recipient::create($recipient);
        }
    }
}
