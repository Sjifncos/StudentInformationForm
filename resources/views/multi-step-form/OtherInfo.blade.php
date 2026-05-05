<div class="step hidden" data-step="6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-[24px] font-semibold text-[#850038]">
                Other Information
            </h1>
        </div>

        {{--
        <!-- first person in your immediate family-->
        <div class="relative w-full">
            <label for="firstperson_to_attend_college" class="font-medium">
                Are you the first person in your immediate family to attend College/University?<span class="text-red-500 ml-1">*</span>
            </label>
            <select id="firstperson_to_attend_college" name="firstperson_to_attend_college" required 
            class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
            focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
            appearance-none">
                <option disabled selected>Please Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        --}}
        <div class="relative w-full">
            <label class="font-medium">
                Are you the first person in your immediate family to attend College/University?<span class="text-red-500 ml-1">*</span>
            </label>
            <div class="flex gap-3 mt-1">
                <label class="group relative flex items-right justify-right gap-3 px-8 py-3.5 rounded-xl  cursor-pointer transition-all duration-200 {{-- hover:bg-green-50 has-[:checked]:bg-green-50 --}} flex-1">
                    <input type="radio" name="firstperson_to_attend_college" value="yes" class="sr-only peer">
                    <span class="w-4 h-4 rounded-full border-2 border-gray-400 flex items-center justify-center transition-all duration-200 group-has-[:checked]:border-[#0E6021]">
                        <span class="w-2 h-2 rounded-full bg-[#0E6021] scale-0 transition-transform duration-200 group-has-[:checked]:scale-100"></span>
                    </span>
                    <span class="text-sm font-medium text-gray-500 group-has-[:checked]:text-[#0E6021] transition-colors duration-200">Yes</span>
                </label>

                <label class="group relative flex items-right justify-right gap-3 px-8 py-3.5 rounded-xl  cursor-pointer transition-all duration-200 {{-- hover:bg-red-50 has-[:checked]:bg-red-50 --}} flex-1">
                    <input type="radio" name="firstperson_to_attend_college" value="no" class="sr-only peer">
                    <span class="w-4 h-4 rounded-full border-2 border-gray-400 flex items-center justify-center transition-all duration-200 group-has-[:checked]:border-[#850038]">
                        <span class="w-2 h-2 rounded-full bg-[#850038] scale-0 transition-transform duration-200 group-has-[:checked]:scale-100"></span>
                    </span>
                    <span class="text-sm font-medium text-gray-500 group-has-[:checked]:text-[#850038] transition-colors duration-200">No</span>
                </label>
            </div>
        </div>
        {{--
        <!-- first person in your immediate family to attend the UP-->
        <div class="relative w-full">
            <label for="firstpersonup" class="font-medium">
                Are you the first person in your immediate family to attend the University of the Philippines?<span class="text-red-500 ml-1">*</span>
            </label>
            <select id="firstpersonup" name="firstpersonup" required 
            class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
            focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
            appearance-none">
                <option disabled selected>Please Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        --}}

        
        <div class="relative w-full">
            <label class="font-medium">
                Are you the first person in your immediate family to attend the University of the Philippines?
                <span class="text-red-500 ml-0.5">*</span>
            </label>
            <div class="flex gap-3 mt-1">
                <label class="group relative flex items-right justify-right gap-3 px-8 py-3.5 rounded-xl  cursor-pointer transition-all duration-200 {{-- hover:bg-green-50 has-[:checked]:bg-green-50 --}} flex-1">
                    <input type="radio" name="firstpersonup" value="yes" class="sr-only peer">
                    <span class="w-4 h-4 rounded-full border-2 border-gray-400 flex items-center justify-center transition-all duration-200 group-has-[:checked]:border-[#0E6021]">
                        <span class="w-2 h-2 rounded-full bg-[#0E6021] scale-0 transition-transform duration-200 group-has-[:checked]:scale-100"></span>
                    </span>
                    <span class="text-sm font-medium text-gray-500 group-has-[:checked]:text-[#0E6021] transition-colors duration-200">Yes</span>
                </label>

                <label class="group relative flex items-right justify-right gap-3 px-8 py-3.5 rounded-xl  cursor-pointer transition-all duration-200 {{-- hover:bg-red-50 has-[:checked]:bg-red-50 --}} flex-1">
                    <input type="radio" name="firstpersonup" value="no" class="sr-only peer">
                    <span class="w-4 h-4 rounded-full border-2 border-gray-400 flex items-center justify-center transition-all duration-200 group-has-[:checked]:border-[#850038]">
                        <span class="w-2 h-2 rounded-full bg-[#850038] scale-0 transition-transform duration-200 group-has-[:checked]:scale-100"></span>
                    </span>
                    <span class="text-sm font-medium text-gray-500 group-has-[:checked]:text-[#850038] transition-colors duration-200">No</span>
                </label>
            </div>
        </div>
        
        <!-- Income-->
        <div class="relative w-full">
            <label for="annualincome" class="font-medium">
                What income range best describes your household's annual income (before taxes)?<span class="text-red-500 ml-1">*</span>
            </label>
            <select id="annualincome" name="annualincome" required 
            class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
            focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
            appearance-none">
                <option disabled selected>Please Select</option>
                <option value="below250k">Below ₱250,000</option>
                <option value="250-499k">₱250,000 - ₱499,999</option>
                <option value="500-749k">₱500,000 - ₱749,999</option> 
                <option value="750-999k">₱750,000 - ₱999,999</option> 
                <option value="1m-1.49m">₱1,000,000 - ₱1,499,999</option>
                <option value="1.5m-1.9m">₱1,500,000 - ₱1,999,999</option>
                <option value="1.9m-2.9m">₱2,000,000 - ₱2,999,999</option>
                <option value="3m">₱3,000,000 or higher</option> 
                <option value="idk">I don't know</option> 
                <option value="prefernottosay">Prefer not to say</option> 
            </select>
        </div>
        
        <!-- PWD-->
        <div class="relative w-full">
            <label for="pwd" class="font-medium">
                Do you identify as a Person With Disability (PWD), as defined under 
                <span class="font-semibold text-[#8A1538]">
                    <a target="_blank" href="https://www.officialgazette.gov.ph/1992/03/24/republic-act-no-7277/"
                    class="font-medium text-[#8A1538] hover:text-[#8A1538]">
                    RA 7277
                    </a>
                </span> and 
                <span class="font-semibold text-[#8A1538]">
                    <a target="_blank" href="https://lpr.adb.org/resource/magna-carta-disabled-persons-amended-republic-act-no-9442-philippines"
                    class="font-medium text-[#8A1538] hover:text-[#8A1538]">
                    RA 9442
                    </a>
                </span>?
                <span class="text-red-500 ml-1">*</span>
            </label>
            <select id="pwd" name="pwd" required 
            class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
            focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
            appearance-none">
                <option disabled selected>Please Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
                <option value="prefernottosay">Prefer not to say</option> 
            </select>
        </div>
        
        <!-- PWD Types - Two-column checkbox layout -->
        <div id="pwd-types" class="col-span-1 md:col-span-2" style="display: none;">
            <p class="font-medium">
                Please indicate the type(s) of disability <br> (select all that apply)
                <span class="text-red-500">*</span>
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-2">
                <!-- Left column -->
                <div class="relative w-full space-y-3">

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="visual" class="h-4 w-4 disability-checkbox">
                        <span>Visual disability</span>
                        <button type="button" class="tooltip-trigger cursor-pointer flex-shrink-0"
                            data-tooltip-title="Visual disability:"
                            data-tooltip-body="Difficulty seeing or visual impairment that significantly affects daily activities, even with correction."
                            aria-label="More info about Visual disability">
                            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#8A1538" stroke-width="2"/>
                                <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#8A1538" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="hearing" class="h-4 w-4 disability-checkbox">
                        <span>Hearing disability</span>
                        <button type="button" class="tooltip-trigger cursor-pointer flex-shrink-0"
                            data-tooltip-title="Hearing disability:"
                            data-tooltip-body="Partial or total difficulty hearing that affects communication or daily functioning."
                            aria-label="More info about Hearing disability">
                            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#8A1538" stroke-width="2"/>
                                <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#8A1538" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="speech" class="h-4 w-4 disability-checkbox">
                        <span>Speech or language impairment</span>
                        <button type="button" class="tooltip-trigger cursor-pointer flex-shrink-0"
                            data-tooltip-title="Speech or language impairment:"
                            data-tooltip-body="Difficulty speaking, understanding speech, or using language to communicate effectively."
                            aria-label="More info about Speech or language impairment">
                            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#8A1538" stroke-width="2"/>
                                <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#8A1538" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="physical" class="h-4 w-4 disability-checkbox">
                        <span>Physical disability</span>
                        <button type="button" class="tooltip-trigger cursor-pointer flex-shrink-0"
                            data-tooltip-title="Physical disability:"
                            data-tooltip-body="Difficulty in movement or bodily function due to muscle, nerve, or neurological conditions."
                            aria-label="More info about Physical disability">
                            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#8A1538" stroke-width="2"/>
                                <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#8A1538" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="orthopedic" class="h-4 w-4 disability-checkbox">
                        <span>Orthopedic disability</span>
                        <button type="button" class="tooltip-trigger cursor-pointer flex-shrink-0"
                            data-tooltip-title="Orthopedic disability:"
                            data-tooltip-body="Difficulty in movement due to conditions affecting bones, joints, limbs, or the skeletal system."
                            aria-label="More info about Orthopedic disability">
                            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#8A1538" stroke-width="2"/>
                                <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#8A1538" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="learning" class="h-4 w-4 disability-checkbox">
                        <span>Learning disability</span>
                        <button type="button" class="tooltip-trigger cursor-pointer flex-shrink-0"
                            data-tooltip-title="Learning disability:"
                            data-tooltip-body="Difficulty in learning specific skills such as reading, writing, or mathematics, despite average intelligence."
                            aria-label="More info about Learning disability">
                            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#8A1538" stroke-width="2"/>
                                <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#8A1538" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </label>

                </div>
                <!-- Right column -->
                <div class="relative w-full space-y-3">

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="intellectual" class="h-4 w-4 disability-checkbox">
                        <span>Intellectual disability</span>
                        <button type="button" class="tooltip-trigger cursor-pointer flex-shrink-0"
                            data-tooltip-title="Intellectual disability:"
                            data-tooltip-body="Significant limitations in intellectual functioning and everyday adaptive skills, beginning before adulthood."
                            aria-label="More info about Intellectual disability">
                            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#8A1538" stroke-width="2"/>
                                <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#8A1538" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="autism" class="h-4 w-4 disability-checkbox">
                        <span>Autism spectrum disorder</span>
                        <button type="button" class="tooltip-trigger cursor-pointer flex-shrink-0"
                            data-tooltip-title="Autism spectrum disorder:"
                            data-tooltip-body="A developmental condition affecting communication, social interaction, and behavior, with varying levels of support needs."
                            aria-label="More info about Autism spectrum disorder">
                            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#8A1538" stroke-width="2"/>
                                <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#8A1538" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="psychosocial" class="h-4 w-4 disability-checkbox">
                        <span>Psychosocial disability</span>
                        <button type="button" class="tooltip-trigger cursor-pointer flex-shrink-0"
                            data-tooltip-title="Psychosocial disability:"
                            data-tooltip-body="Conditions that affect mood, thinking, behavior, or social interaction and result in significant functional limitations."
                            aria-label="More info about Psychosocial disability">
                            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#8A1538" stroke-width="2"/>
                                <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#8A1538" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="mental" class="h-4 w-4 disability-checkbox">
                        <span>Mental disability</span>
                        <button type="button" class="tooltip-trigger cursor-pointer flex-shrink-0"
                            data-tooltip-title="Mental disability:"
                            data-tooltip-body="Conditions that substantially affect cognitive or emotional functioning and daily living, as recognized under Philippine law."
                            aria-label="More info about Mental disability">
                            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#8A1538" stroke-width="2"/>
                                <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#8A1538" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="cancer" class="h-4 w-4 disability-checkbox">
                        <span>Cancer (PWD-recognized)</span>
                        <button type="button" class="tooltip-trigger cursor-pointer flex-shrink-0"
                            data-tooltip-title="Cancer (PWD-recognized):"
                            data-tooltip-body="Cancer that results in significant functional limitations or long-term effects impacting daily activities."
                            aria-label="More info about Cancer (PWD-recognized)">
                            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#8A1538" stroke-width="2"/>
                                <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#8A1538" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="rare_disease" class="h-4 w-4 disability-checkbox">
                        <span>Rare disease</span>
                        <button type="button" class="tooltip-trigger cursor-pointer flex-shrink-0"
                            data-tooltip-title="Rare disease:"
                            data-tooltip-body="A medically recognized rare condition that results in significant functional limitations."
                            aria-label="More info about Rare disease">
                            <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#8A1538" stroke-width="2"/>
                                <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#8A1538" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                    </label>

                </div>
            </div>
        </div>
        
        <!-- Support Needs -->
        <div class="support-needs-container relative w-full">
            <div class="max-w-md space-y-3">
                <p class="font-medium">
                    Do you have any access, learning, or health-related support needs the University should be aware of? Select all that apply.
                    <span class="text-red-500">*</span>
                </p>

                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="support_needs[]" value="academic" class="h-4 w-4 support-checkbox">
                    <span>Academic or learning accommodations</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="support_needs[]" value="health" class="h-4 w-4 support-checkbox">
                    <span>Health-related or temporary condition</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="support_needs[]" value="mobility" class="h-4 w-4 support-checkbox">
                    <span>Mobility or physical access support</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="support_needs[]" value="communication" class="h-4 w-4 support-checkbox">
                    <span>Communication or language support</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="support_needs[]" value="assistive" class="h-4 w-4 support-checkbox">
                    <span>Assistive technology or learning tools</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="support_needs[]" id="support-other" value="other" class="h-4 w-4 support-checkbox">
                    <span>Other (Please Specify)</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="support_needs[]" id="support-none" value="none" class="h-4 w-4 support-checkbox">
                    <span>None</span>
                </label>
            </div>
            
            <div id="support-specify-wrapper" class="relative w-full mt-2 hidden">
                <div class="relative w-full">
                    <label for="support-specify" class="font-medium">
                        Please Specify.
                    </label>
                    <input required id="support-specify" name="support-specify" type="text" 
                        class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                </div>
            </div>
        </div>
        
        <!-- IPRA Section -->
        <div class="relative w-full">
            <div class="relative w-full">
                <label for="ipra" class="font-medium">
                    Do you identify as a member of an Indigenous Peoples (IP) community, as defined under the Indigenous Peoples' 
                    Rights Act 
                    <span class="font-semibold text-[#8A1538]">
                            <a target="_blank" href="https://www.officialgazette.gov.ph/1997/10/29/republic-act-no-8371/"
                            class="font-medium text-[#8A1538] hover:text-[#8A1538]">
                            (IPRA)
                            </a>
                        </span>
                    ?
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <select id="ipra" name="ipra" required 
                class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
                focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
                appearance-none">
                    <option disabled selected>Please Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="unsure">Unsure</option> 
                </select>
                
                <!-- IPRA-related fields (wrapped for show/hide) -->
                <div id="ipra-fields" style="display: none;">
                    <div class="relative w-full mt-6">
                        <label class="font-medium">
                            Indigenous Peoples group:<span class="text-red-500 ml-1">*</span>
                        </label>
                        <select id="indigenous_group" name="indigenous_group" 
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
                        focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
                        appearance-none">
                            <option disabled selected>Please Select</option>
                            <option value="Aeta">Aeta</option>
                            <option value="Agta">Agta</option>
                            <option value="Ati">Ati</option>
                            <option value="Bagobo">Bagobo</option>
                            <option value="Blaan">B'laan</option>
                            <option value="Bontoc">Bontoc</option>
                            <option value="Higaonon">Higaonon</option>
                            <option value="Ibaloi">Ibaloi</option>
                            <option value="Ifugao">Ifugao</option>
                            <option value="Ivatan">Ivatan</option>
                            <option value="Kankanaey">Kankanaey</option>
                            <option value="Maguindanao">Maguindanao</option>
                            <option value="Mandaya">Mandaya</option>
                            <option value="Mangyan">Mangyan</option>
                            <option value="Manobo">Manobo</option>
                            <option value="Maranao">Maranao</option>
                            <option value="Sama-Bajau">Sama-Bajau</option>
                            <option value="Subanen">Subanen</option>
                            <option value="Tboli">T'boli</option>
                            <option value="Tausug">Tausug</option>
                            <option value="Tumandok">Tumandok</option>
                            <option value="Yakan">Yakan</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- IPRA Specify Field -->
                    <div id="ipra-specify-wrapper" class="relative w-full mt-6" style="display: none;">
                        <div class="relative w-full">
                            <label for="ipra_specify" class="font-medium">
                                Please Specify.
                            </label>
                            <input required id="ipra_specify" name="ipra_specify" type="text" 
                                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Shared tooltip popup (single instance, moved by JS) --}}
