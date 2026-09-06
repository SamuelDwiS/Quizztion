<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Providers\StudentService;
use Illuminate\Http\Request;

class StudentMaterialController extends Controller
{

    protected $studentService;
    protected $studentMaterialService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function show($id)
    {
        $material = Material::with('subject')->findOrFail($id);
        
    }    

}
