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
          'photo' => "{{ asset('/images/avatar-1.jpg') }}",
        ],
        [
          'name' => 'Admin',
          'username' => 'admin',
          'email' => 'admin@admin',
          'password' => 'admin123',
          'role' => 'admin',
          'photo' => "{{ asset('/images/avatar-1.jpg') }}",
        ],
        [
          'name' => 'Teacher',
          'username' => 'teacher',
          'email' => 'teacher@teacher',
          'password' => '1234',
          'role' => 'teacher',
          'photo' => "{{ asset('/images/avatar-1.jpg') }}",
        ],
        [
          'name' => 'Student',
          'username' => 'student',
          'email' => 'student@student',
          'password' => '1234',
          'role' => 'student',
          'photo' => "{{ asset('/images/avatar-1.jpg') }}",
        ],
      
      ];

      foreach ($recipients as $recipient) {
          User::create($recipient);
      }
    }
}
