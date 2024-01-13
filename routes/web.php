<?php
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\StudentTimeTableController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\InvoiceController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/dashboards/{user_type}', [App\Http\Controllers\DashboardController::class, 'index'])
    ->name('dashboards.index')
    ->where('user_type', 'admin|user');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//          ^^^^^                                                 ^^^^^^          ^^^^^
//       nama apa route yang kita letak                         method mana     file mana
//       dalam {{ }} hat kita nak panggil

Route::resource('/dashboards', App\Http\Controllers\DashboardController::class);

Route::get('/users/change/{user}', [App\Http\Controllers\UserController::class, 'alter'])->name('users');
Route::put('/users/change/{user}', [App\Http\Controllers\UserController::class, 'change'])->name('users.change');

Route::get('/users/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('users.profile');
Route::get('/users/profile/{user}', [App\Http\Controllers\UserController::class, 'edit_profile'])->name('users.edit_profile');
Route::put('/users/profile/{user}', [App\Http\Controllers\UserController::class, 'update_profile'])->name('users.update_profile');


Route::resource('users', App\Http\Controllers\UserController::class); //ni cara auto, tak perlu nak tulis satu-satu CRUD macam bawah tu. Atas tu contoh sahaja.

Route::resource('/subjects', App\Http\Controllers\SubjectController::class);
                //^^^^^^^
                //ikut nama declaration yang dibuat dalam index() kat SubjectController
Route::resource('/halls', App\Http\Controllers\HallController::class);

Route::resource('/timetables', App\Http\Controllers\StudentTimeTableController::class);

Route::resource('/groups', App\Http\Controllers\LecturerGroupController::class);

Route::resource('/checklists', App\Http\Controllers\ChecklistController::class);

Route::resource('/todos', App\Http\Controllers\TodoController::class);

Route::resource('/guests', App\Http\Controllers\GuestController::class);

Route::resource('/caterings', App\Http\Controllers\CateringController::class);

Route::resource('/dates', App\Http\Controllers\DateController::class);

Route::put('/todos/{id}', [App\Http\Controllers\TodoController::class, 'update'])->name('todos.update');


Route::post('/invoices/add/{service}', [InvoiceController::class, 'addToInvoice'])->name('invoices.add');



Route::resource('/pages', App\Http\Controllers\PageController::class);

Route::resource('/services', App\Http\Controllers\ServiceController::class);

Route::get('/profile', [App\Http\Controllers\PageController::class, 'profile'])->name('profile-static');
Route::get('/signup', [App\Http\Controllers\PageController::class, 'signup'])->name('sign-up-static');
Route::get('/signin', [App\Http\Controllers\PageController::class, 'signin'])->name('sign-in-static');


Route::get('virtual-reality', [App\Http\Controllers\PageController::class, 'vr'])->name('virtual-reality');
Route::get('rtl', [App\Http\Controllers\PageController::class, 'rtl'])->name('rtl');

Route::get('/pages/{page}', [App\Http\Controllers\PageController::class, 'index'])->name('page');


Route::get('/sidenav', [App\Http\Controllers\UserProfileController::class, 'show'])->name('profile');
Route::get('/update', [App\Http\Controllers\UserProfileController::class, 'update'])->name('profile.update');


