<?php

namespace App\Services\Student;

use App\Models\Material;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentMaterialService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getMaterials() {}
    public function getMaterialDetail() {}
    public function updateProgress(){}
    public function markAsComplete(){}
    public function generateAiSummary(){}
    // public function paginateFor(User $student, int $perPage = 9): LengthAwarePaginator
    // {
    //     if (!$student->studentClass()) {
    //         return Material::query()
    //             ->with(['subject.department', 'author'])
    //             ->whereHas('subject', function ($query) use ($student) {
    //                 $query->where(
    //                     'department_id',
    //                     $student->studentClass?->department_id
    //                 );
    //             })
    //             ->latest()
    //             ->paginate($perPage);
    //     }
    // }
}
