<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // Student routes
    Route::middleware(['role:student'])->prefix('student')->name('student.')->group(function () {
        Route::view('dashboard', 'pages.student.dashboard')->name('dashboard');
        Route::view('material', 'pages.student.materials.index')->name('material');
        Route::view('quiz', 'pages.student.quiz')->name('quiz');
        Route::view('grade', 'pages.student.reports.index')->name('grade');
    });

    // Teacher routes
    Route::middleware(['role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
        Route::view('dashboard', 'pages.teacher.dashboard')->name('dashboard');
        Route::view('materials', 'pages.teacher.materials')->name('materials');
        Route::view('quizzes', 'pages.teacher.quizzes')->name('quizzes');
    });

    // Admin routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::view('dashboard', 'pages.admin.dashboard')->name('dashboard');
        Route::view('users', 'pages.admin.users')->name('users');
        Route::view('departments', 'pages.admin.departments')->name('departments');
    });
});

require __DIR__ . '/settings.php';
