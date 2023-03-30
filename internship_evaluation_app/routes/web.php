<?php

use App\Http\controllers\UserTableController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\Student;
use App\Models\Evaluation;
use App\Models\Mentor;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('users', [UserTableController::class, 'index'])->name('users');

Route::post('users', [UserTableController::class, 'store'])->name('users');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// routes courses
    Route::get('courses', function () {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    })->name('courses');

// routes students
    Route::get('students', function () {
        $students = Student::all();
        return view('students.index', compact('students'));
    })->name('students');






    

// routes evaluations
    Route::get('evaluations', function () {
        $evaluations = Evaluation::all();
        return view('evaluations.index', compact('evaluations'));
    })->name('evaluations');

// routes mentors
    Route::get('mentors', function () {
        $mentors = Mentor::all();
        return view('mentors.index', compact('mentors'));
    })->name('mentors');

});


require __DIR__.'/auth.php';
