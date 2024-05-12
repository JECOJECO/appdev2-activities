<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/02_laboratory_querybuilder/query-build', function(){
    $students = DB::table('students') -> get(); //dito SQL syntax
    return response() -> json($students); 
});

//Task1
// $students = DB::table('students') -> get();

//Task2
//$students = DB::table('students')->where('grade', '10')->get();

//Task3
//$students = DB::table('students') -> where('age', [15, 18])->get();

//Task4
//$students = DB::table('students') -> where('city', 'Manila')->get();

//Task5
//$students = DB::table('students') -> orderby('age', 'DESC')->get();

//Task6
//$students = DB::table('students') -> select('students.*', 'teachers.name as teacher_name') -> leftJoin('teachers', 'students.teacher_id', '=', 'teachers.id') ->get();

//Task7
//$teachers = DB::table('teachers') -> select('teachers.*', DB::raw('COUNT(students.id) as student_count')) -> leftJoin('students', 'teachers.id', '=', 'students.teacher_id') ->groupBy('teachers.id') ->get();

//Task8
//$students = DB::table('students') -> select('students.*', 'subjects.name as subject_name') -> join('subjects', 'students.subject_id', '=', 'subjects.id') ->get();

//Task9
//$students = DB::table('students') -> select('students.*', DB::raw('AVG(scores.score) as average_score')) -> leftJoin('scores', 'students.id', '=', 'scores.student_id') -> groupBy('students.id') ->get();

//Task10
//$teachers = DB::table('teachers') -> select('teachers.*', DB::raw('COUNT(students.id) as student_count')) -> leftJoin('students', 'teachers.id', '=', 'students.teacher_id') -> groupBy('teachers.id') -> orderBy('student_count', 'DESC') -> limit(5) -> get();


//SELECT teachers.*, COUNT(students.id) AS student_count FROM teachers LEFT JOIN students ON teachers.id = students.teacher_id GROUP BY teachers.id ORDER BY student_count DESC LIMIT 5;