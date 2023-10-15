<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Route as RoutingRoute;

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

//Route::get('/', function () {
// return view('welcome');
//});

Route::get('/',[WelcomeController::class, 'index'])->name('welcome.index');

//to blog page
Route::get('/blog',[BlogController::class, 'index'])->name('blog.index');

 //to create blog post
Route::get('/blog/create',[BlogController::class, 'create'])->name('blog.create');

//to a single blog post
Route::get('/blog/{post:slug}',[BlogController::class, 'show'])->name('blog.show');

//to edit single blog post
Route::get('/blog/{post}/edit',[BlogController::class, 'edit'])->name('blog.edit');

//to delete single blog post
Route::delete('/blog/{post}',[BlogController::class, 'destroy'])->name('blog.destroy');

//to update single blog post
Route::put('/blog/{post}',[BlogController::class, 'update'])->name('blog.update');


//to store a blog post to db
Route::Post('/blog',[BlogController::class, 'store'])->name('blog.store');

//Category resource controller
Route::resource('/categories', CategoryController::class);

//about page
Route::get('/about', function () {
return view('about');
})->name('about');

//to contacts page
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// To Send data to email.
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
