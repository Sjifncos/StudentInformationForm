<div class="step" data-step="3">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
        <h1 class="text-[24px] font-semibold text-[#0E6021]">
            Basic Information
        </h1>
        <div class="col-span-1 md:col-span-2">
            <label for="degreeprogram" class="font-medium">
                Degree Program <span class="text-red-500">*</span>
            </label>
            <select id="degreeprogram" name="degreeprogram" required
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] 
                    focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-1 
                    appearance-none">
                <option value="" disabled selected>Please Select</option>
                <option value="AA Sports Studies">AA Sports Studies</option>
                <option value="B Fine Arts (Product Design)">B Fine Arts (Product Design)</option>
                <option value="B Fine Arts (Studio Arts)">B Fine Arts (Studio Arts)</option>
                <option value="B Physical Education">B Physical Education</option>
                <option value="B Sports Science">B Sports Science</option>
                <option value="BA Communication">BA Communication</option>
                <option value="BA Political Science">BA Political Science</option>
                <option value="BA Psychology">BA Psychology</option>
                <option value="BA Psychology (2005 curriculum)">BA Psychology (2005 curriculum)</option>
                <option value="BS Accountancy">BS Accountancy</option>
                <option value="BS Biology">BS Biology</option>
                <option value="BS Biology (2005 curriculum)">BS Biology (2005 curriculum)</option>
                <option value="BS Computer Science">BS Computer Science</option>
                <option value="BS Management">BS Management</option>
                <option value="BS Management (Finance)">BS Management (Finance)</option>
                <option value="BS Management (Marketing)">BS Management (Marketing)</option>
                <option value="BS Mathematics">BS Mathematics</option>
                <option value="BS Statistics">BS Statistics</option>
                <option value="C Fine Arts (Product Design)">C Fine Arts (Product Design)</option>
                <option value="C Fine Arts (Studio Arts)">C Fine Arts (Studio Arts)</option>
                <option value="Master in Public Affairs (Agrarian and Rurban Development Studies)">Master in Public Affairs (Agrarian and Rurban Development Studies)</option>
                <option value="Master in Public Affairs (Education Management)">Master in Public Affairs (Education Management)</option>
                <option value="Master in Public Affairs (Strategic Planning and Public Policy)">Master in Public Affairs (Strategic Planning and Public Policy)</option>
                <option value="Master of Arts in Communication and Media">Master of Arts in Communication and Media</option>
                <option value="Master of Business Administration">Master of Business Administration</option>
                <option value="Master of Education (Biology)">Master of Education (Biology)</option>
                <option value="Master of Education (Chemistry)">Master of Education (Chemistry)</option>
                <option value="Master of Education (English as a Second Language)">Master of Education (English as a Second Language)</option>
                <option value="Master of Education (Filipino)">Master of Education (Filipino)</option>
                <option value="Master of Education (Mathematics)">Master of Education (Mathematics)</option>
                <option value="Master of Education (Physics)">Master of Education (Physics)</option>
                <option value="Master of Education (Social Studies)">Master of Education (Social Studies)</option>
                <option value="Master of Science in Computer Science">Master of Science in Computer Science</option>
                <option value="Master of Science in Environmental Science">Master of Science in Environmental Science</option>
                <option value="Master of Science in Environmental Studies">Master of Science in Environmental Studies</option>
                <option value="Master of Science in Mathematics (Applied Mathematics)">Master of Science in Mathematics (Applied Mathematics)</option>
                <option value="Master of Science in Mathematics (Mathematics Education)">Master of Science in Mathematics (Mathematics Education)</option>
                <option value="Master of Science in Mathematics (Pure Mathematics)">Master of Science in Mathematics (Pure Mathematics)</option>
                <option value="Professional Master in Data Science (Computing)">Professional Master in Data Science (Computing)</option>
            </select>
            <p class="text-[12px] text-gray-500 mt-1">
                For any questions regarding your primary program, please proceed to <span class="font-semibold text-[#850038]">OUR</span>.
            </p>
        </div>

        <div class="relative w-full">
            <label for="first_name" class="font-medium">
                First Name
                <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="first_name" name="first_name" type="text"
                class="peer w-full px-4 py-3 text-base bg-white outline-none 
                    border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

        <div class="relative w-full">
            <label for="middle_name" class="font-medium">
                Middle Name
            </label>
            <input id="middle_name" name="middle_name" type="text"
                class="peer w-full px-4 py-3 text-base bg-white outline-none 
                    border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

        <div class="relative w-full">
            <label for="last_name" class="font-medium">
                Last Name<span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="last_name" name="last_name" type="text"
                class="peer w-full px-4 py-3 text-base bg-white outline-none 
                    border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
        </div>

        <!-- Name Suffix -->
        <div class="relative w-full">
            <label for="name_suffix" class="font-medium">
                Name Suffix
            </label>
            <select id="name_suffix" name="name_suffix"
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
            <p class="text-[12px] text-gray-500 mt-1">Please Select if your legal name includes a suffix</p>
        </div>

        <!-- Birth Date - new date picker -->
        <div class="relative w-full" id="birth-date-picker">
            <label class="font-medium">Birth Date <span class="text-red-500 ml-1">*</span></label>
            <div class="relative mt-2">
                <!-- display input (readonly) -->
                <input type="text" id="birth-input" readonly
                       class="w-full cursor-pointer rounded-lg border-2 border-gray-300 bg-white py-3 px-4 pr-10 text-gray-900 focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors"
                       placeholder="mm / dd / yyyy">
                <!-- calendar icon -->
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <!-- calendar panel (hidden by default) -->
                <div id="birth-calendar"
                     class="datepicker-calendar datepicker-hidden absolute left-0 right-0 mt-2 bg-white rounded-xl shadow-xl border border-gray-200 p-4 z-10 transition-all duration-150 sm:left-auto sm:w-80 mx-auto">
                    <div class="flex items-center justify-between gap-1 mb-4">
                        <select id="birth-month" class="block w-28 text-sm border-gray-300 rounded-[12px] shadow-sm focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] bg-white py-1.5 px-2"></select>
                        <select id="birth-year" class="block w-20 text-sm border-gray-300 rounded-[12px] shadow-sm focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] bg-white py-1.5 px-2"></select>
                        <div class="flex gap-1">
                            <button type="button" id="birth-prev" class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-gray-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button type="button" id="birth-next" class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-gray-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-7 gap-1 text-center text-xs font-medium text-gray-500 mb-2">
                        <div>Su</div><div>Mo</div><div>Tu</div><div>We</div><div>Th</div><div>Fr</div><div>Sa</div>
                    </div>
                    <div id="birth-days" class="grid grid-cols-7 gap-1 text-sm"></div>
                    <div class="mt-3 text-right">
                        <button type="button" id="birth-today" class="text-xs text-[#850038] hover:text-[#850038] font-medium px-2 py-1 rounded hover:bg-blue-50 transition-colors">
                            Today
                        </button>
                    </div>
                </div>
            </div>
            <p class="text-[12px] text-gray-500 mt-1">Month/ Day / Year</p>
            <!-- hidden input for server -->
            <input type="hidden" id="dob" name="dob" />
        </div>

        <!-- Sex at Birth -->
        <div class="relative w-full">
            <label for="sexatbirth" class="font-medium">Sex at Birth <span class="text-red-500 ml-1">*</span></label>
            <select id="sexatbirth" name="sexatbirth" required
                class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] focus:outline-none 
                focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
                appearance-none">
                <option value="" disabled selected>Please Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <!-- Birth Place -->
        <div class="md:col-span-1 flex flex-col w-full">
            <label for="birthplace" class="font-medium">
                Birth Place <span class="text-red-500 ml-1">*</span>
            </label>
            <input required id="birthplace" name="birthplace" type="text"
                class="peer w-full px-4 py-3 text-base bg-white outline-none border-2 border-gray-300 rounded-[12px] focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2"/>
            <p class="text-[12px] text-gray-500 mt-1">ex. Cebu City</p>
        </div>

        <!-- Civil Status -->
        <div class="md:col-span-1 flex flex-col w-full">
            <label for="civilstatus" class="font-medium">
                Civil Status<span class="text-red-500 ml-1">*</span>
            </label>
            <select id="civilstatus" name="civilstatus" required
                class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px] focus:outline-none 
                focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors mt-2
                appearance-none">
                <option value="" disabled selected>Please Select</option>
                <option value="single">Single (never married)</option>
                <option value="married">Married</option>
                <option value="separated">Separated (legally or de facto)</option>
                <option value="annuled">Annulled / Marriage declared null and void</option>
                <option value="widowed">Widowed</option>
                <option value="livin">Living with partner / Cohabiting</option>
                <option value="noans">Prefer not to answer</option>
            </select>
        </div>

        <!-- Marriage Section (hidden by default) -->
        <div id="marriagesection" class="col-span-1 md:col-span-2 hidden">
            <!-- Marriage Date - new date picker -->
            <div class="mb-6" id="marriage-date-picker">
                <label for="marriage-input" class="font-medium">Marriage Date <span class="text-red-500 ml-1">*</span></label>
                <div class="relative mt-2">
                    <input type="text" id="marriage-input" readonly
                           class="w-full cursor-pointer rounded-lg border-2 border-gray-300 bg-white py-3 px-4 pr-10 text-gray-900 focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] transition-colors"
                           placeholder="mm / dd / yyyy">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div id="marriage-calendar"
                         class="datepicker-calendar datepicker-hidden absolute left-0 right-0 mt-2 bg-white rounded-xl shadow-xl border border-gray-200 p-4 z-10 transition-all duration-150 sm:left-auto sm:w-80 mx-auto">
                        <div class="flex items-center justify-between gap-1 mb-4">
                            <select id="marriage-month" class="block w-28 text-sm border-gray-300 rounded-[12px] shadow-sm focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] bg-white py-1.5 px-2"></select>
                            <select id="marriage-year" class="block w-20 text-sm border-gray-300 rounded-[12px] shadow-sm focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021] bg-white py-1.5 px-2"></select>
                            <div class="flex gap-1">
                                <button type="button" id="marriage-prev" class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-gray-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button type="button" id="marriage-next" class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-gray-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="grid grid-cols-7 gap-1 text-center text-xs font-medium text-gray-500 mb-2">
                            <div>Su</div><div>Mo</div><div>Tu</div><div>We</div><div>Th</div><div>Fr</div><div>Sa</div>
                        </div>
                        <div id="marriage-days" class="grid grid-cols-7 gap-1 text-sm"></div>
                        <div class="mt-3 text-right">
                            <button type="button" id="marriage-today" class="text-xs text-[#850038] hover:text-[#850038] font-medium px-2 py-1 rounded hover:bg-blue-50 transition-colors">
                                Today
                            </button>
                        </div>
                    </div>
                </div>
                <p class="text-[12px] text-gray-500 mt-1">Month/ Day / Year</p>
                <input type="hidden" id="marriagedate" name="marriagedate" />
            </div>
            

            <!-- Article 370 Info + Preferred Name (with ID) -->
            <div id="preferred_name_section" class="col-span-1 md:col-span-2 text-justify">
                <p class="text-black-700">
                    Under <span class="font-semibold text-[#850038]">
                        <a target="_blank" href="https://pcw.gov.ph/republic-act-386-the-civil-code-of-the-philippines/"
                           class="font-medium text-[#850038] hover:text-[#850038]">
                            Article 370
                        </a>
                    </span>
                    of the Civil Code of the Philippines,
                    a married woman may choose how her name will appear after marriage.
                    While marriage does not legally require a change in name, the law allows a woman to:
                </p>

                <ol class="list-decimal pl-6 mt-3 space-y-3 marker:text-[#850038]">
                    <li id="fullmaidenname">
                        Retain her full maiden name
                        <span class="text-[#850038]">(Juana Luna Santos)</span>
                    </li>
                    <li id="hyphenatedsurname">
                        Use a hyphenated surname, combining her maiden surname and her husband’s surname
                        <span class="text-[#850038]">(Juana Luna Santos-Cruz)</span>
                    </li>
                    <li id="husbandsurname">
                        Adopt her husband’s surname by placing it after her maiden first name and surname
                        <span class="text-[#850038]">(Juana Santos Cruz)</span>
                    </li>
                </ol>

                <div id="husband-surname-container" class="hidden mt-4">
                    <label for="husband_surname" class="font-medium">
                        Husband's Surname <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="husband_surname" name="husband_surname"
                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-[12px]
                                  focus:outline-none focus:border-[#0E6021] focus:ring-1 focus:ring-[#0E6021]
                                  transition-colors mt-1"
                           placeholder="Enter husband's surname">
                    <p class="text-[12px] text-gray-500 mt-1">Required if you choose hyphenated or husband's surname.</p>
                </div>

                <p class="mt-3 text-black-700 font-semibold">
                    Please select one of the following options to help us record your preferred name format
                    for official and academic purposes.
                </p>
                <p class="mt-6 font-bold">
                    Preferred Name <span class="text-red-500 ml-1">*</span>
                </p>
                <div class="mt-3 space-y-3">
                    <label class="flex items-start gap-2 text-justify">
                        <input type="radio" name="name_format" value="maiden" class="mt-1 accent-[#0E6021]">
                        <span>Full maiden name (First name, Middle name, Surname)</span>
                    </label>
                    <label class="flex items-start gap-2 text-justify">
                        <input type="radio" name="name_format" value="hyphenated" class="mt-1 accent-[#0E6021]">
                        <span>Hyphenated surname (First name, Middle name, Surname-Husband's Surname)</span>
                    </label>
                    <label class="flex items-start gap-2 text-justify">
                        <input type="radio" name="name_format" value="husband" class="mt-1 accent-[#0E6021]">
                        <span>Husband's surname (First name, Surname, Husband's Surname)</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .datepicker-calendar {
        transition: opacity 0.15s ease, transform 0.1s ease;
        transform-origin: top center;
    }
    .datepicker-hidden {
        opacity: 0;
        pointer-events: none;
        transform: scaleY(0.95);
    }
</style>

<script>
    // ===== Existing toggle logic =====
    const civilStatus = document.getElementById('civilstatus');
    const marriageSection = document.getElementById('marriagesection');
    const marriageDateHidden = document.getElementById('marriagedate');

    function toggleMarriageSection() {
        if (civilStatus.value === 'married') {
            marriageSection.classList.remove('hidden');
            marriageDateHidden.setAttribute('required', 'required');
        } else {
            marriageSection.classList.add('hidden');
            marriageDateHidden.removeAttribute('required');
            marriageDateHidden.value = '';
            const marriageInput = document.getElementById('marriage-input');
            if (marriageInput) marriageInput.value = '';
        }
    }

    civilStatus.addEventListener('change', toggleMarriageSection);
    toggleMarriageSection();

    function togglePreferredNameVisibility() {
        const sex = document.getElementById('sexatbirth').value;
        const civil = document.getElementById('civilstatus').value;
        const prefSection = document.getElementById('preferred_name_section');
        if (civil === 'married' && sex === 'male') {
            prefSection.classList.add('hidden');
        } else {
            prefSection.classList.remove('hidden');
        }
    }

    document.getElementById('sexatbirth').addEventListener('change', togglePreferredNameVisibility);
    document.getElementById('civilstatus').addEventListener('change', togglePreferredNameVisibility);
    togglePreferredNameVisibility();

    // ===== Date picker factory (modified for mm/dd/yyyy and 1970 start) =====
    function initDatePicker(config) {
        const {
            containerId,
            inputId,
            hiddenId,
            calendarId,
            monthSelectId,
            yearSelectId,
            daysGridId,
            prevBtnId,
            nextBtnId,
            todayBtnId,
            yearStart = 1970,      // changed from 1900 to 1970
            yearEnd = new Date().getFullYear()
        } = config;

        const inputEl = document.getElementById(inputId);
        const hiddenEl = document.getElementById(hiddenId);
        const calendar = document.getElementById(calendarId);
        const monthSelect = document.getElementById(monthSelectId);
        const yearSelect = document.getElementById(yearSelectId);
        const daysGrid = document.getElementById(daysGridId);
        const prevBtn = document.getElementById(prevBtnId);
        const nextBtn = document.getElementById(nextBtnId);
        const todayBtn = document.getElementById(todayBtnId);
        const container = document.getElementById(containerId) || inputEl.parentElement;

        let currentDate = new Date();
        currentDate.setDate(1);
        let selectedDate = null;

        if (hiddenEl.value) {
            const parts = hiddenEl.value.split('-');
            if (parts.length === 3) {
                const y = parseInt(parts[0], 10);
                const m = parseInt(parts[1], 10) - 1;
                const d = parseInt(parts[2], 10);
                selectedDate = new Date(y, m, d);
                currentDate = new Date(y, m, 1);
                inputEl.value = formatDisplay(selectedDate);
            }
        }

        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        monthNames.forEach((name, index) => {
            const option = document.createElement('option');
            option.value = index;
            option.textContent = name;
            monthSelect.appendChild(option);
        });

        for (let y = yearEnd; y >= yearStart; y--) {
            const option = document.createElement('option');
            option.value = y;
            option.textContent = y;
            yearSelect.appendChild(option);
        }

        // Format as mm / dd / yyyy
        function formatDisplay(date) {
            if (!date) return '';
            const m = String(date.getMonth() + 1).padStart(2, '0');
            const d = String(date.getDate()).padStart(2, '0');
            const y = date.getFullYear();
            return `${m} / ${d} / ${y}`;
        }

        function syncSelectsFromDate() {
            monthSelect.value = currentDate.getMonth();
            yearSelect.value = currentDate.getFullYear();
        }

        function renderCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();

            syncSelectsFromDate();

            const firstDay = new Date(year, month, 1).getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const prevMonthDays = new Date(year, month, 0).getDate();

            let cells = [];
            for (let i = 0; i < 42; i++) {
                let cellDay, cellMonth, cellYear, isCurrentMonth;

                if (i < firstDay) {
                    cellDay = prevMonthDays - firstDay + i + 1;
                    cellMonth = month - 1;
                    cellYear = month === 0 ? year - 1 : year;
                    isCurrentMonth = false;
                } else if (i < firstDay + daysInMonth) {
                    cellDay = i - firstDay + 1;
                    cellMonth = month;
                    cellYear = year;
                    isCurrentMonth = true;
                } else {
                    cellDay = i - (firstDay + daysInMonth) + 1;
                    cellMonth = month + 1;
                    cellYear = month === 11 ? year + 1 : year;
                    isCurrentMonth = false;
                }

                const cellDate = new Date(cellYear, cellMonth, cellDay);

                const isSelected = selectedDate &&
                    cellDate.getFullYear() === selectedDate.getFullYear() &&
                    cellDate.getMonth() === selectedDate.getMonth() &&
                    cellDate.getDate() === selectedDate.getDate();

                const today = new Date();
                const isToday = cellDate.getFullYear() === today.getFullYear() &&
                                cellDate.getMonth() === today.getMonth() &&
                                cellDate.getDate() === today.getDate();

                let classNames = 'h-9 w-full rounded-[12px] flex items-center justify-center transition-colors cursor-pointer ';

                if (!isCurrentMonth) {
                    classNames += 'text-gray-300 hover:bg-gray-100 ';
                } else {
                    classNames += 'text-gray-800 hover:bg-blue-100 ';
                }

                if (isSelected) {
                    classNames = 'h-9 w-full rounded-[12px] flex items-center justify-center transition-colors cursor-pointer bg-[#0E6021] text-white hover:bg-[#0a4a1a] font-medium';
                } else if (isToday && isCurrentMonth && !isSelected) {
                    classNames += 'border border-[#0E6021] bg-green-50';
                }

                cells.push(`<div class="${classNames}" data-year="${cellYear}" data-month="${cellMonth}" data-day="${cellDay}" data-month-current="${isCurrentMonth}">${cellDay}</div>`);
            }

            daysGrid.innerHTML = cells.join('');
        }

        function selectDate(date) {
            selectedDate = date;
            hiddenEl.value = date ? date.toISOString().slice(0, 10) : '';
            inputEl.value = date ? formatDisplay(date) : '';
            hideCalendar();
            renderCalendar();
        }

        function showCalendar() {
            calendar.classList.remove('datepicker-hidden');
            renderCalendar();
        }

        function hideCalendar() {
            calendar.classList.add('datepicker-hidden');
        }

        function toggleCalendar() {
            if (calendar.classList.contains('datepicker-hidden')) {
                showCalendar();
            } else {
                hideCalendar();
            }
        }

        inputEl.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleCalendar();
        });

        daysGrid.addEventListener('click', (e) => {
            const dayDiv = e.target.closest('[data-year]');
            if (!dayDiv) return;

            const year = parseInt(dayDiv.dataset.year, 10);
            const month = parseInt(dayDiv.dataset.month, 10);
            const day = parseInt(dayDiv.dataset.day, 10);
            const isCurrentMonth = dayDiv.dataset.monthCurrent === 'true';

            const chosenDate = new Date(year, month, day);

            if (!isCurrentMonth) {
                currentDate = new Date(year, month, 1);
            }

            selectDate(chosenDate);
        });

        monthSelect.addEventListener('change', () => {
            const newMonth = parseInt(monthSelect.value, 10);
            const newYear = parseInt(yearSelect.value, 10);
            currentDate = new Date(newYear, newMonth, 1);
            renderCalendar();
        });

        yearSelect.addEventListener('change', () => {
            const newMonth = parseInt(monthSelect.value, 10);
            const newYear = parseInt(yearSelect.value, 10);
            currentDate = new Date(newYear, newMonth, 1);
            renderCalendar();
        });

        prevBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });

        nextBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });

        todayBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const today = new Date();
            currentDate = new Date(today.getFullYear(), today.getMonth(), 1);
            renderCalendar();
        });

        document.addEventListener('mousedown', (e) => {
            if (!container.contains(e.target)) {
                hideCalendar();
            }
        });

        calendar.addEventListener('mousedown', (e) => e.stopPropagation());

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !calendar.classList.contains('datepicker-hidden')) {
                hideCalendar();
            }
        });

        renderCalendar();
    }

    // Initialize both date pickers with 1970 start
    document.addEventListener('DOMContentLoaded', function() {
        initDatePicker({
            containerId: 'birth-date-picker',
            inputId: 'birth-input',
            hiddenId: 'dob',
            calendarId: 'birth-calendar',
            monthSelectId: 'birth-month',
            yearSelectId: 'birth-year',
            daysGridId: 'birth-days',
            prevBtnId: 'birth-prev',
            nextBtnId: 'birth-next',
            todayBtnId: 'birth-today',
            yearStart: 1970
        });

        initDatePicker({
            containerId: 'marriage-date-picker',
            inputId: 'marriage-input',
            hiddenId: 'marriagedate',
            calendarId: 'marriage-calendar',
            monthSelectId: 'marriage-month',
            yearSelectId: 'marriage-year',
            daysGridId: 'marriage-days',
            prevBtnId: 'marriage-prev',
            nextBtnId: 'marriage-next',
            todayBtnId: 'marriage-today',
            yearStart: 1970
        });
    });
</script>