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
                'photo' => 'this is a dummy photo',
                'lesson_id' => '1'
            ],
            [
                'title' => 'Lesson 1 Greetings – Video',
                'content' => 'this is a dummy link for content',
                'photo' => 'this is a dummy photo',
                'lesson_id' => '1'
            ],
            [
                'title' => 'Lesson 1 Greetings – Listening',
                'content' => 'this is a dummy link for content',
                'photo' => 'this is a dummy photo',
                'lesson_id' => '1'
            ],
            [
                'title' => 'Lesson 1 Greetings – Matching Exercise',
                'content' => 'this is a dummy link for content',
                'photo' => 'this is a dummy photo',
                'lesson_id' => '1'
            ],
            
            [
                'title' => 'Lesson 1 Greetings – Multiple Choice Exercise',
                'content' => 'this is a dummy link for content',
                'photo' => 'this is a dummy photo',
                'lesson_id' => '1'
            ],
            
            
        ];

        foreach ($materials as $material) {
           Material::create($material);
        }
    }
}
