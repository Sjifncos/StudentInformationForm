<div class="step hidden" data-step="6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-[24px] font-semibold text-[#0E6021]">
                Academic Matters
            </h1>
        </div>
        <div class="relative w-full">
            <label for="seniorhighschoolattended" class="font-medium">
                Senior High School Attended
                <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="seniorhighschoolattended" name="seniorhighschoolattended" type="text"
                class="peer w-full px-4 py-3 text-base bg-white outline-none 
                    border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
            <p class="text-[12px] text-gray-500 mt-1">ex. University of the Philippines Cebu High School</p>
        </div>
        <div class="relative w-full">
            <label for="locationofhighschool" class="font-medium">
                Location of High School
                <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="locationofhighschool" name="locationofhighschool" type="text"
                class="peer w-full px-4 py-3 text-base bg-white outline-none 
                    border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
            <p class="text-[12px] text-gray-500 mt-1">ex. Lahug, Cebu City</p>
        </div>
        
        <!-- Honors Received -->
        <div class="relative w-full">
                <label for="honorsreceived" name="locationofhighschool" class="font-medium">Honors received in Senior High School <span class="text-red-500 ml-1">*</span></label>
                <select id="honorsreceived" name="honorsreceived" required 
                class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
                focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
                appearance-none">
                    <option disabled selected>Please Select</option>
                    <option value="none">None</option>
                    <option value="honor">with Honors</option>
                    <option value="highhonor">with High Honors</option>
                    <option value="highesthonor">with Highest Honors</option>
                </select>
                <span class="error-message text-red-500 text-sm hidden" data-for="honorsreceived"></span>
        </div>

        {{--
        <!-- Scholarship Question -->
        <div class="relative w-full">
            <label for="scholarship" class="font-medium">
                Are you on a scholarship other than <span class="font-semibold text-[#8A1538]">
                    <a target="_blank" href="https://www.officialgazette.gov.ph/2017/08/03/republic-act-no-10931/"
                    class="font-medium text-[#8A1538] hover:text-[#8A1538]">RA 10931</a></span>
                <span class="text-red-500 ml-1">*</span>
            </label>
            <select id="scholarship" name="scholarship" required
                class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] focus:outline-none
                    focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
                    appearance-none">
                <option disabled selected>Please Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            <span class="error-message text-red-500 text-sm hidden" data-for="scholarship"></span>
            <p class="text-[12px] text-gray-500 mt-1">(e.g. from government agencies or private institutions)</p>
        </div>
        --}}
        <div class="relative w-full">
            <label class="font-medium">
                Are you on a scholarship other than <span class="font-semibold text-[#8A1538]">
                    <a target="_blank" href="https://www.officialgazette.gov.ph/2017/08/03/republic-act-no-10931/"
                    class="font-medium text-[#8A1538] hover:text-[#8A1538]">RA 10931</a></span>
                <span class="text-red-500 ml-0.5">*</span>
            </label>
            <div class="flex gap-3 mt-1">
                <label class="group relative flex items-right justify-right gap-3 px-8 py-3.5 rounded-xl  cursor-pointer transition-all duration-200 {{-- hover:bg-green-50 has-[:checked]:bg-green-50 --}} flex-1">
                    <input type="radio" name="scholarship" value="yes" class="sr-only peer">
                    <span class="w-4 h-4 rounded-full border-2 border-gray-400 flex items-center justify-center transition-all duration-200 group-has-[:checked]:border-[#0E6021]">
                        <span class="w-2 h-2 rounded-full bg-[#0E6021] scale-0 transition-transform duration-200 group-has-[:checked]:scale-100"></span>
                    </span>
                    <span class="text-sm font-medium text-gray-500 group-has-[:checked]:text-[#0E6021] transition-colors duration-200">Yes</span>
                </label>

                <label class="group relative flex items-right justify-right gap-3 px-8 py-3.5 rounded-xl  cursor-pointer transition-all duration-200 {{-- hover:bg-red-50 has-[:checked]:bg-red-50 --}} flex-1">
                    <input type="radio" name="scholarship" value="no" class="sr-only peer">
                    <span class="w-4 h-4 rounded-full border-2 border-gray-400 flex items-center justify-center transition-all duration-200 group-has-[:checked]:border-[#850038]">
                        <span class="w-2 h-2 rounded-full bg-[#850038] scale-0 transition-transform duration-200 group-has-[:checked]:scale-100"></span>
                    </span>
                    <span class="text-sm font-medium text-gray-500 group-has-[:checked]:text-[#850038] transition-colors duration-200">No</span>
                </label>
            </div>
        </div>


        <!-- Specify Scholarship -->
        <div id="specifyScholarshipWrapper" class="col-span-1 md:col-span-2 hidden">
            <div class="relative w-full">
                <label for="specifyscholarship" class="font-medium">
                    Please specify the scholarship.
                    <span class="text-red-500 ml-1">*</span>
                </label>

                <!-- Container for dynamic scholarship entries -->
                <div id="scholarship-inputs" class="space-y-2 mt-2">
                    <div class="scholarship-entry flex items-center gap-2">
                        <input type="text" name="scholarships[]" id="specifyscholarship"
                            class="w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors"
                            placeholder="e.g., DOST-SEI Merit Scholarship">
                        <button type="button" class="remove-scholarship text-red-600 hover:text-red-800 p-2" title="Remove entry" style="display: none;">
                            <svg fill="#8A1538" width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="m20.48 3.512c-2.172-2.171-5.172-3.514-8.486-3.514-6.628 0-12.001 5.373-12.001 12.001 0 3.314 1.344 6.315 3.516 8.487 2.172 2.171 5.172 3.514 8.486 3.514 6.628 0 12.001-5.373 12.001-12.001 0-3.314-1.344-6.315-3.516-8.487zm-1.542 15.427c-1.777 1.777-4.232 2.876-6.943 2.876-5.423 0-9.819-4.396-9.819-9.819 0-2.711 1.099-5.166 2.876-6.943 1.777-1.777 4.231-2.876 6.942-2.876 5.422 0 9.818 4.396 9.818 9.818 0 2.711-1.099 5.166-2.876 6.942z"/>
                                <path d="m13.537 12 3.855-3.855c.178-.194.287-.453.287-.737 0-.603-.489-1.091-1.091-1.091-.285 0-.544.109-.738.287l.001-.001-3.855 3.855-3.855-3.855c-.193-.178-.453-.287-.737-.287-.603 0-1.091.489-1.091 1.091 0 .285.109.544.287.738l-.001-.001 3.855 3.855-3.855 3.855c-.218.2-.354.486-.354.804 0 .603.489 1.091 1.091 1.091.318 0 .604-.136.804-.353l.001-.001 3.855-3.855 3.855 3.855c.2.218.486.354.804.354.603 0 1.091-.489 1.091-1.091 0-.318-.136-.604-.353-.804l-.001-.001z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <p class="text-[12px] text-gray-500 mt-1">List any other scholarships you have received.</p>
            </div>

            <button type="button" id="add-scholarship" class="bg-[#8A1538] hover:bg-[#FFAD0D] text-white py-2 px-4 rounded-full inline-flex items-center gap-2 mt-4">
                <svg fill="#ffffff" width="16px" height="16px" viewBox="0 0 32 32" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg">
                    <title/><path d="M27.2,8.22H23.78V5.42A3.42,3.42,0,0,0,20.36,2H5.42A3.42,3.42,0,0,0,2,5.42V20.36a3.42,3.42,0,0,0,3.42,3.42h2.8V27.2A2.81,2.81,0,0,0,11,30H27.2A2.81,2.81,0,0,0,30,27.2V11A2.81,2.81,0,0,0,27.2,8.22ZM5.42,21.91a1.55,1.55,0,0,1-1.55-1.55V5.42A1.54,1.54,0,0,1,5.42,3.87H20.36a1.55,1.55,0,0,1,1.55,1.55v2.8H11A2.81,2.81,0,0,0,8.22,11V21.91ZM28.13,27.2a.93.93,0,0,1-.93.93H11a.93.93,0,0,1-.93-.93V11a.93.93,0,0,1,.93-.93H27.2a.93.93,0,0,1,.93.93Z"/><path d="M24.09,18.18H20v-4a.93.93,0,1,0-1.86,0v4h-4a.93.93,0,0,0,0,1.86h4v4.05a.93.93,0,1,0,1.86,0V20h4.05a.93.93,0,1,0,0-1.86Z"/>
                </svg>
                Add another entry
            </button>
        </div>
    </div>
