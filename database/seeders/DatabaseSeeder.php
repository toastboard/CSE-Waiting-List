<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->times(20)
            ->create();
        DB::table('courses')->insert([
            'field' => "CSE",
            'course_number' => "4733",
            'course_name' => 'Intro to Algorithms',
        ]);
        DB::table('courses')->insert([
            'field' => "CSE",
            'course_number' => "3213",
            'course_name' => 'Software Engineering Senior Project 1',
        ]);
    }
}
