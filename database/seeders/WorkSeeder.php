<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Work::create([
            'id' => 1,
            'name' => 'Business'
        ]);
        Work::create([
            'id' => 2,
            'name' => 'Health'
        ]);
        Work::create([
            'id' => 3,
            'name' => 'Nature'
        ]);
        Work::create([
            'id' => 4,
            'name' => 'Science'
        ]);
        Work::create([
            'id' => 5,
            'name' => 'Social'
        ]);
        Work::create([
            'id' => 6,
            'name' => 'Economy'
        ]);
    }
}
