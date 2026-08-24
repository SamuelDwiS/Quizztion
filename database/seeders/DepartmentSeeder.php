<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Software Engineer',
                'code' => 'SE-12'
            ],
            [
                'name' => 'Networking and Telecomunication',
                'code' => 'NT-336'
            ],
            [
                'name' => 'Computer Science',
                'code' => 'CS-144'
            ],
            [
                'name' => 'AI Engineer',
                'code' => 'AE-481'
            ],
            [
                'name' => 'Database Engineer',
                'code' => 'DE-452'
            ],
            [
                'name' => 'IT Bussiness Analyst',
                'code' => 'ITBA-485'
            ],

        ];
        foreach ($departments as $department) {
            Department::updateOrCreate(
                [
                    'name' => $department['name'],
                    'code' => $department['code']
                ],
            );
        }
    }
}
