<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $group_seed = [
            ['name'=>'Acap', 'part'=>'1'],
            ['name'=>'Haziq', 'part'=>'2'],
            ['name'=>'Hakim', 'part'=>'3'],
            ['name'=>'Ismah',  'part'=>'4'],
            ['name'=>'Akmal', 'part'=>'5'],
            ];

            foreach ($group_seed as $group_seed)
            {
                Group::firstOrCreate($group_seed);
            }
    }
}
