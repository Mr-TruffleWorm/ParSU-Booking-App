<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faculties')->insert([
            // Administrative Offices
            ['name' => 'Ann Charmaine B. Visitacion', 'department_id' => 1],
            ['name' => 'Joji B. Miraña', 'department_id' => 2],
            ['name' => 'Dr. Daiko aram Cledera', 'department_id' => 3],
            ['name' => 'Leny Robredo', 'department_id' => 4],
            ['name' => 'Robert Johnson', 'department_id' => 5],

            // CECS
            ['name' => 'Sarah Wilson', 'department_id' => 10],
            ['name' => 'Thomas Moore', 'department_id' => 11],
            ['name' => 'Jennifer Lee', 'department_id' => 12],
            ['name' => 'Nicolas A. Pura', 'department_id' => 13],

            // College of Business and Management
            ['name' => 'Amanda Turner', 'department_id' => 20],
            ['name' => 'James White', 'department_id' => 21],
            ['name' => 'Laura Martinez', 'department_id' => 22],
            ['name' => 'Daniel Brown', 'department_id' => 23],

            // College of Engineering and Technology
            ['name' => 'Richard Wilson', 'department_id' => 24],
            ['name' => 'Susan Green', 'department_id' => 25],
            ['name' => 'Matthew Anderson', 'department_id' => 26],
            ['name' => 'Linda Moore', 'department_id' => 27],
            ['name' => 'Christopher Taylor', 'department_id' => 28],

            // College of Agriculture and Fisheries
            ['name' => 'Patricia Brown', 'department_id' => 29],
            ['name' => 'Charles Johnson', 'department_id' => 30],
            ['name' => 'Jessica Garcia', 'department_id' => 31],
            ['name' => 'Steven Martinez', 'department_id' => 32],

            // College of Social Sciences and Philosophy
            ['name' => 'Andrew Adams', 'department_id' => 33],
            ['name' => 'Samantha Thomas', 'department_id' => 34],
            ['name' => 'Rachel Turner', 'department_id' => 35],
            ['name' => 'Benjamin Harris', 'department_id' => 36],

            // College of Health Sciences
            ['name' => 'Kimberly Wilson', 'department_id' => 37],
            ['name' => 'Michael Anderson', 'department_id' => 38],
            ['name' => 'Lisa Garcia', 'department_id' => 39],
            ['name' => 'Jason Taylor', 'department_id' => 40],
        ]);

    }
}