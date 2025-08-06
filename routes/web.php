<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
Route::get('/branches', [BranchController::class, 'index'])->name('branches.index');

// Member Information Routes
Route::prefix('member')->name('member.')->group(function () {
    // Step 1: Basic Information
    Route::get('/basic-info', [MemberController::class, 'showBasicInfo'])->name('basic-info');
    Route::post('/basic-info', [MemberController::class, 'storeBasicInfo'])->name('basic-info.store');
    
    // Step 2: Contact Information
    Route::get('/contact-info', [MemberController::class, 'showContactInfo'])->name('contact-info');
    Route::post('/contact-info', [MemberController::class, 'storeContactInfo'])->name('contact-info.store');
    
    // Step 3: Additional Information
    Route::get('/additional-info', [MemberController::class, 'showAdditionalInfo'])->name('additional-info');
    Route::post('/additional-info', [MemberController::class, 'storeAdditionalInfo'])->name('additional-info.store');
    
    // Review and Submit
    Route::get('/review', [MemberController::class, 'showReview'])->name('review');
    Route::post('/submit', [MemberController::class, 'submit'])->name('submit');
});