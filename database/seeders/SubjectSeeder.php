<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Subject;

class SubjectSeeder extends Seeder
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

        $subjects = [
            [
                'name' => 'Software Engineering Introduction',
                'department_id' => $se->id,
            ],
            [
                'name' => 'Analyst Requirements of Software',
                'department_id' => $se->id,
            ],
            [
                'name' => 'Software Modeling',
                'department_id' => $se->id,
            ],
            [
                'name' => 'Introduction of Database',
                'department_id' => $de->id,
            ],
            [
                'name' => 'Database and Standarization',
                'department_id' => $de->id,
            ],
            [
                'name' => 'Database and Bussiness Application',
                'department_id' => $de->id,
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::updateOrCreate(
                [
                    'name' => $subject['name'],
                    'department_id' => $subject['department_id'],
                ],
            );
        }
    }
}
