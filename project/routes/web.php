<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MarksController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Helpers\TeachStudHelper;

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

//routy dla kazdego
Route::get('/', function () {
    return view('welcome')->with("btn", "aktualnosci");
});

Route::get('/aktualnosci', [WelcomeController::class, 'aktualnosci']);
Route::get('/patron', [WelcomeController::class, 'patron']);
Route::get('/kontakt', [WelcomeController::class, 'kontakt']);

//routy ogólne dla auth
Route::middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

//routy dla admina
Route::middleware(['auth','verified','role:1'])->group(function () {
    Route::resource('/students', StudentController::class);
    Route::resource('/teachers', TeacherController::class);
    Route::resource('/activity', ActivityController::class);
    Route::put('/teachers/{teacher}/edit', [TeacherController::class, 'update_password'])->name('teachers.update_password');
    Route::put('/students/{student}/edit', [StudentController::class, 'update_password'])->name('students.update_password');
    Route::get('/amessage', [MessageController::class, 'message'])->name('message.amessage');
    Route::post('/amessage', [MessageController::class, 'sendmessage'])->name('message.asendmessage');
    Route::get('/acmessage', [MessageController::class, 'clearmessages'])->name('message.aclearmessages');
});

//routy dla nauczyciela
Route::middleware(['auth','verified','role:2'])->group(function () {
    Route::get('/myclass', [TeacherController::class,'myclass'])->name('teachers.myclass');
    Route::get('/zajecia', [TeacherController::class,'zajecia'])->name('teachers.zajecia');
    Route::get('/delete_mark/{mark_id}', [MarksController::class,'deletemark'])->name('teachers.deletemark');
    Route::post('/zajecia', [MarksController::class, 'editmarks'])->name('teachers.editmarks');
    Route::post('/myclass/{grade_id}', [ActivityController::class, 'activity_grade'])->name('activity.activity_grade');
    Route::get('/myclass/{student}', [TeacherController::class, 'show_student'])->name('teachers.show_student');
    Route::put('/myclass/{student}', [TeacherController::class, 'delete_absences'])->name('teachers.delete_absences');
    Route::delete('/myclass/{student}', [TeacherController::class, 'delete_notes'])->name('teachers.delete_notes');
    Route::patch('/myclass/{student}', [StudentController::class, 'update_about'])->name('students.update_about');
    Route::get('/tmessage', [MessageController::class, 'message'])->name('message.tmessage');
    Route::post('/tmessage', [MessageController::class, 'sendmessage'])->name('message.tsendmessage');
    Route::get('/tcmessage', [MessageController::class, 'clearmessages'])->name('message.tclearmessages');
    Route::get('/start', [TeacherController::class, 'start'])->name('teachers.start');
    Route::get('/start2', [TeacherController::class, 'start2'])->name('teachers.start2');
    Route::post('/start2', [TeacherController::class, 'savemarks'])->name('teachers.savemarks');
});

//routy dla ucznia
Route::middleware(['auth','verified','role:3'])->group(function () {
    Route::get('/message', [MessageController::class, 'message'])->name('message.message');
    Route::post('/message', [MessageController::class, 'sendmessage'])->name('message.sendmessage');
    Route::get('/cmessage', [MessageController::class, 'clearmessages'])->name('message.clearmessages');
});

require __DIR__.'/auth.php';
