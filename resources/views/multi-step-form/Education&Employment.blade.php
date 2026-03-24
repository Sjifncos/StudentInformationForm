<div class="step hidden" data-step="7">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-[24px] font-semibold text-[#0E6021]">
                Education & Employment
            </h1>
        </div>

        <!-- Highest Educational Attainment -->
        <div class="relative w-full">
            <label for="educationalattainment" class="font-medium">What is your highest educational attainment? <span class="text-red-500 ml-1">*</span></label>
            <select id="educationalattainment" name="educationalattainment" required 
                class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2 appearance-none">
                <option disabled selected>Please Select</option>
                <option value="bachelorsdegree">Bachelor’s degree</option>
                <option value="postbaccalaureate">Post-baccalaureate diploma / certificate</option>
                <option value="mastersdegree">Master’s degree</option>
                <option value="postmasters">Post-master’s diploma / certificate</option>
                <option value="doctoral">Doctoral degree (PhD, EdD, DBA, etc.)</option>
            </select>
        </div>
        
        <div class="relative w-full">
            <label for="undergraddegree" class="font-medium">
                What is your undergraduate degree?
                <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="undergraddegree" name="undergraddegree" type="text"
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>
        
        <!-- Dynamic Degree Entries -->
        <div class="relative w-full" id="degrees-container">
            <label class="font-medium">
                List any degrees, diplomas, or certificates
            </label>
            <div id="degree-inputs" class="space-y-2 mt-2">
                <div class="degree-entry flex items-center gap-2">
                    <input type="text" name="degrees[]" 
                        class="w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors"
                        placeholder="e.g., Master of Science in Computer Science">
                    <button type="button" class="remove-degree text-red-600 hover:text-red-800 p-2" title="Remove entry" style="display: none;">
                        <svg fill="#8A1538" width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m20.48 3.512c-2.172-2.171-5.172-3.514-8.486-3.514-6.628 0-12.001 5.373-12.001 12.001 0 3.314 1.344 6.315 3.516 8.487 2.172 2.171 5.172 3.514 8.486 3.514 6.628 0 12.001-5.373 12.001-12.001 0-3.314-1.344-6.315-3.516-8.487zm-1.542 15.427c-1.777 1.777-4.232 2.876-6.943 2.876-5.423 0-9.819-4.396-9.819-9.819 0-2.711 1.099-5.166 2.876-6.943 1.777-1.777 4.231-2.876 6.942-2.876 5.422 0 9.818 4.396 9.818 9.818 0 2.711-1.099 5.166-2.876 6.942z"/><path d="m13.537 12 3.855-3.855c.178-.194.287-.453.287-.737 0-.603-.489-1.091-1.091-1.091-.285 0-.544.109-.738.287l.001-.001-3.855 3.855-3.855-3.855c-.193-.178-.453-.287-.737-.287-.603 0-1.091.489-1.091 1.091 0 .285.109.544.287.738l-.001-.001 3.855 3.855-3.855 3.855c-.218.2-.354.486-.354.804 0 .603.489 1.091 1.091 1.091.318 0 .604-.136.804-.353l.001-.001 3.855-3.855 3.855 3.855c.2.218.486.354.804.354.603 0 1.091-.489 1.091-1.091 0-.318-.136-.604-.353-.804l-.001-.001z"/></svg>
                    </button>
                </div>
            </div>
            <p class="text-[12px] text-gray-500 mt-1">Completed after earning your bachelor’s degree.</p>
            <button type="button" id="add-degree" class="bg-[#8A1538] hover:bg-[#FFAD0D] text-white py-2 px-4 rounded inline-flex items-center gap-2 mt-4">
                <svg fill="#ffffff" width="16px" height="16px" viewBox="0 0 32 32" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><title/><path d="M27.2,8.22H23.78V5.42A3.42,3.42,0,0,0,20.36,2H5.42A3.42,3.42,0,0,0,2,5.42V20.36a3.42,3.42,0,0,0,3.42,3.42h2.8V27.2A2.81,2.81,0,0,0,11,30H27.2A2.81,2.81,0,0,0,30,27.2V11A2.81,2.81,0,0,0,27.2,8.22ZM5.42,21.91a1.55,1.55,0,0,1-1.55-1.55V5.42A1.54,1.54,0,0,1,5.42,3.87H20.36a1.55,1.55,0,0,1,1.55,1.55v2.8H11A2.81,2.81,0,0,0,8.22,11V21.91ZM28.13,27.2a.93.93,0,0,1-.93.93H11a.93.93,0,0,1-.93-.93V11a.93.93,0,0,1,.93-.93H27.2a.93.93,0,0,1,.93.93Z"/><path d="M24.09,18.18H20v-4a.93.93,0,1,0-1.86,0v4h-4a.93.93,0,0,0,0,1.86h4v4.05a.93.93,0,1,0,1.86,0V20h4.05a.93.93,0,1,0,0-1.86Z"/></svg>
                Add another entry
            </button>
        </div>
        
        <div class="relative w-full">
            <label for="lastschoolattended" class="font-medium">
                What was the last school you attended?
                <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="lastschoolattended" name="lastschoolattended" type="text"
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
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
        
        <!-- Employer Fields Container - Hidden by default, shown when income type is not "notearning" -->
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
            <label class="flex items-center space-x-2">
                <input type="checkbox" class="funding-checkbox h-4 w-4 scale-120">
                <span>Personal income from employment or self-employment</span>
            </label>
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="funding_sources[]" value="savings" class="funding-checkbox h-4 w-4">
                <span>Savings / personal funds</span>
            </label>
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="funding_sources[]" value="family_support" class="funding-checkbox h-4 w-4">
                <span>Family support</span>
            </label>
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="funding_sources[]" value="up_scholarship" class="funding-checkbox h-4 w-4">
                <span>UP scholarship or fellowship</span>
            </label>
            <label class="flex items-center space-x-2">
                <input type="checkbox" id="funding-other" name="funding_sources[]" value="other" class="funding-checkbox h-4 w-4">
                <span>Other (Please Specify)</span>
            </label>
        </div>
        
        <div class="relative w-full space-y-3">
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="funding_sources[]" value="private_scholarship" class="funding-checkbox h-4 w-4">
                <span>Private scholarship or fellowship</span>
            </label>
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="funding_sources[]" value="government_scholarship" class="funding-checkbox h-4 w-4">
                <span>Government scholarship (non-UP)</span>
            </label>
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="funding_sources[]" value="employer_sponsorship" class="funding-checkbox h-4 w-4">
                <span>Employer sponsorship / study leave with pay</span>
            </label>
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="funding_sources[]" value="educational_loan" class="funding-checkbox h-4 w-4">
                <span>Educational loan</span>
            </label>
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="funding_sources[]" value="passive_income" class="funding-checkbox h-4 w-4">
                <span>Passive income</span>
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
        // Handle income type change (existing code)
        const typeOfIncome = document.getElementById('typeofincome');
        if (typeOfIncome) {
            typeOfIncome.addEventListener('change', function() {
                const employerFieldsContainer = document.getElementById('employer-fields-container');
                const incomeContainer = document.getElementById('income-container');
                const nameOfEmployer = document.getElementById('nameofemployer');
                const natureOfWork = document.getElementById('natureofwork');
                const income = document.getElementById('income');

                if (this.value === 'employeed') {   // only for "Employed (salary from an employer)"
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
                    // Clear values when hidden
                    nameOfEmployer.value = '';
                    natureOfWork.value = '';
                    income.value = '';
                }
            });

            // Trigger change on page load to set initial visibility (hides fields by default)
            typeOfIncome.dispatchEvent(new Event('change'));
        }

        // Handle other funding checkbox
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

        // Dynamic degree entries
        const addButton = document.getElementById('add-degree');
        const container = document.getElementById('degree-inputs');

        function createDegreeEntry(value = '') {
            const entry = document.createElement('div');
            entry.className = 'degree-entry flex items-center gap-2 mt-2';
            entry.innerHTML = `
                <input type="text" name="degrees[]" value="${value.replace(/"/g, '&quot;')}"
                    class="w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors"
                    placeholder="e.g., Master of Science in Computer Science">
                <button type="button" class="remove-degree text-red-600 hover:text-red-800 p-2" title="Remove entry">
                    <svg fill="#8A1538" width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m20.48 3.512c-2.172-2.171-5.172-3.514-8.486-3.514-6.628 0-12.001 5.373-12.001 12.001 0 3.314 1.344 6.315 3.516 8.487 2.172 2.171 5.172 3.514 8.486 3.514 6.628 0 12.001-5.373 12.001-12.001 0-3.314-1.344-6.315-3.516-8.487zm-1.542 15.427c-1.777 1.777-4.232 2.876-6.943 2.876-5.423 0-9.819-4.396-9.819-9.819 0-2.711 1.099-5.166 2.876-6.943 1.777-1.777 4.231-2.876 6.942-2.876 5.422 0 9.818 4.396 9.818 9.818 0 2.711-1.099 5.166-2.876 6.942z"/><path d="m13.537 12 3.855-3.855c.178-.194.287-.453.287-.737 0-.603-.489-1.091-1.091-1.091-.285 0-.544.109-.738.287l.001-.001-3.855 3.855-3.855-3.855c-.193-.178-.453-.287-.737-.287-.603 0-1.091.489-1.091 1.091 0 .285.109.544.287.738l-.001-.001 3.855 3.855-3.855 3.855c-.218.2-.354.486-.354.804 0 .603.489 1.091 1.091 1.091.318 0 .604-.136.804-.353l.001-.001 3.855-3.855 3.855 3.855c.2.218.486.354.804.354.603 0 1.091-.489 1.091-1.091 0-.318-.136-.604-.353-.804l-.001-.001z"/></svg>    
                </button>
            `;
            const removeBtn = entry.querySelector('.remove-degree');
            removeBtn.addEventListener('click', function() {
                entry.remove();
            });
            return entry;
        }

        if (addButton && container) {
            addButton.addEventListener('click', function() {
                const lastInput = container.querySelector('.degree-entry:last-child input');
                // If the last input is empty, show toast instead of alert
                if (!lastInput || lastInput.value.trim() === '') {
                    // Use the global showToast function (must be defined in app.js)
                    if (typeof window.showToast === 'function') {
                        window.showToast('Please fill in the current degree entry before adding another.', 'error');
                    } else {
                        alert('Please fill in the current degree entry before adding another.');
                    }
                    return;
                }
                const newEntry = createDegreeEntry('');
                container.appendChild(newEntry);
            });

            // Also handle removal for the initial entry (remove button hidden initially, but we can show it if needed)
            const initialRemove = container.querySelector('.degree-entry .remove-degree');
            if (initialRemove) {
                initialRemove.addEventListener('click', function() {
                    // Prevent removing the last entry? Optionally allow but we'll allow if there's more than one
                    if (container.children.length > 1) {
                        this.closest('.degree-entry').remove();
                    } else {
                        if (typeof window.showToast === 'function') {
                            window.showToast('At least one degree entry is required.', 'error');
                        } else {
                            alert('At least one degree entry is required.');
                        }
                    }
                });
                // Initially hide remove on first if only one exists
                if (container.children.length === 1) {
                    initialRemove.style.display = 'none';
                }
            }
        }

        // Optional: Ensure at least one funding checkbox is selected before submit
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const checkboxes = document.querySelectorAll('.funding-checkbox:checked');
                if (checkboxes.length === 0) {
                    e.preventDefault();
                    if (typeof window.showToast === 'function') {
                        window.showToast('Please select at least one funding source.', 'error');
                    } else {
                        alert('Please select at least one funding source.');
                    }
                }
            });
        }
    })();
</script>