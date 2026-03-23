<div class="step hidden" data-step="8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-[24px] font-semibold text-[#0E6021]">
                Other Information
            </h1>
        </div>
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
                <span class="font-semibold text-[#850038]">
                    <a target="_blank" href="https://www.officialgazette.gov.ph/1992/03/24/republic-act-no-7277/"
                    class="font-medium text-[#850038] hover:text-[#850038]">
                    RA 7277
                    </a>
                </span> and 
                <span class="font-semibold text-[#850038]">
                    <a target="_blank" href="https://lpr.adb.org/resource/magna-carta-disabled-persons-amended-republic-act-no-9442-philippines"
                    class="font-medium text-[#850038] hover:text-[#850038]">
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
        
        <!-- PWD Types - Two-column checkbox layout (like funding sources) -->
        <div id="pwd-types" class="col-span-1 md:col-span-2" style="display: none;">
            <p class="font-medium">
                Please indicate the type(s) of disability <br> (select all that apply)
                <span class="text-red-500">*</span>
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-2">
                <!-- Left column -->
                <div class="relative w-full space-y-3">
                    {{--
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="visual" class="h-4 w-4 disability-checkbox">
                        <span>Visual disability</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                           <div class="absolute left-1/2 bottom-full -translate-x-1/2 mb-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-y-0 translate-y-2 pointer-events-none">
                            <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                <p class="font-bold text-md mb-1">Visual disability:</p>
                                <p class="text-sm">
                                    Difficulty seeing or visual impairment that significantly affects daily activities,
                                    even with correction.
                                </p>
                            </div>
                        </div>
                        </div>
                    </label>
                    --}}
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="visual" class="h-4 w-4 disability-checkbox">
                        <span>Visual disability</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-x-0 translate-x-2 pointer-events-none">
                                <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                    <p class="font-bold text-md mb-1">Visual disability:</p>
                                    <p class="text-sm">
                                       Difficulty seeing or visual impairment that significantly affects daily activities,
                                    even with correction.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>
                    {{--
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="hearing" class="h-4 w-4 disability-checkbox">
                        <span>Hearing disability</span>
                    </label>
                    --}}
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="hearing" class="h-4 w-4 disability-checkbox">
                        <span>Hearing disability</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-x-0 translate-x-2 pointer-events-none">
                                <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                    <p class="font-bold text-md mb-1">Hearing disability:</p>
                                    <p class="text-sm">
                                        Partial or total difficulty hearing that affects communication or daily functioning.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>
                    {{--
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="speech" class="h-4 w-4 disability-checkbox">
                        <span>Speech or language impairment</span>
                    </label>
                    --}}
                    {{--
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="speech" class="h-4 w-4 disability-checkbox">
                        <span>Speech or language impairment</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-x-0 translate-x-2 pointer-events-none">
                                <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                    <p class="font-bold text-md mb-1">Speech or language impairment:</p>
                                    <p class="text-sm">
                                       Difficulty speaking, understanding speech, or using language to communicate effectively.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>
                    --}}
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="speech" class="h-4 w-4 disability-checkbox">
                        <span>Speech or language impairment</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                           <div class="absolute left-1/2 bottom-full -translate-x-1/2 mb-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-y-0 translate-y-2 pointer-events-none">
                            <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                <p class="font-bold text-md mb-1">Speech or language impairment:</p>
                                <p class="text-sm">
                                   Difficulty speaking, understanding speech, or using language to communicate effectively.
                                </p>
                            </div>
                        </div>
                        </div>
                    </label>
                    {{--
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="physical" class="h-4 w-4 disability-checkbox">
                        <span>Physical disability</span>
                    </label>
                    --}}
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="physical" class="h-4 w-4 disability-checkbox">
                        <span>Physical disability</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-x-0 translate-x-2 pointer-events-none">
                                <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                    <p class="font-bold text-md mb-1">Physical disability:</p>
                                    <p class="text-sm">
                                       Difficulty in movement or bodily function due to muscle, nerve, or neurological conditions.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>
                    {{--
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="orthopedic" class="h-4 w-4 disability-checkbox">
                        <span>Orthopedic disability</span>
                    </label>
                    --}}
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="orthopedic" class="h-4 w-4 disability-checkbox">
                        <span>Orthopedic disability</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-x-0 translate-x-2 pointer-events-none">
                                <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                    <p class="font-bold text-md mb-1">Orthopedic disability:</p>
                                    <p class="text-sm">
                                        Difficulty in movement due to conditions affecting bones, joints, limbs, or the skeletal system.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>
                    {{--
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="learning" class="h-4 w-4 disability-checkbox">
                        <span>Learning disability</span>
                    </label>
                    --}}
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="learning" class="h-4 w-4 disability-checkbox">
                        <span>Learning disability</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-x-0 translate-x-2 pointer-events-none">
                                <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                    <p class="font-bold text-md mb-1">Learning disability:</p>
                                    <p class="text-sm">
                                        Difficulty in learning specific skills such as reading, writing, or mathematics, despite average intelligence.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <!-- Right column -->
                <div class="relative w-full space-y-3">
                    {{--
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="intellectual" class="h-4 w-4 disability-checkbox">
                        <span>Intellectual disability</span>
                    </label>
                    --}}
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="intellectual" class="h-4 w-4 disability-checkbox">
                        <span>Intellectual disability</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-x-0 translate-x-2 pointer-events-none">
                                <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                    <p class="font-bold text-md mb-1">Intellectual disability:</p>
                                    <p class="text-sm">
                                        Significant limitations in intellectual functioning and everyday adaptive skills, beginning before adulthood.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>
                    {{--
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="autism" class="h-4 w-4 disability-checkbox">
                        <span>Autism spectrum disorder</span>
                    </label>
                    --}}
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="autism" class="h-4 w-4 disability-checkbox">
                        <span>Autism spectrum disorder</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-x-0 translate-x-2 pointer-events-none">
                                <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                    <p class="font-bold text-md mb-1">Autism spectrum disorder:</p>
                                    <p class="text-sm">
                                        A developmental condition affecting communication, social interaction, and behavior, with varying levels of support needs.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>
                    {{--
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="psychosocial" class="h-4 w-4 disability-checkbox">
                        <span>Psychosocial disability</span>
                    </label>
                    --}}
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="psychosocial" class="h-4 w-4 disability-checkbox">
                        <span>Psychosocial disability</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-x-0 translate-x-2 pointer-events-none">
                                <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                    <p class="font-bold text-md mb-1">Psychosocial disability:</p>
                                    <p class="text-sm">
                                        Conditions that affect mood, thinking, behavior, or social interaction and result in significant functional limitations.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>
                    {{--
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="mental" class="h-4 w-4 disability-checkbox">
                        <span>Mental disability</span>
                    </label>
                    --}}
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="mental" class="h-4 w-4 disability-checkbox">
                        <span>Mental disability</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-x-0 translate-x-2 pointer-events-none">
                                <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                    <p class="font-bold text-md mb-1">Mental disability:</p>
                                    <p class="text-sm">
                                        Conditions that substantially affect cognitive or emotional functioning and daily living, as recognized under Philippine law.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>
                    {{--
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="cancer" class="h-4 w-4 disability-checkbox">
                        <span>Cancer (PWD-recognized)</span>
                    </label>
                    --}}
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="cancer" class="h-4 w-4 disability-checkbox">
                        <span>Cancer (PWD-recognized)</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-x-0 translate-x-2 pointer-events-none">
                                <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                    <p class="font-bold text-md mb-1">Cancer (PWD-recognized):</p>
                                    <p class="text-sm">
                                        Cancer that results in significant functional limitations or long-term effects impacting daily activities.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>
                    {{--
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="rare_disease" class="h-4 w-4 disability-checkbox">
                        <span>Rare disease</span>
                    </label>
                    --}}
                      <label class="flex items-center space-x-2">
                        <input type="checkbox" name="disability_types[]" value="rare_disease" class="h-4 w-4 disability-checkbox">
                        <span>Rare disease</span>

                        <div class="relative group inline-block">
                            <!-- Trigger: SVG icon -->
                            <div class="cursor-pointer">
                                <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="#850038" stroke-width="2"/>
                                    <path d="M10 8.48352C10.5 7.49451 11 7 12 7C13.2461 7 14 7.98901 14 8.97802C14 9.96703 13.5 10.4615 12 11.4505V13M12 16.5V17" stroke="#850038" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>

                            <!-- Tooltip content (RIGHT SIDE) -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-2 opacity-0 group-hover:opacity-100 transition duration-100 transform group-hover:translate-x-0 translate-x-2 pointer-events-none">
                                <div class="bg-[#850038] w-max max-w-xs text-white rounded-lg px-4 py-4">
                                    <p class="font-bold text-md mb-1">Rare disease:</p>
                                    <p class="text-sm">
                                        A medically recognized rare condition that results in significant functional limitations.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        
        <!-- Support Needs - Fixed with proper name attributes and wrapper -->
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
                    Do you identify as a member of an Indigenous Peoples (IP) community, as defined under the Indigenous Peoples’ 
                    Rights Act 
                    <span class="font-semibold text-[#850038]">
                            <a target="_blank" href="https://www.officialgazette.gov.ph/1997/10/29/republic-act-no-8371/"
                            class="font-medium text-[#850038] hover:text-[#850038]">
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
                            <option value="Blaan">B’laan</option>
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
                            <option value="Tboli">T’boli</option>
                            <option value="Tausug">Tausug</option>
                            <option value="Tumandok">Tumandok</option>
                            <option value="Yakan">Yakan</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <!-- IPRA Specify Field - Hidden by default, shows only when "Other" is selected -->
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    // IPRA Fields Toggle
    const ipraSelect = document.getElementById('ipra');
    const ipraFields = document.getElementById('ipra-fields');
    const indigenousGroup = document.getElementById('indigenous_group');
    const ipraSpecifyWrapper = document.getElementById('ipra-specify-wrapper');
    const ipraSpecify = document.getElementById('ipra_specify');
    
    // Initially hide IPRA fields
    ipraFields.style.display = 'none';
    ipraSpecifyWrapper.style.display = 'none';

    // Handle IPRA select change
    ipraSelect.addEventListener('change', function () {
        if (this.value === 'yes') {
            ipraFields.style.display = 'block';
            indigenousGroup.required = true;
            
            // Reset the indigenous group selection
            indigenousGroup.value = '';
            ipraSpecifyWrapper.style.display = 'none';
            ipraSpecify.required = false;
            ipraSpecify.value = '';
        } else {
            ipraFields.style.display = 'none';
            indigenousGroup.required = false;
            ipraSpecify.required = false;
            
            // Clear values when hidden
            indigenousGroup.value = '';
            ipraSpecify.value = '';
        }
    });

    // Handle Indigenous Group change
    indigenousGroup.addEventListener('change', function() {
        if (this.value === 'other') {
            // Show the specify wrapper and make it required
            ipraSpecifyWrapper.style.display = 'block';
            ipraSpecify.required = true;
        } else {
            // Hide the specify wrapper and remove required
            ipraSpecifyWrapper.style.display = 'none';
            ipraSpecify.required = false;
            ipraSpecify.value = ''; // Clear the value when hidden
        }
    });

    // PWD Fields Toggle
    const pwdSelect = document.getElementById('pwd');
    const disabilityTypes = document.getElementById('pwd-types');
    const disabilityCheckboxes = document.querySelectorAll('.disability-checkbox');

    // Initially hide disability types
    disabilityTypes.style.display = 'none';

    pwdSelect.addEventListener('change', function () {
        if (this.value === 'Yes') {
            disabilityTypes.style.display = 'block';
        } else {
            disabilityTypes.style.display = 'none';
            // Uncheck all checkboxes when hidden
            disabilityCheckboxes.forEach(cb => cb.checked = false);
        }
    });

    // Support Needs Logic
    const otherCheckbox = document.getElementById('support-other');
    const noneCheckbox = document.getElementById('support-none');
    const specifyWrapper = document.getElementById('support-specify-wrapper');
    const specifyInput = document.getElementById('support-specify');
    const supportCheckboxes = document.querySelectorAll('.support-checkbox');

    // Handle "Other" checkbox
    otherCheckbox.addEventListener('change', function () {
        if (this.checked) {
            // Uncheck "None" if "Other" is checked
            if (noneCheckbox.checked) {
                noneCheckbox.checked = false;
            }
            specifyWrapper.classList.remove('hidden');
            specifyInput.required = true;
        } else {
            // Check if any other checkbox is checked to determine if we should hide
            const anyOtherChecked = Array.from(supportCheckboxes).some(cb => 
                cb !== otherCheckbox && cb.checked && cb.value !== 'none'
            );
            
            if (!anyOtherChecked && !noneCheckbox.checked) {
                specifyWrapper.classList.add('hidden');
                specifyInput.required = false;
                specifyInput.value = '';
            }
        }
    });

    // Handle "None" checkbox
    noneCheckbox.addEventListener('change', function () {
        if (this.checked) {
            // If "None" is checked, uncheck all other support checkboxes
            supportCheckboxes.forEach(cb => {
                if (cb !== noneCheckbox) {
                    cb.checked = false;
                }
            });
            // Hide and clear the other specification field
            specifyWrapper.classList.add('hidden');
            specifyInput.required = false;
            specifyInput.value = '';
        }
    });

    // Handle other checkboxes to manage specify field visibility
    supportCheckboxes.forEach(cb => {
        if (cb !== otherCheckbox && cb !== noneCheckbox) {
            cb.addEventListener('change', function() {
                if (this.checked) {
                    // If any non-none, non-other checkbox is checked, uncheck none
                    if (noneCheckbox.checked) {
                        noneCheckbox.checked = false;
                    }
                }
                
                // Check if any non-none checkbox is checked to determine if we should show/hide other field
                const anyNonNoneChecked = Array.from(supportCheckboxes).some(cb => 
                    cb.checked && cb.value !== 'none'
                );
                
                if (!anyNonNoneChecked) {
                    // If no non-none checkboxes are checked, hide other field if other is not checked
                    if (!otherCheckbox.checked) {
                        specifyWrapper.classList.add('hidden');
                        specifyInput.required = false;
                        specifyInput.value = '';
                    }
                }
            });
        }
    });
});
</script>