<?php

namespace Database\Seeders;

use App\Models\Material;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::truncate();
        
        $materials = [

            [
                'title' => 'Lesson 1 Greetings – Presentation',
                'content' => 'this is a dummy link for content',
                'photo' => '1638542390.jpg',
                'lesson_id' => '1',
                'is_accessible_by_student' => 0,
            ],
            [
                'title' => 'Lesson 1 Greetings – Video',
                'content' => 'this is a dummy link for content',
                'photo' => '1638542390.jpg',
                'lesson_id' => '1',
                'is_accessible_by_student' => 0,
            ],
            [
                'title' => 'Lesson 1 Greetings – Listening',
                'content' => 'this is a dummy link for content',
                'photo' => '1638542390.jpg',
                'lesson_id' => '1',
                'is_accessible_by_student' => 0,
            ],
            [
                'title' => 'Lesson 1 Greetings – Matching Exercise',
                'content' => 'this is a dummy link for content',
                'photo' => '1638542390.jpg',
                'lesson_id' => '1',
                'is_accessible_by_student' => 0,
            ],
            
            [
                'title' => 'Lesson 1 Greetings – Multiple Choice Exercise',
                'content' => 'this is a dummy link for content',
                'photo' => '1638542390.jpg',
                'lesson_id' => '1',
                'is_accessible_by_student' => 0,
            ],
            
            
        ];

        foreach ($materials as $material) {
           Material::create($material);
        }
    }
}
