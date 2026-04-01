<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\FormController;
    use App\Http\Controllers\StepSaveController;
    use App\Http\Controllers\PsgcController;
    use App\Http\Controllers\CountryController;

    //Routes
    Route::get('/', function () { return view('multi-step-form.form'); })->name('form');
    Route::get('/requirements', function () { return view('multi-step-form.requirements'); })->name('requirements');
    Route::get('/thankyoupage', function () { return view('multi-step-form.thankyoupage'); })->name('thankyoupage');
    Route::post('/submit-form', [FormController::class, 'submit'])->name('form.submit');
    Route::get('/api/countries', [CountryController::class, 'index']);
    Route::get('/psgc', [PsgcController::class, 'index']);

    // New routes for step-saving and final submission
    Route::post('/save-step', [StepSaveController::class, 'saveStep'])->name('save.step');
    Route::post('/final-submit', [StepSaveController::class, 'finalSubmit'])->name('final.submit');