<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            ['id' => 1, 'name' => 'Library'],
            ['id' => 2, 'name' => 'Registrar'],
            ['id' => 3, 'name' => 'Clinic'],
            ['id' => 4, 'name' => 'Student Affairs'],
            ['id' => 5, 'name' => 'Career Services'],
            ['id' => 6, 'name' => 'Financial Aid'],
            ['id' => 7, 'name' => 'Admissions'],
            ['id' => 8, 'name' => 'International Programs'],
            ['id' => 9, 'name' => 'Languages and Communication'],
            ['id' => 10, 'name' => 'Natural Sciences'],
            ['id' => 11, 'name' => 'Mathematics'],
            ['id' => 12, 'name' => 'Social Sciences'],
            ['id' => 13, 'name' => 'Computer Science'],
            ['id' => 14, 'name' => 'Information Technology'],
            ['id' => 15, 'name' => 'Information Systems'],
            ['id' => 16, 'name' => 'Elementary Education'],
            ['id' => 17, 'name' => 'Secondary Education'],
            ['id' => 18, 'name' => 'Early Childhood Education'],
            ['id' => 19, 'name' => 'Special Education'],
            ['id' => 20, 'name' => 'Business Administration'],
            ['id' => 21, 'name' => 'Hospitality Management'],
            ['id' => 22, 'name' => 'Accountancy'],
            ['id' => 23, 'name' => 'Entrepreneurship'],
            ['id' => 24, 'name' => 'Civil Engineering'],
            ['id' => 25, 'name' => 'Electrical Engineering'],
            ['id' => 26, 'name' => 'Mechanical Engineering'],
            ['id' => 27, 'name' => 'Computer Engineering'],
            ['id' => 28, 'name' => 'Electronics Engineering'],
            ['id' => 29, 'name' => 'Agriculture'],
            ['id' => 30, 'name' => 'Fisheries'],
            ['id' => 31, 'name' => 'Animal Science'],
            ['id' => 32, 'name' => 'Agroforestry'],
            ['id' => 33, 'name' => 'Political Science'],
            ['id' => 34, 'name' => 'Sociology'],
            ['id' => 35, 'name' => 'Philosophy'],
            ['id' => 36, 'name' => 'Psychology'],
            ['id' => 37, 'name' => 'Nursing'],
            ['id' => 38, 'name' => 'Pharmacy'],
            ['id' => 39, 'name' => 'Medical Technology'],
            ['id' => 40, 'name' => 'Public Health'],
        ]);
    }
}
