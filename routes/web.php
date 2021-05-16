<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Content;

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

Route::get('/', function () {
    $movies = Content::all();
    return view('index')->with('movies', $movies);
});

Route::post('/', function (Request $req) {
    $row = DB::table('content')->where('contentID', $req->id)->first();
    return view('index')->with('movie', $row);
});

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function (){
    Auth::routes();
}); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'getMoreInformation'])->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin', 'auth', 'PreventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
    
    Route::get('addNewMovie',[AdminController::class,'addNewMovie'])->name('admin.addNewMovie');
    Route::post('addNewMovie',[AdminController::class,'doaddNewMovie'])->name('admin.doaddNewMovie');
    Route::get('addBranch',[AdminController::class,'addBranch'])->name('admin.addBranch');
    Route::get('addMovieBranch',[AdminController::class,'addMovieBranch'])->name('admin.addMovieBranch');
    Route::get('addStaff',[AdminController::class,'addStaff'])->name('admin.addStaff');
    Route::get('addUser',[AdminController::class,'addUser'])->name('admin.addUser');
    Route::get('branchList',[AdminController::class,'branchList'])->name('admin.branchList');
    Route::get('staffList',[AdminController::class,'staffList'])->name('admin.staffList');
    Route::get('userList',[AdminController::class,'userList'])->name('admin.userList');

});

Route::group(['prefix'=>'user', 'middleware'=>['isUser', 'auth', 'PreventBackHistory']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::post('dashboard',[UserController::class,'getMoreInformation'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');
    Route::get('movies',[UserController::class,'movies'])->name('user.movies');
    Route::get('myBook',[UserController::class,'myBook'])->name('user.myBook');
    Route::post('saveBook',[UserController::class,'saveBook'])->name('user.saveBook'); 
    Route::post('saveInformation',[UserController::class,'saveInformation'])->name('user.saveInformation');
});

Route::group(['prefix'=>'staff', 'middleware'=>['isStaff', 'auth', 'PreventBackHistory']], function(){
    Route::get('dashboard',[StaffController::class,'index'])->name('staff.dashboard');
    Route::post('dashboard',[StaffController::class,'getMoreInformation'])->name('staff.dashboard');
    Route::get('profile',[StaffController::class,'profile'])->name('staff.profile');
    Route::get('settings',[StaffController::class,'settings'])->name('staff.settings');
    Route::get('addMovie',[StaffController::class,'addMovie'])->name('staff.addMovie');
    Route::post('addMovie',[StaffController::class,'addBranchMovie'])->name('staff.addMovie');
    Route::get('branchBooks',[StaffController::class,'branchBooks'])->name('staff.branchBooks');
    Route::post('branchBooks',[StaffController::class,'reSaveBook'])->name('staff.branchBooks');
    Route::get('branchRequests',[StaffController::class,'branchRequests'])->name('staff.branchRequests');
    Route::get('branchMovies',[StaffController::class,'branchMovies'])->name('staff.branchMovies');
    Route::post('saveBook',[StaffController::class,'saveBook'])->name('staff.saveBook');
});


