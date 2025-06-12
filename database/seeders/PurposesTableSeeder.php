<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurposesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('purposes')->insert([
            // Library
            ['faculty_id' => 1, 'name' => 'Borrowing Books'],
            ['faculty_id' => 1, 'name' => 'Library Orientation'],
        
            // Registrar
            ['faculty_id' => 2, 'name' => 'Enrollment Verification'],
            ['faculty_id' => 2, 'name' => 'Transcript Request'],
        
            // Clinic
            ['faculty_id' => 3, 'name' => 'Medical Consultation'],
            ['faculty_id' => 3, 'name' => 'Health Check-up'],
        
            // Student Affairs
            ['faculty_id' => 4, 'name' => 'Student Counseling'],
            ['faculty_id' => 4, 'name' => 'Extracurricular Activities'],
        
            // Career Services
            ['faculty_id' => 5, 'name' => 'Career Counseling'],
            ['faculty_id' => 5, 'name' => 'Job Placement Assistance'],
        
            // Natural Sciences
            ['faculty_id' => 6, 'name' => 'Lab Experiments'],
            ['faculty_id' => 6, 'name' => 'Field Trips'],
        
            // Mathematics
            ['faculty_id' => 7, 'name' => 'Math Tutoring'],
            ['faculty_id' => 7, 'name' => 'Math Competitions'],
        
            // Social Sciences
            ['faculty_id' => 8, 'name' => 'Social Research Projects'],
            ['faculty_id' => 8, 'name' => 'Community Outreach'],
        
            // Computer Science
            ['faculty_id' => 9, 'name' => 'Coding Workshops'],
            ['faculty_id' => 9, 'name' => 'Tech Seminars'],
        
            // Business Administration
            ['faculty_id' => 10, 'name' => 'Business Planning'],
            ['faculty_id' => 10, 'name' => 'Marketing Strategy'],
        
            // Hospitality Management
            ['faculty_id' => 11, 'name' => 'Hospitality Training'],
            ['faculty_id' => 11, 'name' => 'Event Management'],
        
            // Accountancy
            ['faculty_id' => 12, 'name' => 'Accounting Workshops'],
            ['faculty_id' => 12, 'name' => 'Financial Audits'],
        
            // Entrepreneurship
            ['faculty_id' => 13, 'name' => 'Startup Incubation'],
            ['faculty_id' => 13, 'name' => 'Business Plan Competitions'],
        
            // Civil Engineering
            ['faculty_id' => 14, 'name' => 'Site Surveys'],
            ['faculty_id' => 14, 'name' => 'Structural Analysis'],
        
            // Electrical Engineering
            ['faculty_id' => 15, 'name' => 'Electrical Safety Training'],
            ['faculty_id' => 15, 'name' => 'Circuit Design'],
        
            // Mechanical Engineering
            ['faculty_id' => 16, 'name' => 'Mechanical Design Projects'],
            ['faculty_id' => 16, 'name' => 'Automobile Workshops'],
        
            // Computer Engineering
            ['faculty_id' => 17, 'name' => 'Computer Hardware Design'],
            ['faculty_id' => 17, 'name' => 'Network Security'],
        
            // Electronics Engineering
            ['faculty_id' => 18, 'name' => 'Electronics Projects'],
            ['faculty_id' => 18, 'name' => 'Robotics Workshops'],
        
            // Agriculture
            ['faculty_id' => 19, 'name' => 'Agricultural Field Work'],
            ['faculty_id' => 19, 'name' => 'Crop Management'],
        
            // Fisheries
            ['faculty_id' => 20, 'name' => 'Fisheries Management'],
            ['faculty_id' => 20, 'name' => 'Aquaculture Training'],
        
            // Animal Science
            ['faculty_id' => 21, 'name' => 'Animal Health Care'],
            ['faculty_id' => 21, 'name' => 'Veterinary Services'],
        
            // Agroforestry
            ['faculty_id' => 22, 'name' => 'Agroforestry Projects'],
            ['faculty_id' => 22, 'name' => 'Sustainable Practices'],
        
            // Political Science
            ['faculty_id' => 23, 'name' => 'Political Analysis'],
            ['faculty_id' => 23, 'name' => 'Government Workshops'],
        
            // Sociology
            ['faculty_id' => 24, 'name' => 'Social Research'],
            ['faculty_id' => 24, 'name' => 'Community Development'],
        
            // Philosophy
            ['faculty_id' => 25, 'name' => 'Philosophy Seminars'],
            ['faculty_id' => 25, 'name' => 'Ethical Debates'],
        
            // Psychology
            ['faculty_id' => 26, 'name' => 'Psychological Counseling'],
            ['faculty_id' => 26, 'name' => 'Mental Health Workshops'],
        
            // Nursing
            ['faculty_id' => 27, 'name' => 'Nursing Practicum'],
            ['faculty_id' => 27, 'name' => 'Health Clinics'],
        
            // Pharmacy
            ['faculty_id' => 28, 'name' => 'Pharmacy Workshops'],
            ['faculty_id' => 28, 'name' => 'Medication Counseling'],
        
            // Medical Technology
            ['faculty_id' => 29, 'name' => 'Lab Testing'],
            ['faculty_id' => 29, 'name' => 'Diagnostic Services'],
        
            // Public Health
            ['faculty_id' => 30, 'name' => 'Public Health Campaigns'],
            ['faculty_id' => 30, 'name' => 'Community Health Programs'],
        ]);
        
    }
}
