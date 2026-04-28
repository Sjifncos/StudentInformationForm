<div class="step hidden" data-step="7">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-[24px] font-semibold text-[#0E6021]">
                Education & Employment
            </h1>
        </div>

        <!-- Dynamic Educational Background Entries -->
        <div class="col-span-1 md:col-span-2">
            <label class="font-medium block mb-2">
                Educational Background
                <span class="text-red-500 ml-1">*</span>
            </label>
            <div id="educational-entries" class="space-y-6">
                <div class="educational-entry bg-[#FFFFFF] p-4 rounded-lg border border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="font-medium">School <span class="text-red-500">*</span></label>
                            <input type="text" name="schools[]" class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2">
                        </div>
                        <div>
                            <label class="font-medium">Program <span class="text-red-500">*</span></label>
                            <input type="text" name="programs[]" class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2">
                        </div>
                        <div>
                            <label class="font-medium">Degree <span class="text-red-500">*</span></label>
                            <input type="text" name="degrees[]" class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2">
                        </div>
                        <div>
                            <label class="font-medium">Year Graduated/ Last Attended <span class="text-red-500">*</span></label>
                            <input type="text" name="year_graduateds[]" 
                               class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"
                                maxlength="4" inputmode="numeric">
                        </div>
                        <div class="last-school-container">
                            <label class="font-medium">
                                Is this your last school attended?
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="flex gap-3 mt-1">
                                <label class="group relative flex items-right justify-right gap-3 px-8 py-3.5 rounded-xl cursor-pointer transition-all duration-200 flex-1">
                                    <input type="radio" name="last_school_attended" value="yes" class="sr-only peer">
                                    <span class="w-4 h-4 rounded-full border-2 border-gray-400 flex items-center justify-center transition-all duration-200 group-has-[:checked]:border-[#0E6021]">
                                        <span class="w-2 h-2 rounded-full bg-[#0E6021] scale-0 transition-transform duration-200 group-has-[:checked]:scale-100"></span>
                                    </span>
                                    <span class="text-sm font-medium text-gray-500 group-has-[:checked]:text-[#0E6021] transition-colors duration-200">Yes</span>
                                </label>

                                <label class="group relative flex items-right justify-right gap-3 px-8 py-3.5 rounded-xl cursor-pointer transition-all duration-200 flex-1">
                                    <input type="radio" name="last_school_attended" value="no" class="sr-only peer">
                                    <span class="w-4 h-4 rounded-full border-2 border-gray-400 flex items-center justify-center transition-all duration-200 group-has-[:checked]:border-[#850038]">
                                        <span class="w-2 h-2 rounded-full bg-[#850038] scale-0 transition-transform duration-200 group-has-[:checked]:scale-100"></span>
                                    </span>
                                    <span class="text-sm font-medium text-gray-500 group-has-[:checked]:text-[#850038] transition-colors duration-200">No</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="button"
                        class="remove-entry text-red-600 hover:text-red-800 mt-2 text-sm hidden flex items-center gap-1">
                        <span>Remove</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21ZM7 13H17V11H7V13Z"
                                fill="currentColor" />
                        </svg>
                    </button>
                </div>
            </div>
            <button type="button" id="add-educational-entry" class="bg-[#8A1538] hover:bg-[#FFAD0D] text-white py-2 px-4 rounded-full inline-flex items-center gap-2 mt-4">
                <svg fill="#ffffff" width="16px" height="16px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M27.2,8.22H23.78V5.42A3.42,3.42,0,0,0,20.36,2H5.42A3.42,3.42,0,0,0,2,5.42V20.36a3.42,3.42,0,0,0,3.42,3.42h2.8V27.2A2.81,2.81,0,0,0,11,30H27.2A2.81,2.81,0,0,0,30,27.2V11A2.81,2.81,0,0,0,27.2,8.22ZM5.42,21.91a1.55,1.55,0,0,1-1.55-1.55V5.42A1.54,1.54,0,0,1,5.42,3.87H20.36a1.55,1.55,0,0,1,1.55,1.55v2.8H11A2.81,2.81,0,0,0,8.22,11V21.91ZM28.13,27.2a.93.93,0,0,1-.93.93H11a.93.93,0,0,1-.93-.93V11a.93.93,0,0,1,.93-.93H27.2a.93.93,0,0,1,.93.93Z"/><path d="M24.09,18.18H20v-4a.93.93,0,1,0-1.86,0v4h-4a.93.93,0,0,0,0,1.86h4v4.05a.93.93,0,1,0,1.86,0V20h4.05a.93.93,0,1,0,0-1.86Z"/></svg>
                Add another entry
            </button>
            <p class="text-[12px] text-gray-500 mt-2">Add all educational backgrounds (e.g., Bachelor's, Master's, etc.).</p>
        </div>

        <!-- Primary Source Income -->
        <div class="relative w-full">
            <label for="typeofincome" class="font-medium">Primary Source of Income <span class="text-red-500 ml-1">*</span></label>
            <select id="typeofincome" name="typeofincome" required 
                class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2 appearance-none">
                <option disabled selected>Please Select</option>
                <option value="employeed">Employed (salary from an employer)</option>
                <option value="self-employeed">Self-employed / Freelance / Professional practice</option>
                <option value="combination">Combination of employment and self-employment</option>
                <option value="passiveincome">Passive income (e.g., investments, rental, family trust)</option>
                <option value="notearning">Not currently earning income</option>
            </select>
            <p class="text-[12px] text-gray-500 mt-1">Please select the option that represents your main source of income, even if you have multiple sources.</p>
        </div>
        
        <!-- Employer Fields Container - Hidden by default, shown when income type is "employeed" -->
        <div id="employer-fields-container" class="contents hidden">
            <div class="relative w-full">
                <label for="nameofemployer" class="font-medium">
                    Name of Employer
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <input id="nameofemployer" name="nameofemployer" type="text"
                    class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
            </div>
            <div class="relative w-full">
                <label for="natureofwork" class="font-medium">
                    Nature of Work or Profession
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <input id="natureofwork" name="natureofwork" type="text"
                    class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
            </div>
        </div>
        
        <!-- Monthly Gross Earnings Container - Hidden by default -->
        <div id="income-container" class="relative w-full mt-[-2] hidden"> 
            <div class="relative w-full">
                <label for="income" class="font-medium">Monthly Gross Earnings (before taxes) <span class="text-red-500 ml-1">*</span></label>
                <select id="income" name="income" required 
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2 appearance-none">
                    <option disabled selected>Please Select</option>
                    <option value="below20k">Below ₱20,000</option>
                    <option value="20k-39k">₱20,000 - ₱39,999</option>
                    <option value="40k-59k">₱40,000 - ₱59,999</option>
                    <option value="60k-79k">₱60,000 - ₱79,999</option>
                    <option value="80k-99k">₱80,000 - ₱99,999</option>
                    <option value="100k-149k">₱100,000 - ₱149,999</option>
                    <option value="150kup">₱150,000 or higher</option>
                </select>
            </div>
        </div>
        
        <div class="col-span-1 md:col-span-2">
            <p class="font-medium">
                Primary Source(s) of Funding for Your Graduate Studies<br> (select all that apply)
                <span class="text-red-500">*</span>
            </p>
        </div>

        <div class="relative w-full space-y-3">
            <label class="flex items-start space-x-3">
                <input type="checkbox" name="funding_sources[]" value="personal_income" class="funding-checkbox h-4 w-4 mt-0.5 shrink-0">
                <span>Personal income from employment or self-employment</span>
            </label>
            <label class="flex items-start space-x-3">
                <input type="checkbox" name="funding_sources[]" value="savings" class="funding-checkbox h-4 w-4 mt-0.5 shrink-0">
                <span>Savings / personal funds</span>
            </label>
            <label class="flex items-start space-x-3">
                <input type="checkbox" name="funding_sources[]" value="family_support" class="funding-checkbox h-4 w-4 mt-0.5 shrink-0">
                <span>Family support</span>
            </label>
        </div>

        <div class="relative w-full space-y-3">
            <label class="flex items-start space-x-3">
                <input type="checkbox" name="funding_sources[]" value="employer_sponsorship" class="funding-checkbox h-4 w-4 mt-0.5 shrink-0">
                <span>Employer sponsorship / study leave with pay</span>
            </label>
            <label class="flex items-start space-x-3">
                <input type="checkbox" name="funding_sources[]" value="educational_loan" class="funding-checkbox h-4 w-4 mt-0.5 shrink-0">
                <span>Educational loan</span>
            </label>
            <label class="flex items-start space-x-3">
                <input type="checkbox" name="funding_sources[]" value="passive_income" class="funding-checkbox h-4 w-4 mt-0.5 shrink-0">
                <span>Passive income</span>
            </label>
        </div>

        <div class="relative w-full space-y-3 -mt-4">
            <label class="flex items-start space-x-3">
                <input type="checkbox" id="funding-other" name="funding_sources[]" value="other" class="funding-checkbox h-4 w-4 mt-0.5 shrink-0">
                <span>Other (Please Specify)</span>
            </label>
        </div>

        <div id="funding-other-wrapper" class="col-span-1 md:col-span-2 hidden">
            <div class="relative w-full">
                <label for="funding-other-input" class="font-medium">
                    Please Specify the other fundings.
                </label>
                <input id="funding-other-input" name="funding-other-input" type="text" 
                    class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
            </div>
        </div>
    </div> 
</div>

<script>
    (function() {
        // Helper: restrict year input to digits and max length 4
        function restrictYearInput(input) {
            input.addEventListener('input', function(e) {
                let value = this.value.replace(/\D/g, '');
                if (value.length > 4) value = value.slice(0, 4);
                this.value = value;
            });
        }

        // Hidden field to store the last school attended (to satisfy validation)
        let lastSchoolHidden = document.getElementById('lastschoolattended_hidden');
        if (!lastSchoolHidden) {
            lastSchoolHidden = document.createElement('input');
            lastSchoolHidden.type = 'hidden';
            lastSchoolHidden.name = 'lastschoolattended';
            lastSchoolHidden.id = 'lastschoolattended_hidden';
            document.querySelector('.step[data-step="7"]').appendChild(lastSchoolHidden);
        }

        // Update hidden field based on which entry has "Yes" selected
        function updateLastSchoolHidden() {
            const entries = document.querySelectorAll('.educational-entry');
            let selectedSchool = '';
            for (let i = 0; i < entries.length; i++) {
                const yesRadio = entries[i].querySelector('input[name="last_school_attended"][value="yes"]');
                if (yesRadio && yesRadio.checked) {
                    const schoolInput = entries[i].querySelector('input[name="schools[]"]');
                    if (schoolInput) selectedSchool = schoolInput.value.trim();
                    break;
                }
            }
            lastSchoolHidden.value = selectedSchool;
        }

        // Update visibility of "last school attended" container based on which entry has "Yes"
        function updateLastSchoolVisibility() {
            const entries = document.querySelectorAll('.educational-entry');
            let selectedYesEntry = null;

            for (let i = 0; i < entries.length; i++) {
                const yesRadio = entries[i].querySelector('input[name="last_school_attended"][value="yes"]');
                if (yesRadio && yesRadio.checked) {
                    selectedYesEntry = entries[i];
                    break;
                }
            }

            for (let i = 0; i < entries.length; i++) {
                const container = entries[i].querySelector('.last-school-container');
                if (container) {
                    if (selectedYesEntry && entries[i] !== selectedYesEntry) {
                        container.style.display = 'none';
                    } else {
                        container.style.display = '';
                    }
                }
            }
            updateLastSchoolHidden();
        }

        // Create a new educational entry (clone without checked radios)
        function createEducationalEntry(hideLastSchool = false) {
            const template = document.querySelector('.educational-entry');
            const newEntry = template.cloneNode(true);
            
            // Clear all input values
            newEntry.querySelectorAll('input, select, textarea').forEach(input => {
                if (input.type !== 'radio') input.value = '';
            });
            
            // Uncheck all radio buttons in the new entry
            newEntry.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.checked = false;
            });
            
            // Handle last school container visibility
            const lastSchoolContainer = newEntry.querySelector('.last-school-container');
            if (lastSchoolContainer) {
                lastSchoolContainer.style.display = hideLastSchool ? 'none' : '';
            }
            
            // Setup remove button
            const removeBtn = newEntry.querySelector('.remove-entry');
            removeBtn.classList.remove('hidden');
            removeBtn.addEventListener('click', function() {
                const entriesContainer = document.getElementById('educational-entries');
                if (entriesContainer.children.length > 1) {
                    const wasYesSelected = this.closest('.educational-entry').querySelector('input[name="last_school_attended"][value="yes"]')?.checked;
                    newEntry.remove();
                    if (wasYesSelected) {
                        // If the removed entry had "Yes", clear hidden field and re-evaluate visibility
                        updateLastSchoolVisibility();
                    } else {
                        updateLastSchoolHidden();
                    }
                    updateRemoveButtons();
                } else {
                    if (typeof window.showToast === 'function') {
                        window.showToast('At least one educational background is required.', 'error');
                    } else {
                        alert('At least one educational background is required.');
                    }
                }
            });
            
            // Apply year restriction
            const yearInput = newEntry.querySelector('input[name="year_graduateds[]"]');
            if (yearInput) restrictYearInput(yearInput);
            
            // Add change listeners for radios
            const radios = newEntry.querySelectorAll('input[name="last_school_attended"]');
            radios.forEach(radio => {
                radio.addEventListener('change', function() {
                    // When a radio changes, we must ensure only one "Yes" exists across all entries
                    if (this.value === 'yes' && this.checked) {
                        // Uncheck "Yes" in all other entries
                        document.querySelectorAll('.educational-entry').forEach(entry => {
                            if (entry !== newEntry) {
                                const otherYes = entry.querySelector('input[name="last_school_attended"][value="yes"]');
                                if (otherYes) otherYes.checked = false;
                            }
                        });
                    }
                    updateLastSchoolVisibility();
                });
            });
            
            return newEntry;
        }

        // Update remove buttons visibility (only show on entries beyond the first)
        function updateRemoveButtons() {
            const entries = document.querySelectorAll('.educational-entry');
            entries.forEach((entry, index) => {
                const removeBtn = entry.querySelector('.remove-entry');
                if (entries.length === 1) {
                    removeBtn.classList.add('hidden');
                } else {
                    removeBtn.classList.remove('hidden');
                }
            });
        }

        // Observe school input changes to update hidden field when "Yes" is selected
        function bindSchoolInputChange(entry) {
            const schoolInput = entry.querySelector('input[name="schools[]"]');
            if (schoolInput) {
                schoolInput.addEventListener('input', function() {
                    const yesRadio = entry.querySelector('input[name="last_school_attended"][value="yes"]');
                    if (yesRadio && yesRadio.checked) {
                        updateLastSchoolHidden();
                    }
                });
            }
        }

        // Initialize all existing entries
        function initExistingEntries() {
            document.querySelectorAll('.educational-entry').forEach(entry => {
                // Ensure remove button state
                const removeBtn = entry.querySelector('.remove-entry');
                if (removeBtn) removeBtn.classList.add('hidden');
                
                // Add radio change listeners
                entry.querySelectorAll('input[name="last_school_attended"]').forEach(radio => {
                    radio.removeEventListener('change', updateLastSchoolVisibility);
                    radio.addEventListener('change', updateLastSchoolVisibility);
                });
                
                // Add school input listener
                bindSchoolInputChange(entry);
                
                // Year restriction
                const yearInput = entry.querySelector('input[name="year_graduateds[]"]');
                if (yearInput) restrictYearInput(yearInput);
            });
            updateLastSchoolVisibility();
        }

        const entriesContainer = document.getElementById('educational-entries');
        const addEntryBtn = document.getElementById('add-educational-entry');

        if (addEntryBtn) {
            addEntryBtn.addEventListener('click', function() {
                const entries = entriesContainer.querySelectorAll('.educational-entry');
                const lastEntry = entries[entries.length - 1];
                const inputs = lastEntry.querySelectorAll('input:not([type="radio"]), select, textarea');
                let incomplete = false;
                inputs.forEach(input => {
                    if (!input.value.trim()) incomplete = true;
                });
                if (incomplete) {
                    if (typeof window.showToast === 'function') {
                        window.showToast('Please complete the current entry before adding another.', 'error');
                    } else {
                        alert('Please complete the current entry before adding another.');
                    }
                    return;
                }

                // Validate year not > current year
                const yearInput = lastEntry.querySelector('input[name="year_graduateds[]"]');
                if (yearInput) {
                    const yearValue = parseInt(yearInput.value.trim(), 10);
                    const currentYear = new Date().getFullYear();
                    if (!isNaN(yearValue) && yearValue > currentYear) {
                        if (typeof window.showToast === 'function') {
                            window.showToast('Year Graduated must not be higher than the Current Year', 'error');
                        } else {
                            alert('Year Graduated must not be higher than the Current Year');
                        }
                        return;
                    }
                }

                // Check if any "Yes" is already selected
                let hasYesSelected = false;
                document.querySelectorAll('input[name="last_school_attended"][value="yes"]').forEach(radio => {
                    if (radio.checked) hasYesSelected = true;
                });

                const newEntry = createEducationalEntry(hasYesSelected);
                entriesContainer.appendChild(newEntry);
                bindSchoolInputChange(newEntry);
                updateRemoveButtons();
                updateLastSchoolVisibility();
            });
        }

        // Initial setup
        initExistingEntries();
        updateRemoveButtons();
        
        // Observe changes to entries for remove buttons
        const observer = new MutationObserver(updateRemoveButtons);
        observer.observe(entriesContainer, { childList: true, subtree: true });
        
        // ========== Income type change ==========
        const typeOfIncome = document.getElementById('typeofincome');
        if (typeOfIncome) {
            typeOfIncome.addEventListener('change', function() {
                const employerFieldsContainer = document.getElementById('employer-fields-container');
                const incomeContainer = document.getElementById('income-container');
                const nameOfEmployer = document.getElementById('nameofemployer');
                const natureOfWork = document.getElementById('natureofwork');
                const income = document.getElementById('income');

                if (this.value === 'employeed') {
                    employerFieldsContainer.classList.remove('hidden');
                    incomeContainer.classList.remove('hidden');
                    nameOfEmployer.setAttribute('required', 'required');
                    natureOfWork.setAttribute('required', 'required');
                    income.setAttribute('required', 'required');
                } else {
                    employerFieldsContainer.classList.add('hidden');
                    incomeContainer.classList.add('hidden');
                    nameOfEmployer.removeAttribute('required');
                    natureOfWork.removeAttribute('required');
                    income.removeAttribute('required');
                    nameOfEmployer.value = '';
                    natureOfWork.value = '';
                    income.value = '';
                }
            });
            typeOfIncome.dispatchEvent(new Event('change'));
        }

        // ========== Funding Other ==========
        const fundingOther = document.getElementById('funding-other');
        if (fundingOther) {
            fundingOther.addEventListener('change', function() {
                const otherWrapper = document.getElementById('funding-other-wrapper');
                const otherInput = document.getElementById('funding-other-input');
                if (this.checked) {
                    otherWrapper.classList.remove('hidden');
                    otherInput.setAttribute('required', 'required');
                } else {
                    otherWrapper.classList.add('hidden');
                    otherInput.removeAttribute('required');
                    otherInput.value = '';
                }
            });
        }
    })();
</script>