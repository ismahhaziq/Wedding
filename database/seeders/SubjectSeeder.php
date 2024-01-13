<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subject_seed = [
            ['subject_code'=>'1', 'subject_name'=>'hhah', 'lecturer_name'=>'afdan'],

            ];

            foreach ($subject_seed as $subject_seed)
            {
                Subject::firstOrCreate($subject_seed);
            }
    }
}
