<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\allClasses;
use App\Http\Controllers\Admin\allCourses;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SaveController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\SubjectController;
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
    //Dashboard
    Route::view('dashboard', 'dashboard')->name('dashboard');
    //All Courses
    Route::get('courses', [allCourses::class, 'index'])->name('allCourses');
    Route::get('add-course', [allCourses::class, 'add'])->name('add-Courses');
    Route::post('save-course', [allCourses::class, 'saveCourse'])->name('save-course');
    Route::get('edit-course/{id}', [allCourses::class, 'editCourse'])->name('edit-course');
    Route::post('update-course', [allCourses::class, 'updateCourse'])->name('update-course');
    Route::get('delete-course/{id}', [allCourses::class, 'deleteCourse'])->name('delete-course');
    //Classes
    Route::get('classes', [allClasses::class, 'index'])->name('allClasses');
    Route::post('saveClass', [allClasses::class, 'saveClass'])->name('saveClass');
    Route::post('updateClass', [allClasses::class, 'updateClass'])->name('updateClass');
    Route::get('deleteClass/{id}', [allClasses::class, 'deleteClass'])->name('deleteClass');
    Route::get('editClass/{id}', [allClasses::class, 'editClass'])->name('editClass');
    //Lessons
    Route::get('lessons', [LessonController::class, 'index'])->name('allLessons')->name('allLessons');
    Route::get('addLessons', [LessonController::class, 'add'])->name('addLesson');
    Route::post('saveLessons', [LessonController::class, 'save'])->name('saveLesson');
    //User
    Route::get('users', [UserController::class, 'index'])->name('usersList');
    //FAQs
    Route::get('faqs', [FaqController::class, 'index'])->name('allFaq');
    Route::get('add-faq', [FaqController::class, 'add'])->name('add-faq');
    Route::post('save-faq', [FaqController::class, 'saveFaq'])->name('save-faq');
    Route::get('edit-faq/{id}', [FaqController::class, 'editFaq'])->name('edit-faq');
    Route::post('update-faq/{id}', [FaqController::class, 'updateFaq'])->name('update-faq');
    Route::get('delete-faq/{id}', [FaqController::class, 'deleteFaq'])->name('delete-faq');
    //Subjects
    Route::get('subjects', [SubjectController::class, 'index'])->name('allSubjects');
    Route::get('add-subject', [SubjectController::class, 'add'])->name('add-subject');
    Route::post('save-subject', [SubjectController::class, 'save'])->name('save-subject');
    Route::post('update-subject', [SubjectController::class, 'updateSubject'])->name('update-subject');
    Route::get('delete-subject/{id}', [SubjectController::class, 'deleteSubject'])->name('delete-subject');
    Route::get('edit-subject/{id}', [SubjectController::class, 'editSubject'])->name('edit-subject');
    //Chapters
    Route::get('chapters', [ChapterController::class, 'index'])->name('all-chapters');
    Route::get('add-chapter/{id?}', [ChapterController::class, 'add'])->name('add-chapter');
    Route::post('save-chapter', [ChapterController::class, 'save'])->name('save-chapter');
    Route::get('edit-chapter/{id}', [ChapterController::class, 'edit'])->name('edit-chapter');
    Route::post('update-chapter', [ChapterController::class, 'updateChapter'])->name('update-chapter');
    //Save Chapter
    Route::post('save-video', [SaveController::class, 'saveVideo'] )->name('saveVideo');
});