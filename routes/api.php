<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\Api\PasswordController;
use App\Http\Controllers\Api\ClassesController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\Courses;
use App\Http\Controllers\Api\ChapterController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\FaqController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => 'Api'], function (){

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('reg1', [AuthController::class, 'reg1'])->name('reg1');
Route::post('password/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('password/reset', [AuthController::class, 'passwordReset']);
Route::post('updatePassword', [AuthController::class, 'updatePassword']);


Route::post('changePassword', [PasswordController::class, 'changePassword']);
Route::post('logout', [PasswordController::class, 'logout'])->name('logout');

Route::post('UserProfileSave', [UserProfileController::class, 'saveProfile']);
Route::get('currentUser', [UserProfileController::class, 'index']);

Route::get('allClasses', [ClassesController::class, 'allClasses']);

Route::get('allSubjects', [SubjectController::class, 'allSubjects']);
Route::get('subjectCourses/{subject}', [SubjectController::class, 'subjectCourses']);


Route::get('allCourses', [Courses::class, 'allCourses']);
Route::get('single_course/{id}', [Courses::class, 'single_course']);
Route::get('SliderCourses', [Courses::class, 'SliderCourses']);
Route::get('PopularCourses', [Courses::class, 'PopularCourses']);
Route::get('searchCourses/{keyword}', [Courses::class, 'searchCourses']);

Route::get('courseChapters/{id?}', [ChapterController::class, 'courseChapters']);

Route::get('lessons/{id?}', [LessonController::class, 'ChapterLessons']);

Route::get('faqs', [FaqController::class, 'allFaqs']);
});

