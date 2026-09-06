<?php

namespace App\Providers;

use App\Services\Student\StudentMaterialService;
use App\Services\Student\StudentProfileService;
use Illuminate\Container\Attributes\Scoped;
use Illuminate\Support\ServiceProvider;

class StudentService extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->scoped(StudentProfileService::class);
        $this->app->scoped(StudentMaterialService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // 
    }
}
