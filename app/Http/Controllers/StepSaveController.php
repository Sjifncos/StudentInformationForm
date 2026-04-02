<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StepSaveController extends Controller
{
    /**
     * Cache for location names to avoid repeated API calls.
     */
    private static $locationNameCache = [];

    /**
     * Save a single step data (including files) to JSON.
     */
    public function saveStep(Request $request)
    {
        $step = $request->input('step');
        $sessionId = $request->input('session_id', Str::random(32));

        // Directory for this session
        $sessionDir = "form_submissions/{$sessionId}";
        $jsonPath = storage_path("app/public/{$sessionDir}/data.json");

        // Load existing data if any
        $allData = [];
        if (file_exists($jsonPath)) {
            $allData = json_decode(file_get_contents($jsonPath), true);
        }

        // --- Process file uploads (based on your actual field names) ---
        $uploadedFiles = [];

        // Profile image (2x2)
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store("{$sessionDir}/images", 'public');
            $uploadedFiles['image'] = $path;
        }

        // Medical certificate (PDF)
        if ($request->hasFile('medical_certificate')) {
            $path = $request->file('medical_certificate')->store("{$sessionDir}/documents", 'public');
            $uploadedFiles['medical_certificate'] = $path;
        }

        // Notice of admission (PDF)
        if ($request->hasFile('notice_of_admission')) {
            $path = $request->file('notice_of_admission')->store("{$sessionDir}/documents", 'public');
            $uploadedFiles['notice_of_admission'] = $path;
        }

        // Honorable dismissal (optional)
        if ($request->hasFile('honorable_dismissal')) {
            $path = $request->file('honorable_dismissal')->store("{$sessionDir}/documents", 'public');
            $uploadedFiles['honorable_dismissal'] = $path;
        }

        // TOR with remarks
        if ($request->hasFile('tor_remarks')) {
            $path = $request->file('tor_remarks')->store("{$sessionDir}/documents", 'public');
            $uploadedFiles['tor_remarks'] = $path;
        }

        // Birth certificate (PSA/LCR)
        if ($request->hasFile('birth_certificate')) {
            $path = $request->file('birth_certificate')->store("{$sessionDir}/documents", 'public');
            $uploadedFiles['birth_certificate'] = $path;
        }

        // Marriage certificate (optional, but required if married)
        if ($request->hasFile('marriage_certificate')) {
            $path = $request->file('marriage_certificate')->store("{$sessionDir}/documents", 'public');
            $uploadedFiles['marriage_certificate'] = $path;
        }

        // PWD card (if PWD = Yes)
        if ($request->hasFile('pwd_card_container')) {
            $path = $request->file('pwd_card_container')->store("{$sessionDir}/images", 'public');
            $uploadedFiles['pwd_card_container'] = $path;
        }

        // Court order / marriage container (if applicable)
        if ($request->hasFile('marriage_container')) {
            $path = $request->file('marriage_container')->store("{$sessionDir}/images", 'public');
            $uploadedFiles['marriage_container'] = $path;
        }

        // --- Prepare request data (excluding files and meta) ---
        $requestData = $request->except([
            'step', 'session_id', '_token',
            'image', 'medical_certificate', 'notice_of_admission',
            'honorable_dismissal', 'tor_remarks', 'birth_certificate',
            'marriage_certificate', 'pwd_card_container', 'marriage_container'
        ]);

        // --- Convert PSGC codes to location names ---
        $locationFields = [
            'region', 'province', 'city', 'barangay',
            'current_region', 'current_province', 'current_city', 'current_barangay'
        ];

        foreach ($locationFields as $field) {
            if (isset($requestData[$field]) && !empty($requestData[$field])) {
                $code = $requestData[$field];
                $name = $this->getLocationName($code, $this->getLocationType($field));
                if ($name) {
                    $requestData[$field] = $name; // Replace code with name
                }
            }
        }

        // --- Build step data ---
        $stepData = [
            'data' => $requestData,
            'files' => $uploadedFiles,
            'saved_at' => now()->toISOString(),
        ];

        // Merge with existing steps
        $allData["step_{$step}"] = $stepData;

        // Save to JSON
        if (!file_exists(dirname($jsonPath))) {
            mkdir(dirname($jsonPath), 0755, true);
        }
        file_put_contents($jsonPath, json_encode($allData, JSON_PRETTY_PRINT));

        return response()->json([
            'success' => true,
            'session_id' => $sessionId,
            'message' => "Step {$step} saved successfully.",
        ]);
    }

    /**
     * Get the location name from PSGC API given a code and type.
     * Uses a static cache to avoid repeated requests for the same code.
     *
     * @param string $code
     * @param string $type (region, province, city, barangay)
     * @return string|null
     */
    private function getLocationName($code, $type)
    {
        // Check cache
        $cacheKey = "{$type}:{$code}";
        if (array_key_exists($cacheKey, self::$locationNameCache)) {
            return self::$locationNameCache[$cacheKey];
        }

        // Determine the correct API endpoint
        $baseUrl = 'https://psgc.cloud/api';
        $endpoint = null;

        switch ($type) {
            case 'region':
                $endpoint = "{$baseUrl}/regions/{$code}";
                break;
            case 'province':
                $endpoint = "{$baseUrl}/provinces/{$code}";
                break;
            case 'city':
                $endpoint = "{$baseUrl}/cities-municipalities/{$code}";
                break;
            case 'barangay':
                $endpoint = "{$baseUrl}/barangays/{$code}";
                break;
            default:
                return null;
        }

        try {
            $response = Http::timeout(5)->get($endpoint);
            if ($response->successful()) {
                $data = $response->json();
                $name = $data['name'] ?? null;
                // Cache the result (even if null)
                self::$locationNameCache[$cacheKey] = $name;
                return $name;
            }
        } catch (\Exception $e) {
            // Log error if needed
        }

        self::$locationNameCache[$cacheKey] = null;
        return null;
    }

    /**
     * Map the field name to the corresponding location type.
     *
     * @param string $field
     * @return string
     */
    private function getLocationType($field)
    {
        if (str_contains($field, 'region')) return 'region';
        if (str_contains($field, 'province')) return 'province';
        if (str_contains($field, 'city')) return 'city';
        if (str_contains($field, 'barangay')) return 'barangay';
        return 'unknown';
    }

    /**
     * Final submission: validate all steps, create final JSON, and optionally store in DB.
     */
    public function finalSubmit(Request $request)
    {
        $sessionId = $request->input('session_id');
        $jsonPath = storage_path("app/public/form_submissions/{$sessionId}/data.json");

        if (!file_exists($jsonPath)) {
            return response()->json([
                'success' => false,
                'message' => 'No data found for this session.',
            ], 404);
        }

        $data = json_decode(file_get_contents($jsonPath), true);

        // (Optional) Run final validation using FormController's validation rules
        // You can call a method from FormController to validate the merged data
        // For now, we assume all steps were validated on the frontend.

        // Create final JSON file (copy with timestamp)
        $finalPath = storage_path("app/public/form_submissions/final_{$sessionId}_" . date('Ymd_His') . ".json");
        copy($jsonPath, $finalPath);

        // Optionally store submission in database
        // FormSubmission::create(['session_id' => $sessionId, 'data' => $data, 'submitted_at' => now()]);

        return response()->json([
            'success' => true,
            'message' => 'Form submitted successfully.',
            'json_file' => asset("storage/form_submissions/final_{$sessionId}_" . date('Ymd_His') . ".json"),
        ]);
    }
}