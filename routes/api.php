<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/query-build', function(){
//     try {
//         $students = DB::table('students') -> get();
//         return response() -> json($students); 
//     } catch (\Exception $e) {
//        return response()->json(['error' => $e -> getMessage()], 500); 
//     }
// });
Route::get('/query-build', function(){
    $teachers = DB::table('teachers') -> select('teachers.*', DB::raw('COUNT(students.id) as student_count')) -> leftJoin('students', 'teachers.id', '=', 'students.teacher_id') -> groupBy('teachers.id') -> orderBy('student_count', 'DESC') -> limit(5) -> get();
    return response() -> json($teachers); 
});