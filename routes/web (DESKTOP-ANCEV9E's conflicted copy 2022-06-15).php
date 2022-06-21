<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Dashboard\BlogController;
use App\Http\Controllers\Admin\Dashboard\subjectController;
use App\Http\Controllers\Admin\Dashboard\DepartmentController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RouterConteroller;
use App\Http\Controllers\VideoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::view('', 'frontend/pages/index')->name('index');
Route::get('/engineering', [RouterConteroller::class, 'engineering'])->name('engineering');
Route::get('/freelancing', [RouterConteroller::class, 'freelancing'])->name('freelancing');
Route::get('/engineering/{id}', [RouterConteroller::class, 'engineeringSearch']);
Route::get('/search', [RouterConteroller::class, 'search'])->name('search');
Route::get('/freelanceSearch', [RouterConteroller::class, 'freelanceSearch'])->name('freelanceSearch');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/departments', DepartmentController::class);
    Route::resource('/subjects', SubjectController::class);
    Route::resource('/questions', QuestionController::class);
    Route::resource('/blogs', BlogController::class);
    Route::resource('/videos', VideoController::class);
    Route::post('/upload', [BlogController::class, 'upload'])->name('ckeditor.upload');
});


require __DIR__ . '/auth.php';