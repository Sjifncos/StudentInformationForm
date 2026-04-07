<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StepSaveController extends Controller
{
    /**
     * Cache for location names to avoid repeated API calls during final submission.
     */
    private static $locationNameCache = [];

    /**
     * Save a single step data (including files) to JSON.
     * This method is fast because it does NOT call any external APIs.
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
            'image', 'medical_certificate', 
            'notice_of_admission',
            'honorable_dismissal', 
            'tor_remarks', 
            'birth_certificate',
            'marriage_certificate', 
            'pwd_card_container',
            'marriage_container'
        ]);

        // ✅ OPTIMIZATION: Store raw PSGC codes – NO API CALLS HERE
        // (The conversion to location names is deferred to finalSubmit())

        // --- Build step data (saved_at removed per step) ---
        $stepData = [
            'data' => $requestData,
            'files' => $uploadedFiles,
            // 'saved_at' => now()->toISOString(), // REMOVED: timestamp only on final submission
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
     * Final submission: convert all PSGC codes to location names,
     * then create a permanent JSON file with a submission timestamp.
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

        // Convert PSGC codes to location names for all steps
        foreach ($data as &$stepData) {
            if (isset($stepData['data'])) {
                $this->convertLocationCodesToNames($stepData['data']);
            }
        }

        // Add final submission timestamp at the root level
        $data['submitted_at'] = now()->toISOString();

        // Create final JSON file (copy with timestamp)
        $finalPath = storage_path("app/public/form_submissions/final_{$sessionId}_" . date('Ymd_His') . ".json");
        file_put_contents($finalPath, json_encode($data, JSON_PRETTY_PRINT));

        // Optionally store submission in database
        // FormSubmission::create(['session_id' => $sessionId, 'data' => $data, 'submitted_at' => now()]);

        return response()->json([
            'success' => true,
            'message' => 'Form submitted successfully.',
            'json_file' => asset("storage/form_submissions/final_{$sessionId}_" . date('Ymd_His') . ".json"),
        ]);
    }

    /**
     * Convert PSGC codes to human-readable names inside the given data array.
     *
     * @param array &$data
     */
    private function convertLocationCodesToNames(array &$data)
    {
        $locationFields = [
            'region', 'province', 'city', 'barangay',
            'current_region', 'current_province', 'current_city', 'current_barangay'
        ];

        foreach ($locationFields as $field) {
            if (isset($data[$field]) && !empty($data[$field])) {
                $code = $data[$field];
                $type = $this->getLocationType($field);
                $name = $this->getLocationName($code, $type);
                if ($name) {
                    $data[$field] = $name; // Replace code with name
                }
            }
        }
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
                self::$locationNameCache[$cacheKey] = $name;
                return $name;
            }
        } catch (\Exception $e) {
            // Log error if needed – do not break the submission
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
}