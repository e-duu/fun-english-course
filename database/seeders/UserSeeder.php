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
        
        $f = Factory::create('en_EN');
				foreach (range(0, 10) as $index) {
					User::create([
						'name' => $f->name(),
						'username' => $f->userName(),
						'password' => $f->password(),
						'email' => $f->email(),
						'role' => $f->randomElement(['admin', 'teacher', 'student']),
						'photo' => $f->text(),
					]);
				}
    }
}
