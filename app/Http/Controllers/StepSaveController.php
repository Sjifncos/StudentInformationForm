<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;

    class StepSaveController extends Controller
    {
        private static $locationNameCache = [];

        /*Recursively sanitize strings (trim + strip_tags) in an array.*/
        private function sanitizeRecursive($data)
        {
            if (is_string($data)) {
                return trim(strip_tags($data));
            }
            if (is_array($data)) {
                return array_map([$this, 'sanitizeRecursive'], $data);
            }
            return $data;
        }

        /*Fix common mojibake (e.g., "NiÃ±o" -> "Niño") and ensure UTF-8.*/
        private function fixEncoding($string)
        {
            if (!is_string($string) || empty($string)) {
                return $string;
            }

            if (!mb_check_encoding($string, 'UTF-8')) {
                $string = mb_convert_encoding($string, 'UTF-8', 'auto');
            }

            $mojibakeMap = [
                '/Ã±/' => 'ñ',
                '/Ã©/' => 'é',
                '/Ã­/' => 'í',
                '/Ã³/' => 'ó',
                '/Ãº/' => 'ú',
                '/Ã¼/' => 'ü',
                '/Ã‘/' => 'Ñ',
            ];

            $fixed = preg_replace(array_keys($mojibakeMap), array_values($mojibakeMap), $string);

            if (strpos($fixed, '%') !== false) {
                $decoded = urldecode($fixed);
                if (mb_check_encoding($decoded, 'UTF-8')) {
                    $fixed = $decoded;
                }
            }

            if (preg_match('/Ã|Â|â€/', $fixed)) {
                $fixed = mb_convert_encoding($fixed, 'UTF-8', 'ISO-8859-1');
            }

            return $fixed;
        }

        public function saveStep(Request $request)
        {
            $step = $request->input('step');
            $sessionId = $request->input('session_id', Str::random(32));

            $sessionDir = "form_submissions/{$sessionId}";
            $jsonPath = storage_path("app/public/{$sessionDir}/data.json");

            $allData = [];
            if (file_exists($jsonPath)) {
                $content = file_get_contents($jsonPath);
                $allData = json_decode($content, true);
                if (!is_array($allData)) {
                    $allData = [];
                }
            }

            // --- Process file uploads (unchanged, files are binary) ---
            $uploadedFiles = [];

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store("{$sessionDir}/images", 'public');
                $uploadedFiles['image'] = $path;
            }
            if ($request->hasFile('medical_certificate')) {
                $path = $request->file('medical_certificate')->store("{$sessionDir}/documents", 'public');
                $uploadedFiles['medical_certificate'] = $path;
            }
            if ($request->hasFile('notice_of_admission')) {
                $path = $request->file('notice_of_admission')->store("{$sessionDir}/documents", 'public');
                $uploadedFiles['notice_of_admission'] = $path;
            }
            if ($request->hasFile('honorable_dismissal')) {
                $path = $request->file('honorable_dismissal')->store("{$sessionDir}/documents", 'public');
                $uploadedFiles['honorable_dismissal'] = $path;
            }
            if ($request->hasFile('tor_remarks')) {
                $path = $request->file('tor_remarks')->store("{$sessionDir}/documents", 'public');
                $uploadedFiles['tor_remarks'] = $path;
            }
            if ($request->hasFile('birth_certificate')) {
                $path = $request->file('birth_certificate')->store("{$sessionDir}/documents", 'public');
                $uploadedFiles['birth_certificate'] = $path;
            }
            if ($request->hasFile('marriage_certificate')) {
                $path = $request->file('marriage_certificate')->store("{$sessionDir}/documents", 'public');
                $uploadedFiles['marriage_certificate'] = $path;
            }
            if ($request->hasFile('pwd_card_container')) {
                $path = $request->file('pwd_card_container')->store("{$sessionDir}/images", 'public');
                $uploadedFiles['pwd_card_container'] = $path;
            }
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

            // ----- SANITIZATION: clean all string data before storing in JSON -----
            $requestData = $this->sanitizeRecursive($requestData);

            $stepData = [
                'data' => $requestData,
                'files' => $uploadedFiles,
            ];

            $allData["step_{$step}"] = $stepData;

            if (!file_exists(dirname($jsonPath))) {
                mkdir(dirname($jsonPath), 0755, true);
            }
            file_put_contents($jsonPath, json_encode($allData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            return response()->json([
                'success' => true,
                'session_id' => $sessionId,
                'message' => "Step {$step} saved successfully.",
            ])->header('Content-Type', 'application/json; charset=utf-8');
        }

        public function finalSubmit(Request $request)
        {
            $sessionId = $request->input('session_id');
            $jsonPath = storage_path("app/public/form_submissions/{$sessionId}/data.json");

            if (!file_exists($jsonPath)) {
                return response()->json([
                    'success' => false,
                    'message' => 'No data found for this session.',
                ], 404)->header('Content-Type', 'application/json; charset=utf-8');
            }

            $content = file_get_contents($jsonPath);
            $data = json_decode($content, true);
            if (!is_array($data)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Corrupted JSON data for this session.',
                ], 500)->header('Content-Type', 'application/json; charset=utf-8');
            }

            // Convert PSGC codes to location names for all steps
            foreach ($data as &$stepData) {
                if (isset($stepData['data'])) {
                    $this->convertLocationCodesToNames($stepData['data']);
                }
            }

            $data['submitted_at'] = now()->toISOString();

            $finalPath = storage_path("app/public/form_submissions/final_{$sessionId}_" . date('Ymd_His') . ".json");
            file_put_contents($finalPath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            return response()->json([
                'success' => true,
                'message' => 'Form submitted successfully.',
                'json_file' => asset("storage/form_submissions/final_{$sessionId}_" . date('Ymd_His') . ".json"),
            ])->header('Content-Type', 'application/json; charset=utf-8');
        }

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
                        // Apply encoding fix AND sanitize again (strip_tags for safety)
                        $data[$field] = $this->sanitizeRecursive($this->fixEncoding($name));
                    }
                }
            }
        }

        private function getLocationName($code, $type)
        {
            $cacheKey = "{$type}:{$code}";
            if (array_key_exists($cacheKey, self::$locationNameCache)) {
                return self::$locationNameCache[$cacheKey];
            }

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
                    if ($name) {
                        $name = $this->fixEncoding($name);
                        // Additional sanitization of API names (they are trusted, but still safe)
                        $name = $this->sanitizeRecursive($name);
                    }
                    self::$locationNameCache[$cacheKey] = $name;
                    return $name;
                }
            } catch (\Exception $e) {
                // Log error if needed
            }

            self::$locationNameCache[$cacheKey] = null;
            return null;
        }

        private function getLocationType($field)
        {
            if (str_contains($field, 'region')) return 'region';
            if (str_contains($field, 'province')) return 'province';
            if (str_contains($field, 'city')) return 'city';
            if (str_contains($field, 'barangay')) return 'barangay';
            return 'unknown';
        }
    }