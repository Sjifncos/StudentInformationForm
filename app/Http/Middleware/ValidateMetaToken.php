<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class ValidateMetaToken
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    $key = $request->query('p') ?? $request->input('p');

    if (! $key) {
        return redirect()->route('403')
            ->with('error', 'Meta token is required.');
    }

    try {
        $endpoint = rtrim(config('external.api_base_url'), '/') . '/' .
            trim(config('external.validate_endpoint'), '/') . '/' . $key;

            $r = Http::timeout(10)->get($endpoint);
            // dd($endpoint);
    } catch (ConnectionException $e) {
        return redirect()->route('403')
            ->with('error', 'Unable to connect to validation service.');
    }
    if ($r->failed()) {
        return redirect()->route('403')
            ->with('error', 'Invalid or expired key.');
    }

    $data = $r->json();
  
    if (! is_array($data) || ! array_key_exists('success', $data)) {
        return redirect()->route('403')
            ->with('error', 'Invalid response from validation service.');
    }

    if (data_get($data, 'success') !== true) {
        return redirect()->route('403')
            ->with('error', 'Invalid or expired key.');
    }

    return $next($request);
}
}
