<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Order::factory(10)->create();
        $this->call ([
            UserSeeder::class,
            AccountSeeder::class,
            ProgramSeeder::class,
            LevelSeeder::class,
            LessonSeeder::class,
            MaterialSeeder::class,
            RecipientSeeder::class,
        ]);
    }
}
