<?php

namespace App\Services\Student;

use App\Models\User;

class StudentProfileService
{
    /**
     * Create a new class instance.
     */
    public function getProfile(User $student): User
    {
        return $student->load([
            'studentClass.department',
            'roles',
        ]);
    }

    public function updateProfile(User $student, array $data): User
    {
        $student->update([
            'name' => $data['name'],
            'student_class_id' => $data['student_class_id'] ?? $student->student_class_id,
        ]);

        return $student->refresh();
    }
}
