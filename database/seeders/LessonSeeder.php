<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Faker\Factory;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::truncate();
        
        $lessons = [

            [
                'name' => 'Lesson 1',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 2',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 3',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 4',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 5',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 6',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 7',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 8',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 9',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 10',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 11',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 12',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 13',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 14',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 15',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 16',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 17',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 18',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 19',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 20',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 21',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 22',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 23',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 24',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 25',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 26',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 27',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 28',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 29',
                'level_id' => '1'
            ],
            [
                'name' => 'Lesson 30',
                'level_id' => '1'
            ],
            
        ];

        foreach ($lessons as $lesson) {
           Lesson::create($lesson);
        }
    }
}
