<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\allCourses;
use App\Http\Controllers\Admin\allClasses;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FaqController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', function () {
    return response()->json([
        "error" => 'User Unauthenticated',
    ])->setStatusCode(403);
});



Route::get('admin', function () {
    redirect('admin/dashboard');
});

Route::group(['prefix' => 'admin'], function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('courses', [allCourses::class, 'index'])->name('allCourses');
    Route::get('add-course', [allCourses::class, 'add'])->name('add-Courses');
    Route::get('classes', [allClasses::class, 'index'])->name('allClasses');
    Route::post('saveClass', [allClasses::class, 'saveClass'])->name('saveClass');
    Route::post('updateClass', [allClasses::class, 'updateClass'])->name('updateClass');
    Route::get('deleteClass/{id}', [allClasses::class, 'deleteClass'])->name('deleteClass');
    Route::get('editClass/{id}', [allClasses::class, 'editClass'])->name('editClass');
    Route::get('subjects', [SubjectController::class, 'index'])->name('allSubjects');
    Route::get('chapters', [ChapterController::class, 'index'])->name('allChapters');
    Route::get('lessons', [LessonController::class, 'index'])->name('allLessons');
    Route::get('users', [UserController::class, 'index'])->name('usersList');
    Route::get('faqs', [FaqController::class, 'index'])->name('allFaq');
    Route::get('add-subject', [SubjectController::class, 'add'])->name('add-subject');
    Route::post('save-subject', [SubjectController::class, 'save'])->name('save-subject');
    Route::get('chapters', [ChapterController::class, 'index'])->name('all-chapters');
});