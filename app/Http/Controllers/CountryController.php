<?php
    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Cache;

    class CountryController extends Controller
    {
        public function index()
        {
            $countries = Cache::remember('countries_list', 86400, function () {
                $response = Http::get('https://restcountries.com/v3.1/all?fields=name,cca2');

                if ($response->failed()) {
                    return [];
                }
                return collect($response->json())
                    ->sortBy('name.common')
                    ->map(fn($c) => ['code' => $c['cca2'], 'name' => $c['name']['common']])
                    ->values();
            });

            return response()->json($countries);
        }
    }