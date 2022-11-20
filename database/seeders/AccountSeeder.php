<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::truncate();
      
      $recipients = [
        [
          'name' => 'Desy Andriani',
          'number' => '10001001',
          'username' => 'desyandriani007',
          'email' => 'desy1@gmail.com',
          'password' => Hash::make('1234'),
          'role' => 'admin_head',
          'photo' => "1638542390.jpg",
        ],
        [
          'name' => 'Admin',
          'number' => '10001002',
          'username' => 'admin',
          'email' => 'admin1@admin',
          'password' => Hash::make('1234'),
          'role' => 'admin_staff',
          'photo' => "1638542390.jpg",
        ],
        [
          'name' => 'Teacher',
          'number' => '10001003',
          'username' => 'teacher',
          'email' => 'teacher1@teacher',
          'password' => Hash::make('1234'),
          'role' => 'teacher',
          'photo' => "1638542390.jpg",
        ],
        [
          'name' => 'Student',
          'number' => '10001004',
          'username' => 'student',
          'email' => 'student1@student',
          'password' => Hash::make('1234'),
          'role' => 'student',
          'photo' => "1638542390.jpg",
        ],
      
      ];

      foreach ($recipients as $recipient) {
          Account::create($recipient);
      }
    }
}
