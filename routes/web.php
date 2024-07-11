<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginController;

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



Route::middleware(['redirectBasedOnRole'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('register', [RegisteredUserController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'register']);

}); 
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('news.index'); // Atur dashboard untuk news.index
    })->name('news.index');

    Route::get('/news/search', [NewsController::class, 'search'])->name('news.search');
    Route::get('/news', [NewsController::class, 'indexx'])->name('news');

    Route::get('/team', [TeamController::class, 'index'])->name('team.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
     Route::post('/news', [NewsController::class, 'store'])->name('news.store');
     Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
      Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
     Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

 Route::get('/team', [TeamController::class, 'index'])->name('team.index');
    Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('/team/store', [TeamController::class, 'store'])->name('team.store');
    Route::get('/team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('/team/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
    Route::get('/logout', function () {
    })->name('logout');
});

Route::middleware(['guest', 'setguest:erlangga'])->group(function () {
    Route::get('/dashboard/erlangga', [NewsController::class, 'index'])->name('dashboard.erlangga')->defaults('role', 'erlangga');
    Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

});
Route::middleware(['guest', 'setguest:hilmi'])->group(function () {
    Route::get('/dashboard/hilmi', [NewsController::class, 'index'])->name('dashboard.hilmi')->defaults('role', 'hilmi');
    Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

});


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


