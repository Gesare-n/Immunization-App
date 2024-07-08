<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommunityHelpersController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\GuardiansController;
use App\Http\Controllers\SendMailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});


Route::get('/dashboard', function () {
    return redirect('/hospitals/dashboard');
})->middleware(['auth', 'verified']) ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/get/products/import', [ProductController::class, 'importView'])->name('product.importView');
    Route::post('/post/products/import', [ProductController::class, 'import'])->name('product.import');  
    Route::get('/get/products/dashboard', [ProductController::class, 'index'])->name('product.index'); 
    Route::get('/batches/products/view/{id}', [ProductController::class, 'view_batch'])->name('product.view_batch'); 
    Route::get('/products/pdf/download/{id}', [ProductController::class, 'generatePDF'])->name('product.generatePDF'); 
    Route::get('/create/fpdf/download/{id}', [ProductController::class, 'createPDF'])->name('product.createPDF'); 
    Route::get('/send/mail/{id}', [ProductController::class, 'sendMailWithAttachment'])->name('product.sendMailWithAttachment');
    Route::get('/hospitals/dashboard',  [HospitalController::class, 'dashboard'])->name('hospital.dashboard'); 
    Route::post('/hospitals/show/Guardian',  [HospitalController::class, 'createGuardian'])->name('hospital.createGuardian');
    Route::get('/hospitals/create/Guardian/Show',  [HospitalController::class, 'createGuardianShow'])->name('hospital.createGuardianShow');
    Route::post('/hospitals/create/Kid',  [HospitalController::class, 'createKid'])->name('hospital.createKid');
    Route::get('/hospitals/creates/kids/Show',  [HospitalController::class, 'createKidShow'])->name('hospital.createKidShow');
    Route::get('/hospitals/search',  [HospitalController::class, 'hospitalSearch'])->name('hospital.hospitalSearch');
    Route::get('/com_hs/search',  [HospitalController::class, 'communityHealthWorkerSearch'])->name('hospital.communityHealthWorkerSearch');
    Route::get('/parents/search',  [HospitalController::class, 'parentSearch'])->name('hospital.parentSearch');
    Route::get('/sendSMS', [HospitalController::class, 'index']);
    Route::get('/hospitals/select/a/kid', function () {
        return view('hospital.selectKid');
    });
    Route::post('/hospitals/select/Kid',  [HospitalController::class, 'selectKid'])->name('hospital.selectKid');
    Route::get('/current/kids/vaccines/{id}',  [HospitalController::class, 'vacinateKidShow'])->name('hospital.vacinateKidShow');
    Route::post('/current/kid/vaccines/{id}',  [HospitalController::class, 'vacinateKidShow'])->name('hospital.vacinateKid');
    
});
require __DIR__.'/auth.php'; 
