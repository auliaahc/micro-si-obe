<?php

use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\JoinClassController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/classes', [CourseClassController::class, 'create']);
// Route::get('/course', [CourseClassController::class, 'getAllClass']);
Route::post('/joinClass', [JoinClassController::class,'store']);
Route::get('/joinClass', [JoinClassController::class,'index']);
Route::get('/joinClass/{course_class_id}', [JoinClassController::class,'show']);

Route::delete('/class/{id}', [CourseClassController::class, 'deleteClass']);
Route::delete('/class/{idClass}/student/{id}', [JoinClassController::class, 'deleteMemberClass']);
Route::get('/user', [JoinClassController::class,'getUsers']);
Route::get('/classes/search-id/{courseId}', [CourseClassController::class, 'getClassesByCourseId'])->name('courses.searchByCourseId');
Route::put('/classes/{id}', [CourseClassController::class, 'editCourseClass']);
Route::get('/classes/search-name/{name}', [CourseClassController::class, 'getClassesBySearchName']);



