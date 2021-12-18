<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::truncate();
      
      $recipients = [
        [
          'name' => 'Desy Andriani',
          'username' => 'desyandriani007',
          'email' => 'desy@gmail.com',
          'password' => '1234',
          'role' => 'admin',
          'photo' => "1638542338.jpeg",
        ],
        [
          'name' => 'Admin',
          'username' => 'admin',
          'email' => 'admin@admin',
          'password' => '1234',
          'role' => 'admin',
          'photo' => "admin.jpg",
        ],
        [
          'name' => 'Teacher',
          'username' => 'teacher',
          'email' => 'teacher@teacher',
          'password' => '1234',
          'role' => 'teacher',
          'photo' => "1638542338.jpeg",
        ],
        [
          'name' => 'Student',
          'username' => 'student',
          'email' => 'student@student',
          'password' => '1234',
          'role' => 'student',
          'photo' => "1638542338.jpeg",
        ],
      
      ];

      foreach ($recipients as $recipient) {
          User::create($recipient);
      }
    }
}