</div>
<script>
    (function() {
        // Get radio buttons and containers
        const scholarshipRadios = document.querySelectorAll('input[name="scholarship"]');
        const specifyWrapper = document.getElementById('specifyScholarshipWrapper');
        const container = document.getElementById('scholarship-inputs');
        const addBtn = document.getElementById('add-scholarship');

        // Helper: get selected scholarship value
        function getSelectedScholarship() {
            let selected = null;
            scholarshipRadios.forEach(radio => {
                if (radio.checked) selected = radio.value;
            });
            return selected;
        }

        // Helper: create a new scholarship entry
        function createScholarshipEntry(value = '') {
            const entry = document.createElement('div');
            entry.className = 'scholarship-entry flex items-center gap-2';
            entry.innerHTML = `
                <input type="text" name="scholarships[]" value="${value.replace(/"/g, '&quot;')}"
                    class="w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors"
                    placeholder="e.g., DOST-SEI Merit Scholarship">
                <button type="button" class="remove-scholarship text-red-600 hover:text-red-800 p-2" title="Remove entry">
                    <svg fill="#8A1538" width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m20.48 3.512c-2.172-2.171-5.172-3.514-8.486-3.514-6.628 0-12.001 5.373-12.001 12.001 0 3.314 1.344 6.315 3.516 8.487 2.172 2.171 5.172 3.514 8.486 3.514 6.628 0 12.001-5.373 12.001-12.001 0-3.314-1.344-6.315-3.516-8.487zm-1.542 15.427c-1.777 1.777-4.232 2.876-6.943 2.876-5.423 0-9.819-4.396-9.819-9.819 0-2.711 1.099-5.166 2.876-6.943 1.777-1.777 4.231-2.876 6.942-2.876 5.422 0 9.818 4.396 9.818 9.818 0 2.711-1.099 5.166-2.876 6.942z"/>
                        <path d="m13.537 12 3.855-3.855c.178-.194.287-.453.287-.737 0-.603-.489-1.091-1.091-1.091-.285 0-.544.109-.738.287l.001-.001-3.855 3.855-3.855-3.855c-.193-.178-.453-.287-.737-.287-.603 0-1.091.489-1.091 1.091 0 .285.109.544.287.738l-.001-.001 3.855 3.855-3.855 3.855c-.218.2-.354.486-.354.804 0 .603.489 1.091 1.091 1.091.318 0 .604-.136.804-.353l.001-.001 3.855-3.855 3.855 3.855c.2.218.486.354.804.354.603 0 1.091-.489 1.091-1.091 0-.318-.136-.604-.353-.804l-.001-.001z"/>
                    </svg>
                </button>
            `;
            const removeBtn = entry.querySelector('.remove-scholarship');
            removeBtn.addEventListener('click', function() {
                if (container.children.length > 1) {
                    entry.remove();
                    if (container.children.length === 1) {
                        const firstRemove = container.querySelector('.scholarship-entry:first-child .remove-scholarship');
                        if (firstRemove) firstRemove.style.display = 'none';
                    }
                } else {
                    if (typeof window.showToast === 'function') {
                        window.showToast('At least one scholarship entry is required.', 'error');
                    } else {
                        alert('At least one scholarship entry is required.');
                    }
                }
            });
            return entry;
        }

        // Toggle wrapper visibility and clear/reset entries
        function toggleScholarshipWrapper() {
            const selected = getSelectedScholarship();
            if (selected === 'yes') {
                specifyWrapper.classList.remove('hidden');
                // Hide remove button on first entry if only one exists
                const firstRemove = container.querySelector('.scholarship-entry:first-child .remove-scholarship');
                if (firstRemove && container.children.length === 1) {
                    firstRemove.style.display = 'none';
                }
            } else {
                specifyWrapper.classList.add('hidden');
                // Clear all entries except the first one
                while (container.children.length > 1) {
                    container.lastElementChild.remove();
                }
                const firstInput = container.querySelector('.scholarship-entry:first-child input');
                if (firstInput) firstInput.value = '';
                const firstRemove = container.querySelector('.scholarship-entry:first-child .remove-scholarship');
                if (firstRemove) firstRemove.style.display = 'none';
            }
        }

        // Event listener for radio changes
        scholarshipRadios.forEach(radio => {
            radio.addEventListener('change', toggleScholarshipWrapper);
        });

        // Add new scholarship entry
        if (addBtn) {
            addBtn.addEventListener('click', function() {
                const selected = getSelectedScholarship();
                if (selected !== 'yes') return;

                const lastInput = container.querySelector('.scholarship-entry:last-child input');
                if (!lastInput || lastInput.value.trim() === '') {
                    if (typeof window.showToast === 'function') {
                        window.showToast('Please fill in the current scholarship entry before adding another.', 'error');
                    } else {
                        alert('Please fill in the current scholarship entry before adding another.');
                    }
                    return;
                }
                const newEntry = createScholarshipEntry('');
                container.appendChild(newEntry);
                if (container.children.length === 2) {
                    const firstRemove = container.querySelector('.scholarship-entry:first-child .remove-scholarship');
                    if (firstRemove) firstRemove.style.display = 'inline-flex';
                }
            });
        }

        // Initial toggle based on pre‑selected radio (if any)
        toggleScholarshipWrapper();
    })();
</script>