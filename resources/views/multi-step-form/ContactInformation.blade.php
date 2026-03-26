<div class="step" data-step="5">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-[24px] font-semibold text-[#0E6021]">
                Contact Information
            </h1>
        </div>
        <!-- Contact Details - Full Width Heading -->
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-[18px] font-semibold text-[#8A1538]">Contact Details</h1>
        </div>

        <!-- Personal Email -->
        <div class="md:col-span-1 flex flex-col w-full">
            <label for="personalemail" class="font-medium">
               Personal E-mail <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="personalemail" name="personalemail" type="text" 
                {{--    placeholder="ex: myname@example.com" --}}
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
            {{--    <p class="text-[12px] text-gray-500 mt-1">Personal E-mail will be Autofill</p> --}}
            <span class="error-message text-red-500 text-sm hidden" data-for="personalemail"></span>
        </div>

        <!-- Mobile Number -->
        <div class="md:col-span-1 flex flex-col w-full">
            <label for="mobilenumber" class="font-medium">
                Mobile Number <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="mobilenumber" name="mobilenumber" type="text" 
                placeholder="0000 000 0000"
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
            <p class="text-[12px] text-gray-500 mt-1">ex. 09123456789</p>
            <span class="error-message text-red-500 text-sm hidden" data-for="mobilenumber"></span>
        </div>

        <!-- Landline Number -->
        <div class="md:col-span-1 flex flex-col w-full">
            <label for="landlinenumber" class="font-medium">Landline Number</label>
            <input id="landlinenumber" name="landlinenumber" type="text" 
                placeholder="(032) 000 0000"
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
            <p class="text-[12px] text-gray-500 mt-1">ex. (032) 345 6789</p>
        </div>

        <!-- Emergency Contact -->
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-[18px] font-semibold text-[#8A1538]">Emergency Contact Information</h1>
        </div>

        <div class="md:col-span-1 flex flex-col w-full">
            <label class="font-medium">
                Full Name
                <span class="text-red-500 ml-1">*</span>
            </label>
            <input required name="emergenency_fullname" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

      <!-- Mobile Number -->
        <div class="md:col-span-1 flex flex-col w-full">
            <label for="emergency_mobilenumber" class="font-medium">
                Mobile Number <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="emergency_mobilenumber" name="emergency_mobilenumber" type="text" 
                placeholder="0000 000 0000"
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
            <p class="text-[12px] text-gray-500 mt-1">ex. 09123456789</p>
            <span class="error-message text-red-500 text-sm hidden" data-for="emergency_mobilenumber"></span>
        </div>

        <!-- Father's Information - Full Width Heading -->
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-[18px] font-semibold text-[#8A1538]">Father's Information</h1>
        </div>

        <!-- Father's First Name -->    
        <div class="md:col-span-1 flex flex-col w-full">
            <label for="fathers_firstname" class="font-medium">
                First Name
                <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="fathers_firstname" name="fathers_firstname" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

        <!-- Father's Middle Name -->
        <div class="md:col-span-1 flex flex-col w-full">
            <label for="fathers_middlename" class="font-medium">Middle Name</label>
            <input required id="fathers_middlename" name="fathers_middlename" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

         <!-- Name Suffix -->
        <div class="md:col-span-1 flex flex-col w-full">
            <label for="father_suffix" class="font-medium">
                Name Suffix
            </label>
            <select id="father_suffix" name="father_suffix"
                class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
                focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2 appearance-none">
                <option value="" disabled selected>Please Select</option>
                <option value="none">None</option>
                <option value="jr">Jr.</option>
                <option value="sr">Sr.</option>
                <option value="ii">II</option>
                <option value="iii">III</option>
                <option value="iv">IV</option>
                <option value="v">V</option>
                <option value="vi">VI</option>
                <option value="vii">VII</option>
                <option value="viii">VIII</option>
                <option value="ix">IX</option>
                <option value="x_higher">X or Higher</option>
            </select>
            <p class="text-[12px] text-gray-500 mt-1">Please Select if your Father's legal name includes a suffix</p>
        </div>

        <!-- Father's Last Name -->
        <div class="md:col-span-1 flex flex-col w-full">
            <label for="fathers_lastname" class="font-medium">
                Last Name
                <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="fathers_lastname" name="fathers_lastname" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

        <!-- Mother's Information - Full Width Heading -->
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-[18px] font-semibold text-[#8A1538]">Mother's Maiden Information</h1>
        </div>

        <!-- Mother's First Name -->
        <div class="md:col-span-1 flex flex-col w-full">
            <label for="mother_firstname" class="font-medium">
                First Name
                <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="mother_firstname" name="mother_firstname" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

        <!-- Mother's Middle Name -->
        <div class="md:col-span-1 flex flex-col w-full">
            <label for="mother_middlename" class="font-medium">Middle Name</label>
            <input required id="mother_middlename" name="mother_middlename" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

        <!-- Mother's Last Name -->
        <div class="md:col-span-1 flex flex-col w-full">
            <label for="mother_lastname" class="font-medium">
                Last Name
                <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="mother_lastname" name="mother_lastname" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

        <!-- Guardian's Information - Hidden by default -->
        <div id="guardian-section" class="col-span-1 md:col-span-2 hidden">
            <h1 class="text-[18px] font-semibold text-[#8A1538]">Guardian's Information</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                <!-- Guardian's First Name -->
                <div class="md:col-span-1 flex flex-col w-full">
                    <label for="guardian_firstname" class="font-medium">
                        First Name
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <input id="guardian_firstname" name="guardian_firstname" type="text" 
                        class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                </div>

                <!-- Guardian's Middle Name -->
                <div class="md:col-span-1 flex flex-col w-full">
                    <label for="guardian_middlename" class="font-medium">Middle Name</label>
                    <input id="guardian_middlename" name="guardian_middlename" type="text" 
                        class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                </div>

                <!-- Guardian's Last Name -->
                <div class="md:col-span-1 flex flex-col w-full">
                    <label for="guardian_lastname" class="font-medium">
                        Last Name
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <input id="guardian_lastname" name="guardian_lastname" type="text" 
                        class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                </div>

                <!-- Guardian's Phone Number -->
                <div class="md:col-span-1 flex flex-col w-full">
                    <label for="guardian_phonenumber" class="font-medium">Mobile Number</label>
                    <input id="guardian_phonenumber" name="guardian_phonenumber" type="text"
                        placeholder="0000 000 0000" 
                        class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                        <p class="text-[12px] text-gray-500 mt-1">ex. 0912 345 6789</p>
                </div>

                <!-- Guardian's Email -->
                <div class="md:col-span-1 flex flex-col w-full">
                    <label for="guardian_email" class="font-medium">E-mail</label>
                    <input id="guardian_email" name="guardian_email" type="text" 
                        placeholder="ex: myname@example.com"
                        class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                </div>
            </div>
        </div>

        <div id="motherLastnameModal" class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-sm overflow-y-hidden h-full w-full hidden z-50 transition-opacity" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
            <!-- modal card -->
            <div class="relative mx-auto w-96 bg-white rounded-2xl shadow-2xl border border-white/10 p-0">
                <div class="px-6 pt-2 pb-6 text-center">
                    <h3 id="modalTitle" class="text-2xl font-semibold tracking-tight text-[#8A1538] mt-2 mb-3">
                        Confirm Mother's Maiden Last Name
                    </h3>

                    <div class="mt-1 mb-6 text-black-700 text-base leading-relaxed">
                        <p class="px-1">
                            Mother's maiden last name "<span class="font-semibold text-[#850038]" id="modal-mother-lastname"></span>" is the same as father's last name "<span class="font-semibold text-[#850038]" id="modal-father-lastname"></span>".
                        </p>
                        <p class="font-medium text-black-800 mt-1">
                            Are you sure this is correct?
                        </p>
                    </div>

                    <div class="flex justify-center gap-3">
                        <button id="modalYes" 
                                class="px-6 py-2.5 bg-[#2CAC4B] hover:bg-[#23913e] text-white text-base font-medium rounded-[6px] shadow-md hover:shadow-lg transition-all duration-150 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#2CAC4B]/50 focus:ring-offset-2">
                            Yes
                        </button>
                        <button id="modalNo" 
                                class="px-6 py-2.5 bg-[#E60023] hover:bg-[#c4001e] text-white text-base font-medium rounded-[6px] shadow-md hover:shadow-lg transition-all duration-150 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#E60023]/50 focus:ring-offset-2">
                            No
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Match Confirmation Modal -->
        <div id="mobileMatchModal" class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-sm overflow-y-hidden h-full w-full hidden z-50 transition-opacity" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="mobileModalTitle">
            <div class="relative mx-auto w-96 bg-white rounded-2xl shadow-2xl border border-white/10 p-0">
                <div class="px-6 pt-2 pb-6 text-center">
                    <h3 id="mobileModalTitle" class="text-2xl font-semibold tracking-tight text-[#8A1538] mt-2 mb-3">
                        Confirm Contact Information
                    </h3>
                    <div class="mt-1 mb-6 text-black-700 text-base leading-relaxed">
                        <p class="px-1">
                            You entered the same number for both the <span class="font-semibold text-[#850038]">Personal Mobile Number </span> and<span class="font-semibold text-[#850038]"> Emergency Mobile Number.</span>
                        </p>
                        <p class="font-medium text-black-800 mt-1">
                            Do you want to keep this?
                        </p>
                    </div>
                    <div class="flex justify-center gap-3">
                        <button id="mobileMatchModalYes"
                                class="px-6 py-2.5 bg-[#2CAC4B] hover:bg-[#23913e] text-white text-base font-medium rounded-[6px] shadow-md hover:shadow-lg transition-all duration-150 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#2CAC4B]/50 focus:ring-offset-2">
                            Yes
                        </button>
                        <button id="mobileMatchModalNo"
                                class="px-6 py-2.5 bg-[#E60023] hover:bg-[#c4001e] text-white text-base font-medium rounded-[6px] shadow-md hover:shadow-lg transition-all duration-150 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-[#E60023]/50 focus:ring-offset-2">
                            No
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>