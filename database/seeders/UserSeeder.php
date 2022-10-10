<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
          'photo' => "1638542390.jpg",
        ],
        [
          'name' => 'Admin',
          'username' => 'admin',
          'email' => 'admin@admin',
          'password' => '1234',
          'role' => 'admin',
          'photo' => "1638542390.jpg",
        ],
        [
          'name' => 'Teacher',
          'username' => 'teacher',
          'email' => 'teacher@teacher',
          'password' => '1234',
          'role' => 'teacher',
          'photo' => "1638542390.jpg",
        ],
        [
          'name' => 'Student',
          'username' => 'student',
          'email' => 'student@student',
          'password' => '1234',
          'role' => 'student',
          'photo' => "1638542390.jpg",
        ],
      
      ];

      foreach ($recipients as $recipient) {
          User::create($recipient);
      }

      $faker = Factory::create();
        foreach (range(1,15) as $item) {
            User::create([
              'name' => $faker->name,
              'username' => 'student'.$item,
              'email' => 'student'.$item.'@example.test',
              'password' => Hash::make('1234'),
              'role' => 'student',
              'photo' => $faker->randomNumber($nbDigits = NULL, $strict = false).'jpg',
            ]);
        }

        $faker = Factory::create();
        foreach (range(1,15) as $item) {
            User::create([
              'name' => $faker->name,
              'username' => 'teacher'.$item,
              'email' => 'teacher'.$item.'@example.test',
              'password' => Hash::make('1234'),
              'role' => 'teacher',
              'photo' => $faker->randomNumber($nbDigits = NULL, $strict = false).'jpg',
            ]);
        }

        $faker = Factory::create();
        foreach (range(1,15) as $item) {
            User::create([
              'name' => $faker->name,
              'username' => 'admin'.$item,
              'email' => 'admin'.$item.'@example.test',
              'password' => Hash::make('1234'),
              'role' => 'admin',
              'photo' => $faker->randomNumber($nbDigits = NULL, $strict = false).'jpg',
            ]);
        }
    }
}
