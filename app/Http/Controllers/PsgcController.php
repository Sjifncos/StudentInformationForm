<?php
    namespace App\Http\Controllers;
    use Illuminate\Support\Facades\Http;
    
    class PsgcController extends Controller
    {
        public function index()
        {
            $baseUrl = 'https://psgc.cloud/api';

            //HTTP REQUEST FOR REGIONS
            $response = Http::get("$baseUrl/regions");
            $regions = $response->successful() ? $response->json() : [];

            // FETFCHING PROVINCES
            $provinces = Http::get("$baseUrl/provinces")->successful()
                        ? Http::get("$baseUrl/provinces")->json()
                        : [];

            return view('psgc.index', compact('regions', 'provinces'));
        }
    }