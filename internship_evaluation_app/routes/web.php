<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\Student;
use App\Models\Evaluation;
use App\Models\Mentor;
use App\Http\Controllers\EvaluationController;

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
    Route::get('students', [StudentController::class, 'index'])->name('students');

    Route::post('students', [StudentController::class, 'store'])->name('students');

    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');

    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

   

// routes evaluations
// Route for displaying all evaluations
Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');

// Route for displaying the form for creating a new evaluation
Route::get('/evaluations/create', [EvaluationController::class, 'create'])->name('evaluations.create');

// Route for storing the newly created evaluation
Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');

// Route for displaying a single evaluation
Route::get('/evaluations/{evaluation}', [EvaluationController::class, 'show'])->name('evaluations.show');

// Route for displaying the form for editing an evaluation
Route::get('/evaluations/{evaluation}/edit', [EvaluationController::class, 'edit'])->name('evaluations.edit');

// Route for updating an existing evaluation
Route::put('/evaluations/{evaluation}', [EvaluationController::class, 'update'])->name('evaluations.update');

// Route for deleting an existing evaluation
Route::delete('/evaluations/{evaluation}', [EvaluationController::class, 'destroy'])->name('evaluations.destroy');

// routes mentors
    Route::get('mentors', function () {
        $mentors = Mentor::all();
        return view('mentors.index', compact('mentors'));
    })->name('mentors');

});


require __DIR__.'/auth.php';
