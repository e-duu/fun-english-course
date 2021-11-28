<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::truncate();

        $levels = [
            [
                'name' => 'EFC Starter',
                'program_id' => '1',
                'slug' => 'efc-starter'
            ],
            [
                'name' => 'EFC Beginner I - Level 1',
                'program_id' => '1',
                'slug' => 'efc-beginner-i-level-1'
            ],
            [
                'name' => 'EFC Beginner I - Level 2',
                'program_id' => '1',
                'slug' => 'efc-beginner-i-level-2'
            ],
            [
                'name' => 'EFC Beginner I - Level 3',
                'program_id' => '1',
                'slug' => 'efc-beginner-i-level-3'
            ],
            [
                'name' => 'EFC Elementary I - Level 1',
                'program_id' => '1',
                'slug' => 'efc-elementary-i-level-1'
            ],
            [
                'name' => 'EFC Elementary I - Level 2',
                'program_id' => '1',
                'slug' => 'efc-elementary-i-level-2'
            ],
            [
                'name' => 'EFC Elementary I - Level 3',
                'program_id' => '1',
                'slug' => 'efc-elementary-i-level-3'
            ],
            [
                'name' => 'EFC Elementary II - Level 1',
                'program_id' => '1',
                'slug' => 'efc-elementary-ii-level-1'
            ],
            [
                'name' => 'EFC Elementary II - Level 2',
                'program_id' => '1',
                'slug' => 'efc-elementary-ii-level-2'
            ],
            [
                'name' => 'EFC Elementary II - Level 3',
                'program_id' => '1',
                'slug' => 'efc-elementary-ii-level-3'
            ],
           
        ];

        foreach ($levels as $level) {
           Level::create($level);
        }
    }
}
