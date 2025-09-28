<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ExamController as UserExamController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function() { return redirect()->route('login'); });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role->name === 'Admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role->name === 'User') {
        return redirect()->route('user.exams.index'); // ya user.dashboard agar banaya
    }

    return redirect('/');
})->name('dashboard');


Route::middleware(['auth','role:admin'])->prefix('admin')->name('admin.')->group(function() {
     Route::get('dashboard', function(){ return view('admin.dashboard'); })->name('dashboard');

    Route::resource('exams', ExamController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('results', ResultController::class);

    // Route::get('results', [ResultController::class,'index'])->name('results.index');
    // Route::get('admin/results/{result}', [ResultController::class,'show'])->name('admin.results.show');

});

Route::middleware(['auth','role:user'])->prefix('user')->name('user.')->group(function() {
    Route::get('dashboard', function() {
        return view('user.dashboard');
    })->name('dashboard');
    Route::get('exams', [UserExamController::class,'index'])->name('exams.index');
    Route::get('exams/{exam}', [UserExamController::class,'show'])->name('exams.show');
    Route::post('exams/{exam}/submit', [UserExamController::class,'submit'])->name('exams.submit');
    Route::get('results', [UserExamController::class,'results'])->name('results');
});
require __DIR__.'/auth.php';
