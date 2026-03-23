<div class="step hidden" data-step="2">
    <div class="step-content">
        <div class="col-span-1 md:col-span-2">
                <h1 class="text-[24px] font-semibold text-[#0E6021]">
                    Access Verification
                </h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                    <div class="relative w-full">
                        <label for="student_number" class="font-medium">
                            UP Student Number (20xxxxxxx)
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <input required id="student_number" name="student_number" type="text"
                            class="peer w-full px-4 py-3 text-base bg-white outline-none 
                                border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                    </div>
                    
                    <div class="relative w-full">
                        <label for="category" class="font-medium">
                            Category
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <select id="category" name="category" required
                            class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
                            focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2 appearance-none">
                            <option value="" disabled selected>Please Select</option>
                            <option value="graduate">Graduate</option>
                            <option value="undergraduate">Undergraduate</option>
                        </select>
                    </div>
                    <div class="relative w-full">
                        <button
                            id="validateBtn"
                            class="w-full sm:w-auto px-8 py-3 bg-[#850038] text-white font-semibold rounded 
                                hover:bg-[#FFAD0D] transition-colors duration-200">
                            Validate
                        </button>
                    </div>
                    {{-- UP Email field initially hidden --}}
                    <div class="relative w-full hidden" id="UP_email_container">
                        <label for="UP_email" class="font-medium">
                            UP E-mail
                        </label>
                        <input required id="UP_email" name="UP_email" type="text"
                            class="peer w-full px-4 py-3 text-base bg-white outline-none 
                                border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                        <p class="text-[12px] text-gray-500 mt-1">UPid@up.edu.ph</p>     
                    </div>
            </div>
        </div>
    </div>
</div>