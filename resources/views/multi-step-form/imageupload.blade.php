<div class="step" data-step="9">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-[24px] font-semibold text-[#0E6021]">
                Documents Upload
            </h1>
        </div>
        <!-- Left Column: Profile Upload + Required Documents -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <!-- Original Profile Upload Section -->
            <h3 class="text-lg font-semibold text-[#850038] mb-4">Upload Image</h3>
            
            <div class="space-y-4">
                <!-- File Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Choose an image
                    </label>
                    <input type="file" name="image" id="imageInput" accept=".png,.jpg,.jpeg,.webp" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
                </div>
                
                <!-- Image Preview (centered) -->
                <div id="previewContainer" class="hidden mt-2 flex justify-center">
                    <img id="imagePreview" src="#" alt="Image preview" class="max-w-full h-auto max-h-48 rounded border border-gray-300">
                </div>
                
                <!-- Dimension error message (hidden by default) -->
                <div id="dimensionError" class="hidden text-sm text-red-600 font-medium">
                    Image must be square and with a minimum size of 600x600.
                </div>
            </div>
            <!-- Accepted formats hint (mobile-friendly) -->
            <p class="text-xs text-gray-400 mt-3">
                Allowed: PNG, JPG, JPEG, WEBP (max. 2MB) <br>
                <span class="text-[#850038]">Image must be square (aspect ratio 1:1)</span>
            </p>

            <!-- Instructions Accordion (unchanged) -->
            <div class="accordion space-y-2 mt-2">
                <details class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <summary class="font-medium text-[#850038] px-4 py-3 cursor-pointer list-none flex justify-between items-center">
                        <span>Instructions</span>
                        <svg fill="#850038" width="24px" height="24px" viewBox="-2 -2 24 24" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin" class="jam jam-chevron-circle-down-f">
                            <path d='M10 11.828L6.464 8.293A1 1 0 0 0 5.05 9.707l4.243 4.243a.997.997 0 0 0 1.414 0l4.243-4.243a1 1 0 1 0-1.414-1.414L10 11.828zM10 20C4.477 20 0 15.523 0 10S4.477 0 10 0s10 4.477 10 10-4.477 10-10 10z' />
                        </svg>
                    </summary>
                    <div class="px-4 pb-4 text-sm text-gray-700">
                        <ul class="space-y-2 list-disc list-inside">
                            <li>Click the "Choose File" button.</li>
                            <li>Select a square image (2x2 format) from your device.</li>
                            <li>Supported formats: <span class="font-medium">PNG, JPG, JPEG, WEBP</span>.</li>
                            <li>Ensure the image is clear.</li>
                            <li>Please upload a recent 2x2 inch photo (square aspect ratio).</li>
                            <li>Maximum file size: <span class="font-medium">2 MB</span>.</li>
                            <li>A preview will appear automatically after selection.</li>
                            {{--    <li>Click “Upload Image” to submit the file.</li> --}}
                        </ul>
                    </div>
                </details>
            </div>
        </div>
        
        <!-- Right Column: Sample Picture Format (unchanged) -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <div class="accordion space-y-2">
                <div class="bg-white rounded-lg shadow-sm">
                    <summary class="font-medium text-[#850038] px-4 py-3 cursor-pointer list-none flex justify-between items-center">
                        <span>Sample Picture Format</span>
                    </summary>
                    <div class="px-4 pb-4 text-sm text-gray-700">
                        <img src="{{ asset('images/2x2-photo-requirements.png') }}" alt="2x2 example photo" class="w-full h-auto rounded border border-gray-300">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-1 md:col-span-2">
    <!-- ========== NEW: Required Documents Section ========== -->
    <div class="mt-8 border-t pt-6 bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h3 class="text-lg font-semibold text-[#850038] mb-4">Other Documents</h3>
        
        <!-- Two-column grid for file inputs -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Medical Certificate -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Medical Certificate (required)</label>
                <input type="file" name="medical_certificate" accept=".pdf" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <!-- Student Directory -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Student Directory (required)</label>
                <input type="file" name="student_directory" accept=".pdf,.jpg,.jpeg,.png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <!-- Notice of Admission -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Notice of Admission (required)</label>
                <input type="file" name="notice_of_admission" accept=".pdf,.jpg,.jpeg,.png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <!-- Honorable Dismissal -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Honorable Dismissal (if applicable)</label>
                <input type="file" name="honorable_dismissal" accept=".pdf,.jpg,.jpeg,.png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <!-- TOR with Remarks (UP Cebu) -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">TOR with Remarks (UP Cebu) (required)</label>
                <input type="file" name="tor_remarks" accept=".pdf" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <!-- PSA Birth Certificate (or LCR if PSA illegible) -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">PSA Birth Certificate (or LCR if PSA is not legible)</label>
                <input type="file" name="birth_certificate" accept=".pdf,.jpg,.jpeg,.png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <!-- Marriage Certificate (conditional) -->
            <div id="marriage_certificate_container" class="hidden">
                <label class="block text-sm font-medium text-gray-700 mb-2">Marriage Certificate (photocopy)</label>
                <input type="file" name="marriage_certificate" accept=".pdf,.jpg,.jpeg,.png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <!-- PWD Card (conditional) -->
            <div id="pwd_card_container" class="hidden">
                <label class="block text-sm font-medium text-gray-700 mb-2">PWD Card (required)</label>
                <input type="file" name="pwd_card_container" accept=".pdf,.jpg,.jpeg,.png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

             <!-- Hyphenated and husbands full name (conditional) -->
            <div id="marriage_container" class="hidden">
                <label class="block text-sm font-medium text-gray-700 mb-2">Court Order re: Change of Name. (if applicable)</label>
                <input type="file" name="marriage_container" accept=".pdf,.jpg,.jpeg,.png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>
            
        </div>

        <!-- Hint for file formats -->
        <p class="text-xs text-gray-400 mt-3">
            Allowed: PDF, JPG, JPEG, PNG (max. 2MB per file)
        </p>
    </div>
</div>
    </div>
</div>

<!-- JavaScript for Preview & Dimension Validation (modified: removed upload button logic) -->
<script>
    (function() {
        const imageInput = document.getElementById('imageInput');
        const previewContainer = document.getElementById('previewContainer');
        const previewImage = document.getElementById('imagePreview');
        const dimensionError = document.getElementById('dimensionError');
        
        // State
        let isValidFile = false; // true only when a file with correct dimensions is selected

        // Helper to validate dimensions (square and minimum 600x600)
        function validateImageDimensions(file) {
            return new Promise((resolve) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = new Image();
                    img.onload = function() {
                        const isValid = (img.width === img.height) && img.width >= 600 && img.height >= 600;
                        resolve(isValid);
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            });
        }

        // Handle file selection
        imageInput.addEventListener('change', async function(event) {
            const file = event.target.files[0];
            
            if (!file) {
                // No file selected
                previewContainer.classList.add('hidden');
                dimensionError.classList.add('hidden');
                isValidFile = false;
                return;
            }

            // Show preview regardless of dimensions
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            };
            reader.readAsDataURL(file);

            // Check dimensions (square)
            const isValid = await validateImageDimensions(file);
            if (isValid) {
                dimensionError.classList.add('hidden');
                isValidFile = true;
            } else {
                dimensionError.classList.remove('hidden');
                isValidFile = false;
            }
        });

        // Prevent form submission if dimensions are invalid
        const form = imageInput.closest('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                if (!isValidFile) {
                    e.preventDefault();
                    dimensionError.classList.remove('hidden');
                }
            });
        }
    })();
</script>