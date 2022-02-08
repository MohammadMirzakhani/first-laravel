<?php
use App\Http\Controllers\back\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\back\ArticleController;
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
Auth::routes();


Route::get('/home', [App\Http\Controllers\Controller::class, 'index'])->name('home');
Route::get('/home//porofile/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('porofile');
Route::put('/home/porofileUpdate/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('porofileUpdate');
Route::get('/home/{OurTeam}', [App\Http\Controllers\OurTeamController::class, 'show'])->name('show_team');

Route::get('/Admin',[App\Http\Controllers\back\AdminController::class, 'index'])->name("admin.index")->middleware('checkrole');

Route::prefix('/Admin/users')->middleware('checkrole')->group(function(){
    Route::get('/',[App\Http\Controllers\back\UserController::class, 'index'])->name('admin.users');
    Route::get('/delete/{user}',[App\Http\Controllers\back\UserController::class, 'destroy'])->name("admin.users.delete");
    Route::get('/edit/{user}',[App\Http\Controllers\back\UserController::class, 'edit'])->name("admin.users.edit");
    Route::put('/update/{user}',[App\Http\Controllers\back\UserController::class, 'update'])->name("admin.users.update");
    Route::get('/updatestatus/{user}',[App\Http\Controllers\back\UserController::class, 'updatestatus'])->name("admin.users.updatestatus");
});
Route::prefix('/Admin/categories')->middleware('checkrole')->group(function(){
    Route::get('/',[App\Http\Controllers\back\CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/creat',[App\Http\Controllers\back\CategoryController::class, 'create'])->name("admin.categories.create");
    Route::post('/store',[App\Http\Controllers\back\CategoryController::class, 'store'])->name("admin.categories.store");
    Route::get('/edit/{category}',[App\Http\Controllers\back\CategoryController::class, 'edit'])->name("admin.categories.edit");
    Route::put('/update/{category}',[App\Http\Controllers\back\CategoryController::class, 'update'])->name("admin.categories.update");
    Route::get('/destroy/{category}',[App\Http\Controllers\back\CategoryController::class, 'destroy'])->name("admin.categories.destroy");
});
Route::prefix('/Admin/articles')->middleware('checkrole')->group(function(){
    Route::get('/',[App\Http\Controllers\back\ArticleController::class, 'index'])->name('admin.articles');
    Route::get('/creat',[App\Http\Controllers\back\ArticleController::class, 'create'])->name("admin.articles.create");
    Route::post('/store',[App\Http\Controllers\back\ArticleController::class, 'store'])->name("admin.articles.store");
    Route::get('/edit/{article}',[App\Http\Controllers\back\ArticleController::class, 'edit'])->name("admin.articles.edit");
    Route::put('/update/{article}',[App\Http\Controllers\back\ArticleController::class, 'update'])->name("admin.articles.update");
    Route::get('/destroy/{article}',[App\Http\Controllers\back\ArticleController::class, 'destroy'])->name("admin.articles.destroy");
    Route::get('/updatestatus/{article}',[App\Http\Controllers\back\ArticleController::class, 'updatestatus'])->name("admin.articles.updatestatus");
});
Route::prefix('/Admin/OurTeam')->middleware('checkrole')->group(function(){
    Route::get('/',[App\Http\Controllers\back\OurTeamController::class, 'index'])->name('admin.OurTeam');
    Route::get('/creat',[App\Http\Controllers\back\OurTeamController::class, 'create'])->name("admin.OurTeam.create");
    Route::post('/store',[App\Http\Controllers\back\OurTeamController::class, 'store'])->name("admin.OurTeam.store");
    Route::get('/edit/{OurTeam}',[App\Http\Controllers\back\OurTeamController::class, 'edit'])->name("admin.OurTeam.edit");
    Route::put('/update/{OurTeam}',[App\Http\Controllers\back\OurTeamController::class, 'update'])->name("admin.OurTeam.update");
    Route::get('/destroy/{OurTeam}',[App\Http\Controllers\back\OurTeamController::class, 'destroy'])->name("admin.OurTeam.destroy");
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});






