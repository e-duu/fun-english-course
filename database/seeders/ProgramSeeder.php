<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::truncate();
        
        $programs = [
            [
                'name' => 'English For Children'
            ],
            [
                'name' => 'English For Teens'
            ],
            [
                'name' => 'English For Business'
            ],
            [
                'name' => 'English Conversation'
            ],
            [
                'name' => 'English Test Preparation'
            ],
            [
                'name' => 'Test / Exam'
            ],
           
        ];

        foreach ($programs as $program) {
           Program::create($program);
        }
    }
}
