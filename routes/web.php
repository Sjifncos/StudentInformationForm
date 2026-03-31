<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\FormController;
    use App\Http\Controllers\PsgcController;
    use App\Http\Controllers\CountryController;
    //use App\Http\Controllers\current_PsgcController;
   
    // Route to display the multi-step form
    Route::get('/', function () {return view('multi-step-form.form');})->name('form');
    Route::get('/requirements', function () {return view('multi-step-form.requirements');})->name('requirements');
    Route::get('/index', function () {return view('multi-step-form.index');});

    // Form submission (POST)
    Route::post('/submit-form', [FormController::class, 'submit'])->name('form.submit');

    // REST COUNTRIES Route 
    Route::get('/api/countries', [CountryController::class, 'index']);

    // PSGC Route
    Route::get('/psgc', [PsgcController::class, 'index']);