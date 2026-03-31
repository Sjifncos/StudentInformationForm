<div class="step" data-step="4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-[24px] font-semibold text-[#0E6021]">
                Address Information
            </h1>
        </div>
        <div class="relative w-full">
            <label for="citizenship" class="font-medium">Are you a Philippine citizen?<span class="text-red-500 ml-1">*</span></label>
            <select id="citizenship" name="citizenship" required 
            class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
            focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
            appearance-none">
                <option disabled selected>Please Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="relative w-full">
            <label for="citizenship_country" class="font-medium">Country of Citizenship <span class="text-red-500 ml-1">*</span></label>
            <select id="citizenship_country" name="citizenship_country" required 
            class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] focus:outline-none 
            focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
            appearance-none">
                <option value="" disabled selected>Please Select</option>
            </select>
        </div>

        <!-- Heading for Permanent Address Outside the Philippines (added ID) -->
        <div id="outside_ph_heading" class="col-span-1 md:col-span-2">
            <h1 class="text-[18px] font-semibold text-[#8A1538]">Permanent Address Outside the Philippines</h1>
        </div>
        <div class="relative w-full">
            <label for="outside_ph_addressline1" class="font-medium">
                Address in Home Country <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="outside_ph_addressline1" name="outside_ph_addressline1" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>
        <div class="relative w-full">
            <label for="outside_ph_addressline2" class="font-medium">
                Street Address
            </label>
            <input required id="outside_ph_addressline2" name="outside_ph_addressline2" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

        <div class="relative w-full">
            <label for="city_foreign" class="font-medium">
                City <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="city_foreign" name="city_foreign" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

        <div class="relative w-full">
            <label for="state/province_foreign" class="font-medium">
                State/Province <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="state/province_foreign" name="state/province_foreign" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>
        <div class="relative w-full">
            <label for="zipcode_foreign" class="font-medium">
                Postal/Zip Code <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="zipcode_foreign" name="zipcode_foreign" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

        <div class="relative w-full">
            <label for="foreign_country" class="font-medium">Country<span class="text-red-500 ml-1">*</span></label>
            <select id="foreign_country" name="foreign_country" required 
            class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] focus:outline-none 
            focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
            appearance-none">
                <option disabled selected>Please Select</option>
            </select>
        </div>


        <!-- Address inside the Philippines (added ID for heading) -->
        <div id="permanent_ph_heading" class="col-span-1 md:col-span-2">
            <h1 class="text-[18px] font-semibold text-[#8A1538]">Permanent Address Inside the Philippines</h1>
        </div>
        
        <div class="relative w-full">
            <label for="room_flr_unit_bldg" class="font-medium">
                Room/ Flr / Unit / Buidling 
            </label>
            <input required id="room_flr_unit_bldg" name="room_flr_unit_bldg" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>
        <div class="relative w-full">
            <label for="house_lot_blk" class="font-medium">
                House / Lot / Blk 
            </label>
            <input required id="house_lot_blk" name="house_lot_blk" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

        <div class="relative w-full">
            <label for="street" class="font-medium">
                Street 
            </label>
            <input required id="street" name="street" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

        <div class="relative w-full">
            <label for="subdivision_line2" class="font-medium">
                Subdivision
            </label>
            <input required id="subdivision_line2" name="subdivision_line2" type="text" 
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>
        
        <!-- Region -->
        <div class="relative w-full">
            <label for="region" class="font-medium">Region<span class="text-red-500 ml-1">*</span></label>
            <select id="region" name="region" required 
            class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
            focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
            appearance-none">
                <option value="" disabled selected>Loading regions...</option>
            </select>
        </div>
        <!-- Province -->
        <div class="relative w-full">
            <label for="province" class="font-medium">Province<span class="text-red-500 ml-1">*</span></label>
            <select id="province" name="province" required 
            class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
            focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
            appearance-none">
                <option value="" disabled selected>Please Select</option>
            </select>
        </div>
        <!-- City/Municipality -->
        <div class="relative w-full">
            <label for="city" class="font-medium">City/Municipality<span class="text-red-500 ml-1">*</span></label>
            <select id="city" name="city" required 
            class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
            focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
            appearance-none">
                <option value="" disabled selected>Please Select</option>
            </select>
        </div>
        <!-- Barangay -->
        <div class="relative w-full">
            <label for="barangay" class="font-medium">Barangay<span class="text-red-500 ml-1">*</span></label>
            <select id="barangay" name="barangay" required 
            class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
            focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
            appearance-none">
                <option value="" disabled selected>Please Select</option>
            </select>
        </div>
        <div class="relative w-full hidden">
            <label for="PSGC" class="font-medium">PSGC Code</label>
            <input required id="PSGC" type="text" disabled
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
            <p class="text-[12px] text-gray-500 mt-1">This field will be automatically filled</p>
        </div>

        <div class="relative w-full">
           <div class="relative w-full">
                <label for="same_address" class="font-medium">
                    Is your Permanent Address the same as your Current Address?
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <select id="same_address" name="same_address" required 
                class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] focus:outline-none 
                focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
                appearance-none">
                    <option disabled selected>Please Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>

        <!-- Current Address Inside the Philippines (hidden by default) -->
        <div id="current_address_section" class="col-span-1 md:col-span-2" style="display: none;">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4 w-full">
                <div class="col-span-1 md:col-span-2">
                    <h1 class="text-[18px] font-semibold text-[#8A1538]">Current Address Inside the Philippines</h1>
                </div>

                <!-- Room/Flr/Unit/Building -->
                <div class="relative w-full">
                    <label for="current_room_flr_unit_bldg" class="font-medium">Room/ Flr / Unit / Buidling</label>
                    <input id="current_room_flr_unit_bldg" name="current_room_flr_unit_bldg" type="text"
                        class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                </div>

                <!-- House/Lot/Blk -->
                <div class="relative w-full">
                    <label for="current_house_lot_blk" class="font-medium">House / Lot / Blk</label>
                    <input id="current_house_lot_blk" name="current_house_lot_blk" type="text"
                        class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                </div>

                <!-- Street -->
                <div class="relative w-full">
                    <label for="current_street" class="font-medium">Street</label>
                    <input id="current_street" name="current_street" type="text"
                        class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                </div>

                <!-- Subdivision / Line 2 -->
                <div class="relative w-full">
                    <label for="current_subdivision_line2" class="font-medium">Subdivision</label>
                    <input id="current_subdivision_line2" name="current_subdivision_line2" type="text"
                        class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                </div>

                <!-- Region -->
                <div class="relative w-full">
                    <label for="current_region" class="font-medium">Region<span class="text-red-500 ml-1">*</span></label>
                    <select id="current_region" name="current_region" required
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2 appearance-none">
                        <option value="" disabled selected>Loading regions...</option>
                    </select>
                </div>

                <!-- Province -->
                <div class="relative w-full">
                    <label for="current_province" class="font-medium">Province<span class="text-red-500 ml-1">*</span></label>
                    <select id="current_province" name="current_province" required
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2 appearance-none">
                        <option value="" disabled selected>Please Select</option>
                    </select>
                </div>

                <!-- City/Municipality -->
                <div class="relative w-full">
                    <label for="current_city" class="font-medium">City/Municipality<span class="text-red-500 ml-1">*</span></label>
                    <select id="current_city" name="current_city" required
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2 appearance-none">
                        <option value="" disabled selected>Please Select</option>
                    </select>
                </div>

                <!-- Barangay -->
                <div class="relative w-full">
                    <label for="current_barangay" class="font-medium">Barangay<span class="text-red-500 ml-1">*</span></label>
                    <select id="current_barangay" name="current_barangay" required
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2 appearance-none">
                        <option value="" disabled selected>Please Select</option>
                    </select>
                </div>

                <!-- PSGC (hidden) -->
                <div class="relative w-full hidden">
                    <label for="current_PSGC" class="font-medium">PSGC Code</label>
                    <input id="current_PSGC" type="text" disabled
                        class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
                    <p class="text-[12px] text-gray-500 mt-1">This field will be automatically filled</p>
                </div>
            </div>
        </div>
    </div>
</div>