<div id="disability-tooltip-popup"
     style="display:none; position:fixed; z-index:9999; max-width:280px; pointer-events:none;"
     role="tooltip">
    <div class="bg-[#8A1538] text-white rounded-lg px-4 py-4 shadow-lg">
        <p id="disability-tooltip-title" class="font-bold text-sm mb-1"></p>
        <p id="disability-tooltip-body" class="text-sm"></p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* ─────────────────────────────────────────────
       TOOLTIP SYSTEM (mobile + desktop)
    ───────────────────────────────────────────── */
    const tooltipEl    = document.getElementById('disability-tooltip-popup');
    const tooltipTitle = document.getElementById('disability-tooltip-title');
    const tooltipBody  = document.getElementById('disability-tooltip-body');
    const MARGIN       = 8; // px gap from trigger
    let activeBtn      = null;
    let justToggled    = false;

    function positionTooltip(btn) {
        tooltipEl.style.display = 'block';
        tooltipEl.style.visibility = 'hidden'; // render off-screen first to measure

        const btnRect     = btn.getBoundingClientRect();
        const tipW        = tooltipEl.offsetWidth;
        const tipH        = tooltipEl.offsetHeight;
        const vw          = window.innerWidth;
        const vh          = window.innerHeight;

        // Try right of icon first
        let left = btnRect.right + MARGIN;
        let top  = btnRect.top + (btnRect.height / 2) - (tipH / 2);

        // If overflows right, try left of icon
        if (left + tipW > vw - MARGIN) {
            left = btnRect.left - tipW - MARGIN;
        }

        // If still overflows left (very narrow screen), center below icon
        if (left < MARGIN) {
            left = Math.max(MARGIN, (vw / 2) - (tipW / 2));
            top  = btnRect.bottom + MARGIN;
        }

        // Clamp vertically
        top = Math.max(MARGIN, Math.min(top, vh - tipH - MARGIN));

        tooltipEl.style.left       = left + 'px';
        tooltipEl.style.top        = top + 'px';
        tooltipEl.style.visibility = 'visible';
    }

    function showTooltip(btn) {
        tooltipTitle.textContent = btn.dataset.tooltipTitle || '';
        tooltipBody.textContent  = btn.dataset.tooltipBody  || '';
        activeBtn = btn;
        positionTooltip(btn);
    }

    function hideTooltip() {
        tooltipEl.style.display = 'none';
        activeBtn = null;
    }

    // Attach to every trigger button
    document.querySelectorAll('.tooltip-trigger').forEach(function (btn) {

        // Desktop: hover
        btn.addEventListener('mouseenter', function () {
            showTooltip(btn);
        });
        btn.addEventListener('mouseleave', function () {
            hideTooltip();
        });

        // Mobile / touch: tap to toggle
        btn.addEventListener('touchend', function (e) {
            e.preventDefault(); // prevent ghost click
            justToggled = true;
            setTimeout(function () { justToggled = false; }, 0);

            if (activeBtn === btn) {
                hideTooltip();
            } else {
                showTooltip(btn);
            }
        });
    });

    // Tap anywhere else closes the tooltip (mobile)
    document.addEventListener('touchend', function () {
        if (justToggled) return;
        hideTooltip();
    });

    // Click anywhere else closes the tooltip (desktop, just in case)
    document.addEventListener('click', function (e) {
        if (activeBtn && !activeBtn.contains(e.target)) {
            hideTooltip();
        }
    });

    // Reposition on scroll/resize while open
    window.addEventListener('scroll', function () {
        if (activeBtn) positionTooltip(activeBtn);
    }, { passive: true });

    window.addEventListener('resize', function () {
        if (activeBtn) positionTooltip(activeBtn);
    });


    /* ─────────────────────────────────────────────
       IPRA FIELDS TOGGLE
    ───────────────────────────────────────────── */
    const ipraSelect        = document.getElementById('ipra');
    const ipraFields        = document.getElementById('ipra-fields');
    const indigenousGroup   = document.getElementById('indigenous_group');
    const ipraSpecifyWrapper = document.getElementById('ipra-specify-wrapper');
    const ipraSpecify       = document.getElementById('ipra_specify');

    ipraFields.style.display        = 'none';
    ipraSpecifyWrapper.style.display = 'none';

    ipraSelect.addEventListener('change', function () {
        if (this.value === 'yes') {
            ipraFields.style.display = 'block';
            indigenousGroup.required = true;
            indigenousGroup.value    = '';
            ipraSpecifyWrapper.style.display = 'none';
            ipraSpecify.required = false;
            ipraSpecify.value    = '';
        } else {
            ipraFields.style.display = 'none';
            indigenousGroup.required = false;
            ipraSpecify.required     = false;
            indigenousGroup.value    = '';
            ipraSpecify.value        = '';
        }
    });

    indigenousGroup.addEventListener('change', function () {
        if (this.value === 'other') {
            ipraSpecifyWrapper.style.display = 'block';
            ipraSpecify.required = true;
        } else {
            ipraSpecifyWrapper.style.display = 'none';
            ipraSpecify.required = false;
            ipraSpecify.value    = '';
        }
    });


    /* ─────────────────────────────────────────────
       PWD FIELDS TOGGLE
    ───────────────────────────────────────────── */
    const pwdSelect          = document.getElementById('pwd');
    const disabilityTypes    = document.getElementById('pwd-types');
    const disabilityCheckboxes = document.querySelectorAll('.disability-checkbox');

    disabilityTypes.style.display = 'none';

    pwdSelect.addEventListener('change', function () {
        if (this.value === 'Yes') {
            disabilityTypes.style.display = 'block';
        } else {
            disabilityTypes.style.display = 'none';
            disabilityCheckboxes.forEach(cb => cb.checked = false);
        }
    });


    /* ─────────────────────────────────────────────
       SUPPORT NEEDS LOGIC
    ───────────────────────────────────────────── */
    const otherCheckbox    = document.getElementById('support-other');
    const noneCheckbox     = document.getElementById('support-none');
    const specifyWrapper   = document.getElementById('support-specify-wrapper');
    const specifyInput     = document.getElementById('support-specify');
    const supportCheckboxes = document.querySelectorAll('.support-checkbox');

    otherCheckbox.addEventListener('change', function () {
        if (this.checked) {
            if (noneCheckbox.checked) noneCheckbox.checked = false;
            specifyWrapper.classList.remove('hidden');
            specifyInput.required = true;
        } else {
            specifyWrapper.classList.add('hidden');
            specifyInput.required = false;
            specifyInput.value    = '';
        }
    });

    noneCheckbox.addEventListener('change', function () {
        if (this.checked) {
            supportCheckboxes.forEach(cb => {
                if (cb !== noneCheckbox) cb.checked = false;
            });
            specifyWrapper.classList.add('hidden');
            specifyInput.required = false;
            specifyInput.value    = '';
        }
    });

    supportCheckboxes.forEach(cb => {
        if (cb !== otherCheckbox && cb !== noneCheckbox) {
            cb.addEventListener('change', function () {
                if (this.checked && noneCheckbox.checked) {
                    noneCheckbox.checked = false;
                }
            });
        }
    });

});
</script>