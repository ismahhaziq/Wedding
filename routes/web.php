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
    $caterings = \App\Models\Catering::all();
    return view('welcome', compact('caterings'));
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

Route::resource('/caterings', App\Http\Controllers\CateringController::class);

Route::resource('/dates', App\Http\Controllers\DateController::class);

Route::put('/dates/{date}/updateStatus', [App\Http\Controllers\DateController::class, 'updateStatus'])->name('dates.updateStatus');

Route::resource('/makeups', App\Http\Controllers\MakeUpController::class);

Route::resource('/invoices', App\Http\Controllers\InvoiceController::class);

Route::prefix('paypal')->group(function () {
    Route::get('handle-payment/{totalAmount}/{invoice_id}', [App\Http\Controllers\InvoiceController::class, 'handlePayment'])
        ->name('make.payment');
    Route::get('cancel-payment', [App\Http\Controllers\InvoiceController::class, 'paymentCancel'])
        ->name('cancel.payment');
    Route::get('payment-success', [App\Http\Controllers\InvoiceController::class, 'paymentSuccess'])
        ->name('success.payment');
});

Route::put('/invoices/{invoice}/update-status', [App\Http\Controllers\InvoiceController::class, 'updateStatus'])->name('invoices.updateStatus');

Route::post('/makeups/{makeup}/addToInvoice', [App\Http\Controllers\MakeupController::class, 'addToInvoice'])->name('makeups.addToInvoice');
Route::post('/services/{service}/addToInvoice', [App\Http\Controllers\ServiceController::class, 'addToInvoice'])->name('services.addToInvoice');
Route::post('/caterings/{catering}/addToInvoice', [App\Http\Controllers\CateringController::class, 'addToInvoice'])->name('caterings.addToInvoice');
Route::post('/caterings/confirmInvoice', [App\Http\Controllers\CateringController::class, 'confirmInvoice'])->name('caterings.confirmInvoice');
Route::get('/caterings/change', [App\Http\Controllers\CateringController::class, 'show'])->name('caterings.show');

Route::resource('/services', App\Http\Controllers\ServiceController::class);

Route::get('/auth/google', [App\Http\Controllers\Auth\GoogleAuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\GoogleAuthController::class, 'handleGoogleCallback']);


// Route to show the forgot password form
Route::get('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Route to handle the submission of the forgot password form
Route::post('/forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Show reset password form
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Handle reset password form submission
Route::post('/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::put('/invoices/{id}/revert', [App\Http\Controllers\InvoiceController::class, 'revertStatus'])->name('invoices.revertStatus');

Route::get('/dress', [App\Http\Controllers\MakeupController::class, 'dress'])->name('makeups.dress');

//Route::delete('/deleteAll', [App\Http\Controllers\ServiceController::class, 'deleteAll'])->name('services.deleteAll');
