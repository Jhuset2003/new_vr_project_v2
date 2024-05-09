<?php
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\WebartsController;

Route::get('/', [WebartsController::class,'getDataWebarts']);

Route::get('/webartCamera/{id}', [WebartsController::class, 'getDataWebart'])
    ->name('webartCamera');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');  
    Route::resource('webart', WebartsController::class);
});

