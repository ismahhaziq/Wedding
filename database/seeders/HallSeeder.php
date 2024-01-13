<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hall;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hall_seed = [
            ['lecture_hall_name'=>'BK1', 'lecture_hall_place'=>'Bilik Kuliah Blok A'],
            ['lecture_hall_name'=>'BK2', 'lecture_hall_place'=>'Bilik Kuliah Blok A'],
            ['lecture_hall_name'=>'BK3', 'lecture_hall_place'=>'Bilik Kuliah Blok A'],
            ['lecture_hall_name'=>'BK4', 'lecture_hall_place'=>'Bilik Kuliah Blok A'],
            ['lecture_hall_name'=>'BK5', 'lecture_hall_place'=>'Bilik Kuliah Blok A'],
            ['lecture_hall_name'=>'BK6', 'lecture_hall_place'=>'Bilik Kuliah Blok A'],
            ['lecture_hall_name'=>'BK7', 'lecture_hall_place'=>'Bilik Kuliah Blok A'],
            ];

            foreach ($hall_seed as $hall_seed)
            {
                Hall::firstOrCreate($hall_seed);
            }
    
    }
}
