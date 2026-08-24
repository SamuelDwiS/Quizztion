<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\StudentClass;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $se = Department::where('code', 'SE-12')->first();
        $nt = Department::where('code', 'NT-336')->first();
        $cs = Department::where('code', 'CS-144')->first();
        $ae = Department::where('code', 'AE-481')->first();
        $de = Department::where('code', 'DE-452')->first();
        $itba = Department::where('code', 'ITBA-485')->first();

        $student_clasess = [
          // Vocations High School
            [
                'level' => 'SMK',
                'department_id' => $se->id,
            ],
            [
                'level' => 'SMK',
                'department_id' => $nt->id,
            ],
            // College Level
            [
                'level' => 'University',
                'department_id' => $se->id,
            ],
            [
                'level' => 'University',
                'department_id' => $nt->id,
            ],
            [
                'level' => 'University',
                'department_id' => $cs->id,
            ],
            [
                'level' => 'University',
                'department_id' => $ae->id,
            ],
            [
                'level' => 'University',
                'department_id' => $de->id,
            ],
            [
                'level' => 'University',
                'department_id' => $itba->id,
            ],

        ];

        foreach ($student_clasess as $sc) {
            StudentClass::updateOrCreate(
                [
                    'level' => $sc['level'],
                    'department_id' => $sc['department_id'],
                ],
            );
        }
    }
}
