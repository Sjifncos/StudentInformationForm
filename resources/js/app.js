import './bootstrap';

// ---------- Global Toast Notification System ----------
const activeToastMessages = new Set();

window.closeToast = function(id) {
    const $toast = $(`#${id}`);
    if (!$toast.length) return;

    const message = $toast.data('message');
    if (message) activeToastMessages.delete(message);

    const timeoutId = $toast.data('timeoutId');
    if (timeoutId) clearTimeout(timeoutId);
    $toast.fadeOut(300, function() { $(this).remove(); });
};

window.showToast = function(message, type = 'error') {
    if (activeToastMessages.has(message)) return;

    const toastId = 'toast-' + Date.now() + '-' + Math.random().toString(36).substr(2, 9);
    const bgColor = type === 'success' ? 'bg-green-500' : 'bg-[#FF3131]';
    const icon = type === 'success' ? '' : '';

    const toastHtml = `
        <div id="${toastId}" class="flex items-center justify-between ${bgColor} text-white px-4 py-3 rounded-lg shadow-lg transform transition-all duration-300 translate-x-0 opacity-100">
            <div class="flex items-center space-x-2">
                ${icon}
                <span class="text-sm font-medium">${message}</span>
            </div>
            <button class="ml-4 text-white hover:text-gray-200 focus:outline-none close-toast-btn" data-toast-id="${toastId}">
                <svg fill="#ffffff" width="18px" height="18px" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg">
                    <path d="M128,20.00012a108,108,0,1,0,108,108A108.12217,108.12217,0,0,0,128,20.00012Zm0,192a84,84,0,1,1,84-84A84.0953,84.0953,0,0,1,128,212.00012Zm40.48535-107.51465L144.9707,128.00012l23.51465,23.51465a12.0001,12.0001,0,0,1-16.9707,16.9707L128,144.97082l-23.51465,23.51465a12.0001,12.0001,0,0,1-16.9707-16.9707l23.51465-23.51465L87.51465,104.48547a12.0001,12.0001,0,0,1,16.9707-16.9707L128,111.02942l23.51465-23.51465a12.0001,12.0001,0,0,1,16.9707,16.9707Z"/>
                </svg>
            </button>
        </div>
    `;

    $('#toastContainer').append(toastHtml);
    const $toast = $(`#${toastId}`);
    $toast.data('message', message);
    activeToastMessages.add(message);

    const timeoutId = setTimeout(() => {
        closeToast(toastId);
    }, 3000);
    $toast.data('timeoutId', timeoutId);
};

$(document).ready(function() {
    // CSRF token setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ---------- Step Navigation Variables ----------
    let currentStep = 1;
    let maxStepReached = 1;
    let totalSteps = 10;
    let visibleSteps = [1,2,3,4,5,6,7,8,9,10];
    let maxVisibleIndex = 0;

    // Modal confirmation variables
    let motherConfirmPending = false;
    let pendingTargetStep = null;
    let mobileMatchPending = false;
    let pendingMobileStep = null;

    // NEW: Flags to remember if the user has confirmed the conflict
    let motherNameConfirmed = false;
    let mobileMatchConfirmed = false;
    let pendingModalQueue = []; // Queue for sequential modals

    // ---------- Session ID for JSON storage ----------
    let sessionId = localStorage.getItem('form_session_id') || null;

    // ---------- Helper Functions ----------
    function resetStep5ConfirmationFlags() {
        motherNameConfirmed = false;
        mobileMatchConfirmed = false;
        pendingModalQueue = [];
    }

    function showNextModal() {
        if (pendingModalQueue.length === 0) return;
        const next = pendingModalQueue.shift();
        if (next === 'mother') {
            // Populate modal with current names
            const motherLastname = $('#mother_lastname').val().trim();
            const fatherLastname = $('#fathers_lastname').val().trim();
            $('#modal-mother-lastname').text(motherLastname);
            $('#modal-father-lastname').text(fatherLastname);
            $('#motherLastnameModal').removeClass('hidden').show();
        } else if (next === 'mobile') {
            $('#mobileMatchModal').removeClass('hidden').show();
        }
    }

    // ---------- Close Toast Button Handler ----------
    $(document).on('click', '.close-toast-btn', function() {
        closeToast($(this).data('toast-id'));
    });

    // ---------- Toggle sublabels for mobile number fields based on citizenship ----------
    function toggleMobileSublabels() {
        const citizenship = $('#citizenship').val();
        const isNonCitizen = (citizenship === 'no');

        const mobileFieldIds = ['mobilenumber', 'emergency_mobilenumber', 'guardian_phonenumber'];

        mobileFieldIds.forEach(id => {
            const $field = $('#' + id);
            if ($field.length) {
                const $sublabel = $field.next('p');
                if ($sublabel.length && $sublabel.hasClass('text-gray-500')) {
                    if (isNonCitizen) {
                        $sublabel.hide();
                    } else {
                        $sublabel.show();
                    }
                }
            }
        });
    }

    function toggleGuardianSection() {
        const category = $('#category').val();
        if (category === 'undergraduate') {
            $('#guardian-section').removeClass('hidden');
        } else {
            $('#guardian-section').addClass('hidden');
            $('#guardian-section input, #guardian-section select').val('');
        }
    }

    function toggleFirstPersonFields() {
        const category = $('#category').val();
        const shouldHide = category === 'graduate';

        const $collegeContainer = $('#firstperson_to_attend_college').closest('.relative.w-full');
        const $upContainer = $('#firstpersonup').closest('.relative.w-full');

        if (shouldHide) {
            $collegeContainer.addClass('hidden');
            $upContainer.addClass('hidden');
            $('#firstperson_to_attend_college').val('');
            $('#firstpersonup').val('');
        } else {
            $collegeContainer.removeClass('hidden');
            $upContainer.removeClass('hidden');
        }
    }

    function updateVisibleSteps() {
        const category = $('#category').val();
        let newVisibleSteps;

        if (!category) {
            newVisibleSteps = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        } else if (category === 'graduate') {
            newVisibleSteps = [1, 2, 3, 4, 5, 7, 8, 9, 10];
        } else if (category === 'undergraduate') {
            newVisibleSteps = [1, 2, 3, 4, 5, 6, 8, 9, 10];
        }
        if (JSON.stringify(visibleSteps) !== JSON.stringify(newVisibleSteps)) {
            visibleSteps = newVisibleSteps;

            $('.step').each(function() {
                const stepNum = parseInt($(this).data('step'));
                if (visibleSteps.includes(stepNum)) {
                    $(this).removeClass('hidden');
                } else {
                    $(this).addClass('hidden');
                }
            });

            $('.step-label').each(function() {
                const stepNum = parseInt($(this).data('step'));
                if (visibleSteps.includes(stepNum)) {
                    $(this).removeClass('hidden');
                } else {
                    $(this).addClass('hidden');
                }
            });

            if (!visibleSteps.includes(currentStep)) {
                currentStep = visibleSteps[0];
                maxVisibleIndex = 0;
            } else {
                maxVisibleIndex = Math.max(maxVisibleIndex, visibleSteps.indexOf(currentStep));
            }

            totalSteps = visibleSteps.length;
            $('#stepCounter').text(`Step Completed ${maxVisibleIndex} / ${totalSteps}`);
            showStep(currentStep);
        }

        toggleGuardianSection();
        toggleFirstPersonFields();
    }

    function toggleMarriageCertificate() {
        const civilStatus = $('#civilstatus').val();
        if (civilStatus === 'married') {
            $('#marriage_certificate_container').removeClass('hidden');
        } else {
            $('#marriage_certificate_container').addClass('hidden');
            $('#marriage_certificate_container input[type="file"]').val('');
        }
    }

    function togglePWDContainer() {
        const pwdValue = $('#pwd').val();
        if (pwdValue === 'Yes') {
            $('#pwd_card_container').removeClass('hidden');
        } else {
            $('#pwd_card_container').addClass('hidden');
            $('#pwd_card_container input[type="file"]').val('');
        }
    }

    function toggleCourtOrderContainer() {
        const sex = $('#sexatbirth').val();
        const civil = $('#civilstatus').val();
        const nameFormat = $('input[name="name_format"]:checked').val();
        const showCourtOrder = (sex === 'female' && civil === 'married' && ( nameFormat === 'maiden' || nameFormat === 'hyphenated' || nameFormat === 'husband'));

        if (showCourtOrder) {
            $('#marriage_container').removeClass('hidden');
        } else {
            $('#marriage_container').addClass('hidden');
            $('#marriage_container input[type="file"]').val('');
        }
    }

    function showStep(step) {
        // Close any open modals when manually navigating
        if (motherConfirmPending) {
            $('#motherLastnameModal').hide().addClass('hidden');
            motherConfirmPending = false;
            pendingTargetStep = null;
        }
        if (mobileMatchPending) {
            $('#mobileMatchModal').hide().addClass('hidden');
            mobileMatchPending = false;
            pendingMobileStep = null;
        }

        // FIX: Do NOT reset confirmation flags when leaving step 5
        // This allows confirmed conflicts to persist across steps

        $('.step').addClass('hidden');
        $(`.step[data-step="${step}"]`).removeClass('hidden');

        $('.step-label')
            .removeClass('text-[#8A1538] border-b-2 border-[#8A1538]')
            .addClass('text-slate-400');
        $(`.step-label[data-step="${step}"]`)
            .removeClass('text-slate-400')
            .addClass('text-[#8A1538] border-b-2 border-[#8A1538]');

        const currentIndex = visibleSteps.indexOf(step);
        if (currentIndex > maxVisibleIndex) {
            maxVisibleIndex = currentIndex;
        }
        $('#stepCounter').text(`Step Completed ${maxVisibleIndex} / ${totalSteps}`);

        $('#prevBtn').toggle(currentIndex !== 0);
        if (currentIndex === totalSteps - 1) {
            $('#nextBtn').hide();
            $('#submitBtn').removeClass('hidden');
            const bothChecked = $('#confirmation').is(':checked') && $('#data-privacy').is(':checked');
            $('#submitBtn').prop('disabled', !bothChecked);
            if (!bothChecked) {
                $('#submitBtn').addClass('opacity-50 cursor-not-allowed');
            } else {
                $('#submitBtn').removeClass('opacity-50 cursor-not-allowed');
            }
        } else {
            $('#nextBtn').show();
            $('#submitBtn').addClass('hidden');
        }
        if (step === 1) {
            const isChecked = $('#agreement').is(':checked');
            $('#nextBtn').prop('disabled', !isChecked);
            if (!isChecked) {
                $('#nextBtn').addClass('opacity-50 cursor-not-allowed');
            } else {
                $('#nextBtn').removeClass('opacity-50 cursor-not-allowed');
            }
        } else {
            $('#nextBtn').prop('disabled', false).removeClass('opacity-50 cursor-not-allowed');
        }

        if (step === 8) {
            toggleMarriageCertificate();
            toggleFirstPersonFields();
        }
        if (step === 9) {
            togglePWDContainer();
            toggleCourtOrderContainer();
        }
        if (step === 5) {
            toggleGuardianSection();
        }

        // NEW: Filter degree programs when entering Step 3
        if (step === 3 && typeof window.filterDegreePrograms === 'function') {
            window.filterDegreePrograms();
        }
    }

    // ---------- Validation Function ----------
    function validateStep(step) {
        let errors = [];
        const $step = $(`.step[data-step="${step}"]`);
        
        $step.find('input, select, textarea').removeClass('border-red-500');
        $step.find('.mb-6').removeClass('border-red-500 border rounded p-2');
        $step.find('.border-red-500').removeClass('border-red-500');

        const citizenship = $('#citizenship').val();
        const isNonPhilippineCitizen = citizenship === 'no';

        const typeofincome = $('#typeofincome').val();
        const isNotEarning = typeofincome === 'notearning';

        const sameAddressValue = $('#same_address').val();

        $step.find('input:not([type="radio"]), select, textarea').each(function () {
            const $field = $(this);
            const fieldName = $field.attr('name');
            
            if ($field.closest('[style*="display: none"], .hidden').length > 0) {
                return;
            }
            if ($field.prop('disabled')) {
                return;
            }
            if ($field.closest('.hidden').length > 0) {
                return;
            }

            let value = $field.val();
            if (typeof value === 'string') value = value.trim();

            // --- IMPROVED LABEL EXTRACTION ---
            let label = fieldName;
            let $label = $field.closest('.mb-4, .relative, .flex-col, .col-span-1, .md\\:col-span-1, .md\\:col-span-2').find('label').first();
            if (!$label.length && $field.attr('id')) {
                $label = $(`label[for="${$field.attr('id')}"]`);
            }
            if ($label.length) {
                label = $label.text().replace('*', '').trim();
            }

            const requiredFields = [
                'student_number',
                'category',
                'degreeprogram',
                'first_name',
                'last_name',
                'dob',
                'sexatbirth',
                'birthplace',
                'civilstatus',
                'citizenship',
                'same_address',
                'streetaddressline1_ph',
                'region',
                //'province',
                'city',
                'barangay',
                'PSGC',
                'personalemail',
                'mobilenumber',
                'emergency_fullname',
                'emergency_mobilenumber',
                'seniorhighschoolattended',
                'locationofhighschool',
                'honorsreceived',
                'scholarship',
                'educationalattainment',
                'undergraddegree',

                'school',
                'program',
                'degree',
                'year_graduated',

                'lastschoolattended',
                'typeofincome',
                'funding_sources',
                'firstperson_to_attend_college',
                'firstpersonup',
                'annualincome',
                'pwd',
                'support-specify',
                'ipra',
                'ipra_specify',
                'indigenous_group'
            ];

            const conditionalFields = [
                'nameofemployer',
                'natureofwork',
                'income'
            ];

            const foreignFields = [
                'citizenship_country',
                'outside_ph_addressline1',
                'city_foreign',
                'state/province_foreign',
                'zipcode_foreign',
                'foreign_country'
            ];

            let isRequired = requiredFields.includes(fieldName);
            
            if (conditionalFields.includes(fieldName)) {
                isRequired = !isNotEarning;
            }
            if (foreignFields.includes(fieldName)) {
                isRequired = isNonPhilippineCitizen;
            }
                        // Skip province validation if NCR is selected
            if (fieldName === 'province' && $('#region').val() === '1300000000') {
                isRequired = false;
            }

            // Skip current_province validation if current NCR is selected
            if (fieldName === 'current_province' && $('#current_region').val() === '1300000000') {
                isRequired = false;
            }

            if (fieldName && fieldName.startsWith('current_')) {
                const citizenshipVal = $('#citizenship').val();
                const showCurrent = (citizenshipVal === 'no') || (citizenshipVal === 'yes' && sameAddressValue === 'no');
                if (showCurrent) {
                    const optionalCurrentFields = [
                        'current_room_flr_unit_bldg',
                        'current_house_lot_blk',
                        'current_street',
                        'current_subdivision_line2'
                    ];
                    if (!optionalCurrentFields.includes(fieldName)) {
                        isRequired = true;
                    }
                }
            }

            if (isRequired && !value) {
                errors.push(`${label} is required.`);
                $field.addClass('border-red-500');
            }

            // --- UP Student Number ---
            if (fieldName === 'student_number' && value) {
                const studentNumberRegex = /^20\d{2}\d{4,5}$/;
                if (!studentNumberRegex.test(value)) {
                    errors.push(`UP Student Number must be in the format 20xx-xxxx or 20xx-xxxxx.`);
                    $field.addClass('border-red-500');
                }
            }

            // --- Email validations ---
            if (fieldName === 'UP_email' && value) {
                const upEmailRegex = /^[a-zA-Z0-9._%+-]+@up\.edu\.ph$/;
                if (!upEmailRegex.test(value)) {
                    errors.push(`UP E-mail Address must be a valid @up.edu.ph email.`);
                    $field.addClass('border-red-500');
                }
            }

            if (fieldName === 'personalemail' && value) {
                const emailPattern = /^\S+@\S+\.\S+$/;
                if (!emailPattern.test(value)) {
                    errors.push(`Please enter a valid email address.`);
                    $field.addClass('border-red-500');
                }
            }

            // --- ZIP Code ---
            if (fieldName === 'zipcode_foreign' && value) {
                if (!/^\d{1,10}$/.test(value)) {
                    errors.push(`ZIP Code must be digits only.`);
                    $field.addClass('border-red-500');
                }
            }

            // --- Landline ---
            if (fieldName === 'landlinenumber' && value) {
                if (!/^\d{7,8}$/.test(value)) {
                    errors.push(`Landline number is invalid`);
                    $field.addClass('border-red-500');
                }
            }

            // --- Mobile numbers (conditional based on citizenship) ---
            const mobileFields = ['mobilenumber', 'emergency_mobilenumber', 'guardian_phonenumber'];
            if (mobileFields.includes(fieldName) && value) {
                const cleanNumber = value.replace(/[\s\-\(\)]/g, '');
                if (citizenship === 'yes') {
                    if (!/^0\d{10}$/.test(cleanNumber)) {
                        errors.push(`Phone number is invalid. Please enter a valid Philippines mobile number.`);
                        $field.addClass('border-red-500');
                    }
                } else {
                    if (!/^\d+$/.test(cleanNumber)) {
                        errors.push(`Phone number must contain only digits.`);
                        $field.addClass('border-red-500');
                    }
                }
            }

            // --- BIRTH DATE validation ---
            if (fieldName === 'dob') {
                const dobValue = value;
                if (!dobValue) {
                    errors.push(`Birth Date is required.`);
                    $('#birth-input').addClass('border-red-500');
                } else {
                    const parts = dobValue.split('-');
                    if (parts.length !== 3) {
                        errors.push(`Birth Date is invalid.`);
                        $('#birth-input').addClass('border-red-500');
                    } else {
                        const year = parseInt(parts[0], 10);
                        const month = parseInt(parts[1], 10) - 1;
                        const day = parseInt(parts[2], 10);
                        const birthDate = new Date(Date.UTC(year, month, day));
                        const today = new Date();
                        today.setUTCHours(0, 0, 0, 0);

                        if (isNaN(birthDate.getTime())) {
                            errors.push(`Birth Date is invalid.`);
                            $('#birth-input').addClass('border-red-500');
                        } else {
                            if (birthDate > today) {
                                errors.push(`Birth date cannot be in the future.`);
                                $('#birth-input').addClass('border-red-500');
                            }

                            const minAgeDate = new Date(today);
                            minAgeDate.setUTCFullYear(today.getUTCFullYear() - 18);
                            if (birthDate > minAgeDate) {
                                errors.push(`You must be at least 18 years old.`);
                                $('#birth-input').addClass('border-red-500');
                            }

                            const maxAgeDate = new Date(today);
                            maxAgeDate.setUTCFullYear(today.getUTCFullYear() - 70);
                            if (birthDate < maxAgeDate) {
                                errors.push(`Birth date is invalid (must be within the last 70 years).`);
                                $('#birth-input').addClass('border-red-500');
                            }
                        }
                    }
                }
            }

            // --- MARRIAGE DATE validation ---
            if (fieldName === 'marriagedate') {
                const civilStatus = $('#civilstatus').val();
                const marriageValue = value;

                if (civilStatus === 'married') {
                    if (!marriageValue) {
                        errors.push(`Marriage Date is required when Married is selected.`);
                        $('#marriage-input').addClass('border-red-500');
                    } else {
                        const parts = marriageValue.split('-');
                        if (parts.length !== 3) {
                            errors.push(`Marriage Date is invalid.`);
                            $('#marriage-input').addClass('border-red-500');
                        } else {
                            const year = parseInt(parts[0], 10);
                            const month = parseInt(parts[1], 10) - 1;
                            const day = parseInt(parts[2], 10);
                            const marriageDate = new Date(Date.UTC(year, month, day));
                            const today = new Date();
                            today.setUTCHours(0, 0, 0, 0);

                            if (isNaN(marriageDate.getTime())) {
                                errors.push(`Marriage Date is invalid.`);
                                $('#marriage-input').addClass('border-red-500');
                            } else {
                                if (marriageDate > today) {
                                    errors.push(`Marriage date cannot be in the future.`);
                                    $('#marriage-input').addClass('border-red-500');
                                }

                                const dobValue = $('#dob').val();
                                if (dobValue) {
                                    const dobParts = dobValue.split('-');
                                    if (dobParts.length === 3) {
                                        const birthYear = parseInt(dobParts[0], 10);
                                        const birthMonth = parseInt(dobParts[1], 10) - 1;
                                        const birthDay = parseInt(dobParts[2], 10);
                                        const birthDate = new Date(Date.UTC(birthYear, birthMonth, birthDay));

                                        if (marriageDate < birthDate) {
                                            errors.push(`Marriage date cannot be before birth date.`);
                                            $('#marriage-input').addClass('border-red-500');
                                        }

                                        const ageAtMarriage = marriageDate.getUTCFullYear() - birthDate.getUTCFullYear();
                                        const monthDiff = marriageDate.getUTCMonth() - birthDate.getUTCMonth();
                                        const dayDiff = marriageDate.getUTCDate() - birthDate.getUTCDate();
                                        let adjustedAge = ageAtMarriage;
                                        if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) adjustedAge--;
                                        if (adjustedAge < 18) {
                                            errors.push(`Invalid marriage date (person would be under 18 years old at marriage).`);
                                            $('#marriage-input').addClass('border-red-500');
                                        }
                                    }
                                }

                                const minValidDate = new Date(today);
                                minValidDate.setUTCFullYear(today.getUTCFullYear() - 100);
                                if (marriageDate < minValidDate) {
                                    errors.push(`Marriage date is too far in the past.`);
                                    $('#marriage-input').addClass('border-red-500');
                                }
                            }
                        }
                    }
                } else {
                    $('#marriage-input').removeClass('border-red-500');
                }
            }
        });

        // Radio button validation for name_format (when married)
        if ($('#civilstatus').val() === 'married' && $('#marriagesection').is(':visible')) {
            const $nameFormatRadios = $('input[name="name_format"]:visible');
            if ($nameFormatRadios.length > 0 && !$('input[name="name_format"]:checked').length) {
                errors.push(`Please select a preferred name format.`);
                $nameFormatRadios.first().closest('.space-y-3').addClass('border-red-500');
            }
        }

        // ===== UPDATED: Scholarship specify validation (dynamic entries) =====
        if ($('#scholarship').val() === 'yes') {
            const $scholarshipInputs = $('input[name="scholarships[]"]');
            let hasValue = false;
            $scholarshipInputs.each(function() {
                if ($(this).val().trim() !== '') {
                    hasValue = true;
                    return false;
                }
            });
            if (!hasValue) {
                errors.push('Please specify at least one scholarship.');
                $scholarshipInputs.first().addClass('border-red-500');
            } else {
                $scholarshipInputs.removeClass('border-red-500');
            }
        }

        // Funding sources validation (at least one checkbox checked)
        if (step === 7) {
            const $checkedCheckboxes = $step.find('input[name="funding_sources[]"]:checked');
            if ($checkedCheckboxes.length === 0) {
                errors.push(`Please select at least one funding source.`);
                $step.find('.grid').first().addClass('border-red-500 border rounded p-4');
            } else {
                $step.find('.grid').first().removeClass('border-red-500 border rounded p-4');
                $step.find('.space-y-3').removeClass('border-red-500 border rounded p-2');
            }
            
            if ($('#funding-other').is(':checked')) {
                const $otherInput = $('#funding-other-input');
                if (!$otherInput.val() || $otherInput.val().trim() === '') {
                    errors.push(`Please specify the other funding source.`);
                    $otherInput.addClass('border-red-500');
                }
            }

            const $entries = $('.educational-entry');
            let hasEmptyEntry = false;
            $entries.each(function(index) {
                const $school = $(this).find('input[name="schools[]"]');
                const $program = $(this).find('input[name="programs[]"]');
                const $degree = $(this).find('input[name="degrees[]"]');
                const $year = $(this).find('input[name="year_graduateds[]"]');
                
                const schoolVal = $school.val()?.trim() || '';
                const programVal = $program.val()?.trim() || '';
                const degreeVal = $degree.val()?.trim() || '';
                const yearVal = $year.val()?.trim() || '';
                
                if (!schoolVal || !programVal || !degreeVal || !yearVal) {
                    hasEmptyEntry = true;
                    if (!schoolVal) $school.addClass('border-red-500');
                    if (!programVal) $program.addClass('border-red-500');
                    if (!degreeVal) $degree.addClass('border-red-500');
                    if (!yearVal) $year.addClass('border-red-500');
                }
            });
            if (hasEmptyEntry) {
                errors.push('Please complete all fields for each educational background entry.');
            }
            $entries.each(function(index) {
                const $year = $(this).find('input[name="year_graduateds[]"]');
                const yearVal = $year.val()?.trim() || '';
                
                if (yearVal) {
                    if (!/^\d{4}$/.test(yearVal)) {
                        errors.push(`Year Graduated must be a 4-digit year (e.g., 2023).`);
                        $year.addClass('border-red-500');
                    } else {
                        const yearNum = parseInt(yearVal, 10);
                        const currentYear = new Date().getFullYear();
                        if (yearNum < 1970 || yearNum > currentYear) {
                            errors.push(`Year Graduated must be between 1970 and ${currentYear}.`);
                            $year.addClass('border-red-500');
                        }
                    }
                }
            });
        }

        // Step 8 (Other Info) validation
        if (step === 8) {
            const pwdValue = $('#pwd').val();
            if (pwdValue === 'Yes') {
                const $checkedDisabilities = $('input[name="disability_types[]"]:checked');
                if ($checkedDisabilities.length === 0) {
                    errors.push(`Please select at least one type of disability.`);
                    $('#pwd-types').addClass('border-red-500 border rounded p-2');
                } else {
                    $('#pwd-types').removeClass('border-red-500 border rounded p-2');
                }
            }

            const $checkedSupport = $('input[name="support_needs[]"]:checked');
            if ($checkedSupport.length === 0) {
                errors.push(`Please select at least one support need.`);
                $('.support-needs-container').addClass('border-red-500 border rounded p-2');
            } else {
                $('.support-needs-container').removeClass('border-red-500 border rounded p-2');
                
                if ($('#support-other').is(':checked')) {
                    const otherValue = $('#support-specify').val().trim();
                    if (!otherValue) {
                        errors.push(`Please specify your other support needs.`);
                        $('#support-specify').addClass('border-red-500');
                    } else {
                        $('#support-specify').removeClass('border-red-500');
                    }
                }
            }

            if ($('#ipra').val() === 'yes' && $('#indigenous_group').val() === 'other') {
                const ipraSpecifyValue = $('#ipra_specify').val().trim();
                if (!ipraSpecifyValue) {
                    errors.push(`Please specify your indigenous group.`);
                    $('#ipra_specify').addClass('border-red-500');
                } else {
                    $('#ipra_specify').removeClass('border-red-500');
                }
            }
        }

        // Step 9 (Documents) validation
        if (step === 9) {
            const profileFile = $('#imageInput')[0].files[0];
            if (!profileFile) {
                errors.push('2x2 image is required.');
                $('#imageInput').addClass('border-red-500');
            } else {
                // Check file size before upload (max 1 MB after compression)
                if (profileFile.size > 1024 * 1024) {
                    errors.push('2x2 image must be smaller than 1 MB. Please compress your image.');
                    $('#imageInput').addClass('border-red-500');
                } else if (typeof window.imageUploadValid === 'function' && !window.imageUploadValid()) {
                    errors.push('2x2 image must be square (1:1 aspect ratio) and at least 600x600 pixels.');
                    $('#imageInput').addClass('border-red-500');
                } else {
                    $('#imageInput').removeClass('border-red-500');
                }
            }

            // Helper to validate file size (max 2 MB for documents)
            function validateFileSize(inputName, maxSizeMB = 2) {
                const input = $(`input[name="${inputName}"]`)[0];
                if (input && input.files.length) {
                    const file = input.files[0];
                    if (file.size > maxSizeMB * 1024 * 1024) {
                        errors.push(`${inputName.replace(/_/g, ' ')} exceeds ${maxSizeMB} MB.`);
                        $(`input[name="${inputName}"]`).addClass('border-red-500');
                        return false;
                    }
                }
                return true;
            }

            const docFields = [
                { name: 'medical_certificate', label: 'Medical Certificate', maxSize: 2 },
                { name: 'notice_of_admission', label: 'Notice of Admission', maxSize: 2 },
                { name: 'tor_remarks', label: 'TOR with Remarks', maxSize: 2 },
                { name: 'birth_certificate', label: 'Birth Certificate (PSA/LCR)', maxSize: 2 }
            ];

            docFields.forEach(field => {
                const fileInput = $(`input[name="${field.name}"]`)[0];
                if (!fileInput || !fileInput.files.length) {
                    errors.push(`${field.label} is required.`);
                    $(`input[name="${field.name}"]`).addClass('border-red-500');
                } else {
                    const file = fileInput.files[0];
                    if (file.size > field.maxSize * 1024 * 1024) {
                        errors.push(`${field.label} must be smaller than ${field.maxSize} MB.`);
                        $(`input[name="${field.name}"]`).addClass('border-red-500');
                    } else {
                        $(`input[name="${field.name}"]`).removeClass('border-red-500');
                    }
                }
            });

            // Conditional documents (marriage certificate, PWD card, court order) – add size checks
            const civilStatus = $('#civilstatus').val();
            if (civilStatus === 'married') {
                const marriageInput = $('input[name="marriage_certificate"]')[0];
                if (!marriageInput || !marriageInput.files.length) {
                    errors.push('Marriage certificate is required because Civil Status is Married.');
                    $('input[name="marriage_certificate"]').addClass('border-red-500');
                } else if (marriageInput.files[0].size > 2 * 1024 * 1024) {
                    errors.push('Marriage certificate must be smaller than 2 MB.');
                    $('input[name="marriage_certificate"]').addClass('border-red-500');
                } else {
                    $('input[name="marriage_certificate"]').removeClass('border-red-500');
                }
            }

            const pwdValue = $('#pwd').val();
            if (pwdValue === 'Yes') {
                const pwdCardInput = $('input[name="pwd_card_container"]')[0];
                if (!pwdCardInput || !pwdCardInput.files.length) {
                    errors.push('PWD Card is required because you identified as a Person With Disability.');
                    $('input[name="pwd_card_container"]').addClass('border-red-500');
                } else if (pwdCardInput.files[0].size > 2 * 1024 * 1024) {
                    errors.push('PWD Card must be smaller than 2 MB.');
                    $('input[name="pwd_card_container"]').addClass('border-red-500');
                } else {
                    $('input[name="pwd_card_container"]').removeClass('border-red-500');
                }
            }

            if (!$('#marriage_container').hasClass('hidden')) {
                const courtOrderInput = $('input[name="marriage_container"]')[0];
                if (courtOrderInput && courtOrderInput.files.length && courtOrderInput.files[0].size > 2 * 1024 * 1024) {
                    errors.push('Court order file must be smaller than 2 MB.');
                    $('input[name="marriage_container"]').addClass('border-red-500');
                } else {
                    $('input[name="marriage_container"]').removeClass('border-red-500');
                }
            }
        }

        // Step 10 checkboxes
        if (step === 10) {
            const confirmationChecked = $('#confirmation').is(':checked');
            const dataPrivacyChecked = $('#data-privacy').is(':checked');
            
            if (!confirmationChecked) {
                errors.push('You must confirm that the information is true and correct.');
                $('#confirmation').closest('.mb-6').addClass('border-red-500 border rounded p-2');
            }
            if (!dataPrivacyChecked) {
                errors.push('You must agree to the Data Privacy terms.');
                $('#data-privacy').closest('.mb-6').addClass('border-red-500 border rounded p-2');
            }
        }

        // Step 5 specific validation: mother's last name and mobile number conflicts
        if (step === 5) {
            const mothersLastname = $('#mother_lastname').val()?.trim() || '';
            const fathersLastname = $('#fathers_lastname').val()?.trim() || '';
            if (mothersLastname && fathersLastname && mothersLastname.toLowerCase() === fathersLastname.toLowerCase()) {
            if (!motherNameConfirmed) {
                errors.push("Mother's maiden name should be different from father's last name. Are you sure?");
                $('#mother_lastname').addClass('border-red-500');
                
                // NEW: Require mother's middle name when conflict exists and not confirmed
                const motherMiddlename = $('#mother_middlename').val()?.trim() || '';
                if (!motherMiddlename) {
                    errors.push("Mother's middle name is required.");
                    $('#mother_middlename').addClass('border-red-500');
                } else {
                    $('#mother_middlename').removeClass('border-red-500');
                }
            }
        } else {
            motherNameConfirmed = false;
        }

            const mobileNumber = $('#mobilenumber').val()?.trim() || '';
            const emergencyMobile = $('#emergency_mobilenumber').val()?.trim() || '';
            const cleanMobile = mobileNumber.replace(/[\s\-\(\)]/g, '');
            const cleanEmergency = emergencyMobile.replace(/[\s\-\(\)]/g, '');
            if (cleanMobile && cleanEmergency && cleanMobile === cleanEmergency) {
                if (!mobileMatchConfirmed) {
                    errors.push("Mobile number and emergency contact mobile number must be different.");
                    $('#mobilenumber, #emergency_mobilenumber').addClass('border-red-500');
                }
            } else {
                mobileMatchConfirmed = false;
            }
        }

        return errors;
    }

    // ---------- Event Handlers ----------
    $(document).on('input change', '.step input, .step select, .step textarea', function() {
        $(this).removeClass('border-red-500');
        $(this).closest('.border-red-500').removeClass('border-red-500');
    });

    $(document).on('change', '.funding-checkbox', function() {
        const $step = $(this).closest('.step[data-step="6"]');
        const $checkedCheckboxes = $step.find('input[name="funding_sources[]"]:checked');
        
        if ($checkedCheckboxes.length > 0) {
            $step.find('.grid').first().removeClass('border-red-500 border rounded p-4');
            $step.find('.space-y-3').removeClass('border-red-500 border rounded p-2');
        }
    });

    $(document).on('change', '#citizenship', function() {
    toggleMobileSublabels();
    if (currentStep === 5) { validateStep(currentStep); }
    $(document).trigger('citizenshipChanged');
    
    // NEW: Remove red borders from all address fields (both PH and foreign)
    const addressFields = [
        'room_flr_unit_bldg', 'house_lot_blk', 'street', 'subdivision_line2',
        'region', 'province', 'city', 'barangay', 'PSGC',
        'citizenship_country', 'outside_ph_addressline1', 'outside_ph_addressline2',
        'city_foreign', 'state/province_foreign', 'zipcode_foreign', 'foreign_country'
    ];
    addressFields.forEach(id => {
        $(`#${id}`).removeClass('border-red-500');
    });
    // Also clear any container-level red borders
    $('.border-red-500').removeClass('border-red-500');
});

    $(document).on('change', '#typeofincome', function() {
        if (currentStep === 6) {
            validateStep(currentStep);
        }
    });

    $(document).on('change', '#agreement', function() {
        if (currentStep === 1) {
            const isChecked = $(this).is(':checked');
            $('#nextBtn').prop('disabled', !isChecked);
            if (!isChecked) {
                $('#nextBtn').addClass('opacity-50 cursor-not-allowed');
            } else {
                $('#nextBtn').removeClass('opacity-50 cursor-not-allowed');
            }
        }
    });

    $(document).on('change', '#confirmation, #data-privacy', function() {
        if (currentStep === 10) {
            const bothChecked = $('#confirmation').is(':checked') && $('#data-privacy').is(':checked');
            $('#submitBtn').prop('disabled', !bothChecked);
            if (!bothChecked) {
                $('#submitBtn').addClass('opacity-50 cursor-not-allowed');
            } else {
                $('#submitBtn').removeClass('opacity-50 cursor-not-allowed');
            }
        }
    });

    // ---------- Next Button Handler (with AJAX saving) ----------
    $('#nextBtn').click(function() {
        if (motherConfirmPending || mobileMatchPending) return;

        const currentIndex = visibleSteps.indexOf(currentStep);
        const errors = validateStep(currentStep);

        const motherNameError = "Mother's maiden name should be different from father's last name. Are you sure?";
        const mobileMatchError = "Mobile number and emergency contact mobile number must be different.";

        let modalErrors = [];
        let otherErrors = [];

        errors.forEach(err => {
            if (err === motherNameError) {
                modalErrors.push('mother');
            } else if (err === mobileMatchError) {
                modalErrors.push('mobile');
            } else {
                otherErrors.push(err);
            }
        });

        if (otherErrors.length > 0) {
            otherErrors.forEach(error => showToast(error, 'error'));
            return;
        }

        if (modalErrors.length > 0) {
            pendingModalQueue = modalErrors;
            if (currentIndex < totalSteps - 1) {
                pendingTargetStep = visibleSteps[currentIndex + 1];
            } else {
                pendingTargetStep = null;
            }
            showNextModal();
            return;
        }

        if (errors.length === 0) {
            // Save current step via AJAX
            const formData = new FormData();
            formData.append('step', currentStep);
            if (sessionId) formData.append('session_id', sessionId);

            const $step = $(`.step[data-step="${currentStep}"]`);

            // Gather all form fields (excluding file inputs for now)
            $step.find('input:not([type="file"]), select, textarea').each(function() {
                const $field = $(this);
                const name = $field.attr('name');
                if (!name) return;
                if ($field.attr('type') === 'checkbox') {
                    if ($field.is(':checked')) {
                        formData.append(name, $field.val());
                    }
                } else if ($field.attr('type') === 'radio') {
                    if ($field.is(':checked')) {
                        formData.append(name, $field.val());
                    }
                } else {
                    formData.append(name, $field.val());
                }
            });

            // Handle file inputs
            $step.find('input[type="file"]').each(function() {
                const $fileInput = $(this);
                const name = $fileInput.attr('name');
                const files = $fileInput[0].files;
                for (let i = 0; i < files.length; i++) {
                    formData.append(name, files[i]);
                }
            });

            $.ajax({
                url: '/save-step',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.session_id && !sessionId) {
                        sessionId = response.session_id;
                        localStorage.setItem('form_session_id', sessionId);
                    }
                    // Move to next step
                    if (currentIndex < totalSteps - 1) {
                        currentStep = visibleSteps[currentIndex + 1];
                        showStep(currentStep);
                    }
                },
                error: function(xhr) {
                    showToast('Error saving step. Please try again.', 'error');
                    console.error(xhr.responseText);
                }
            });
        }
    });

    $('#prevBtn').click(function() {
        if (motherConfirmPending) {
            $('#motherLastnameModal').hide().addClass('hidden');
            motherConfirmPending = false;
            pendingTargetStep = null;
        }
        if (mobileMatchPending) {
            $('#mobileMatchModal').hide().addClass('hidden');
            mobileMatchPending = false;
            pendingMobileStep = null;
        }
        // FIX: Do NOT reset confirmation flags here

        const currentIndex = visibleSteps.indexOf(currentStep);
        if (currentIndex > 0) {
            currentStep = visibleSteps[currentIndex - 1];
            showStep(currentStep);
        }
    });

    $('.step-label').click(function () {
        if (motherConfirmPending) {
            $('#motherLastnameModal').hide().addClass('hidden');
            motherConfirmPending = false;
            pendingTargetStep = null;
        }
        if (mobileMatchPending) {
            $('#mobileMatchModal').hide().addClass('hidden');
            mobileMatchPending = false;
            pendingMobileStep = null;
        }

        const targetStep = parseInt($(this).data('step'));
        if (!visibleSteps.includes(targetStep)) return;

        const targetIndex = visibleSteps.indexOf(targetStep);
        const currentIndex = visibleSteps.indexOf(currentStep);

        if (targetIndex > currentIndex) {
            const errors = validateStep(currentStep);
            if (errors.length > 0) {
                errors.forEach(error => showToast(error, 'error'));
                return;
            }
        }
        // FIX: Do NOT reset confirmation flags when clicking on step labels
        currentStep = targetStep;
        showStep(currentStep);
    });

    $('#category').on('change', function() {
        updateVisibleSteps();
    });

    $('#validateBtn').click(function(e) {
        e.preventDefault();
        const studentNumber = $('#student_number').val().trim();
        const studentNumberRegex = /^20\d{2}\d{4,5}$/;

        if (!studentNumber) {
            showToast('Please enter a UP Student Number.', 'error');
        } else if (!studentNumberRegex.test(studentNumber)) {
            showToast('UP Student Number must be in the format 20xx-xxxx or 20xx-xxxxx.', 'error');
        } else {
            $('#UP_email_container').removeClass('hidden');
            $('#validateBtn').prop('disabled', true).text('Validated');
            showToast('Student number validated. Please enter your UP email.', 'success');
        }
    });

    $('#student_number').on('input', function() {
        if (!$('#UP_email_container').hasClass('hidden')) {
            $('#UP_email_container').addClass('hidden');
            $('#validateBtn').prop('disabled', false).text('Validate');
            $('#UP_email').val('');
        }
    });

    $(document).on('change', '#civilstatus', function() {
        if (currentStep === 8) {
            toggleMarriageCertificate();
        }
        toggleCourtOrderContainer();
    });

    $(document).on('change', '#pwd', function() {
        if (currentStep === 9) {
            togglePWDContainer();
        }
    });

    $('#sexatbirth').on('change', toggleCourtOrderContainer);
    $(document).on('change', 'input[name="name_format"]', toggleCourtOrderContainer);

    // Modal button handlers for mother's last name conflict
    $('#modalYes').click(function() {
        $('#motherLastnameModal').hide().addClass('hidden');
        motherNameConfirmed = true;
        motherConfirmPending = false;
        $('#mother_lastname').removeClass('border-red-500');

        if (pendingModalQueue.length > 0) {
            showNextModal();
        } else {
            if (pendingTargetStep) {
                currentStep = pendingTargetStep;
                showStep(currentStep);
                pendingTargetStep = null;
            }
        }
    });

    $('#modalNo').click(function() {
        $('#motherLastnameModal').hide().addClass('hidden');
        motherConfirmPending = false;
        pendingTargetStep = null;
        pendingModalQueue = [];
    });

    $('#mobileMatchModalYes').click(function() {
        $('#mobileMatchModal').hide().addClass('hidden');
        mobileMatchConfirmed = true;
        mobileMatchPending = false;
        $('#mobilenumber, #emergency_mobilenumber').removeClass('border-red-500');

        if (pendingModalQueue.length > 0) {
            showNextModal();
        } else {
            if (pendingMobileStep) {
                currentStep = pendingMobileStep;
                showStep(currentStep);
                pendingMobileStep = null;
            }
        }
    });

    $('#mobileMatchModalNo').click(function() {
        $('#mobileMatchModal').hide().addClass('hidden');
        mobileMatchPending = false;
        pendingMobileStep = null;
        pendingModalQueue = [];
    });

    $(document).on('click', '#motherLastnameModal', function(e) {
        if ($(e.target).is('#motherLastnameModal')) {
            $('#modalNo').click();
        }
    });
    $(document).on('click', '#mobileMatchModal', function(e) {
        if ($(e.target).is('#mobileMatchModal')) {
            $('#mobileMatchModalNo').click();
        }
    });

    $(document).on('input change', '#mother_lastname, #fathers_lastname', function() {
        motherNameConfirmed = false;
    });
    $(document).on('input change', '#mobilenumber, #emergency_mobilenumber', function() {
        mobileMatchConfirmed = false;
    });

    // ===== NEW: Helper functions for copying Permanent Address to Current Address =====
    const BASE_URL = "https://psgc.cloud/api/v2";

    // ---------- FIXED ENCODING: Convert mojibake (e.g., "NiÃ±o" → "Niño") ----------
    function fixEncoding(str) {
        if (!str || typeof str !== 'string') return str;
        // Attempt to decode percent-encoded UTF-8 (some APIs double-encode)
        try {
            // First, try to decodeURIComponent if it looks like it has % sequences
            if (str.includes('%')) {
                const decoded = decodeURIComponent(str);
                // If the result still contains mojibake patterns, try the fallback
                if (/Ã±|Â©|â€¦/.test(decoded)) {
                    return decodeURIComponent(escape(decoded));
                }
                return decoded;
            }
            // If we see mojibake patterns like Ã±, use the classic hack
            if (/Ã±|Â©|â€¦/.test(str)) {
                return decodeURIComponent(escape(str));
            }
        } catch(e) { /* ignore */ }
        return str;
    }

    function resetDropdown(select, placeholder = "Please Select") {
        if (!select) return;

        // Clear existing options
        select.innerHTML = "";

        const option = document.createElement("option");
        option.value = "";
        option.disabled = true;
        option.selected = true;
        option.textContent = placeholder;  // safe – escapes HTML entities

        select.appendChild(option);
    }

    function buildValidatedUrl(baseUrl, endpoint, pathParam1, pathParam2) {
        try {
            // Minimal path validation
            if (baseUrl.includes('/../') || /\/%2e%2e\//i.test(baseUrl)) {
                throw new Error('Invalid path');
            }
            
            const url = new URL(baseUrl);
            
            // Protocol + host checks
            const allowedDomains = ['psgc.cloud'];
            if (!allowedDomains.includes(url.hostname)) {
                throw new Error('Invalid host');
            }
            if (!['https:'].includes(url.protocol)) {
                throw new Error('Invalid protocol');
            }
            
            // Validate path parameters
            if (pathParam1 && !/^[A-Za-z0-9_-]+$/.test(pathParam1)) {
                throw new Error('Invalid parameter');
            }
            if (pathParam2 && !/^[A-Za-z0-9_-]+$/.test(pathParam2)) {
                throw new Error('Invalid parameter');
            }
            
            // Build pathname from fixed literals + validated segments (v2 API)
            if (pathParam2) {
                url.pathname = `/api/v2/${endpoint}/${pathParam1}/${pathParam2}`;
            } else if (pathParam1) {
                url.pathname = `/api/v2/${endpoint}/${pathParam1}`;
            } else {
                url.pathname = `/api/v2/${endpoint}`;
            }
            
            return url.href;
        } catch {
            throw new Error('Invalid URL');
        }
    }

    async function fetchData(url) {
        const response = await fetch(url);
        if (!response.ok) throw new Error("Failed to fetch");
        const json = await response.json();

        // PSGC v2 API wraps results in { data: [...] }
        const data = Array.isArray(json) ? json : (json.data ?? json);

        // Apply encoding fix to every item's 'name' field
        if (Array.isArray(data)) {
            data.forEach(item => {
                if (item.name) item.name = fixEncoding(item.name);
            });
        } else if (data.name) {
            data.name = fixEncoding(data.name);
        }
        return data;
    }

    function populateDropdown(select, data) {
        if (!select) return;
        data.forEach(item => {
            const option = document.createElement("option");
            option.value = item.code;
            option.textContent = item.name; // name already fixed by fetchData
            select.appendChild(option);
        });
    }

    // ===== NEW: Missing helper functions for copying address =====
    async function setCurrentProvince(regionCode, provinceCode) {
        const $provinceSelect = $('#current_province');
        if (!$provinceSelect.length) return;
        // Fetch provinces for the given region
        const provinces = await fetchData(buildValidatedUrl(BASE_URL, 'regions', regionCode, 'provinces'));
        resetDropdown($provinceSelect[0]);
        populateDropdown($provinceSelect[0], provinces);
        if (provinceCode) {
            $provinceSelect.val(provinceCode);
        }
    }

    async function setCurrentCity(provinceCode, cityCode) {
        const $citySelect = $('#current_city');
        if (!$citySelect.length) return;
        const cities = await fetchData(buildValidatedUrl(BASE_URL, 'provinces', provinceCode, 'cities-municipalities'));
        resetDropdown($citySelect[0]);
        populateDropdown($citySelect[0], cities);
        if (cityCode) {
            $citySelect.val(cityCode);
        }
    }

    async function setCurrentBarangay(cityCode, barangayCode) {
        const $barangaySelect = $('#current_barangay');
        if (!$barangaySelect.length) return;
        const barangays = await fetchData(buildValidatedUrl(BASE_URL, 'cities-municipalities', cityCode, 'barangays'));
        resetDropdown($barangaySelect[0]);
        populateDropdown($barangaySelect[0], barangays);
        if (barangayCode) {
            $barangaySelect.val(barangayCode);
            $('#current_PSGC').val(barangayCode);
        }
    }

    // ===== CORRECTED copyPermanentToCurrent function =====
    async function copyPermanentToCurrent() {
        const citizenship = $('#citizenship').val();
        const sameAddress = $('#same_address').val();
        if (citizenship !== 'yes' || sameAddress !== 'yes') return;

        // Copy text fields
        const mapping = {
            room_flr_unit_bldg: 'current_room_flr_unit_bldg',
            house_lot_blk: 'current_house_lot_blk',
            street: 'current_street',
            subdivision_line2: 'current_subdivision_line2'
        };
        for (const [src, dest] of Object.entries(mapping)) {
            const val = $(`#${src}`).val();
            $(`#${dest}`).val(val);
        }

        const regionCode = $('#region').val();
        const provinceCode = $('#province').val();
        const cityCode = $('#city').val();
        const barangayCode = $('#barangay').val();

        // Helper to reset dropdowns below a certain level
        function resetCurrentSelects(level = 'all') {
            if (level === 'all' || level === 'province') resetDropdown($('#current_province')[0]);
            if (level === 'all' || level === 'city') resetDropdown($('#current_city')[0]);
            if (level === 'all' || level === 'barangay') resetDropdown($('#current_barangay')[0]);
            $('#current_PSGC').val('');
        }

        // Set current region
        if (regionCode) {
            $('#current_region').val(regionCode);
            resetCurrentSelects('province');

            const isNCR = (regionCode === '1300000000');

            if (isNCR) {
                // NCR has no provinces – fetch cities directly from region
                $('#current_province').prop('disabled', true);
                $('#current_province').html('<option value="">N/A (NCR)</option>');
                const citiesUrl = buildValidatedUrl(BASE_URL, 'regions', regionCode, 'cities-municipalities');
                const cities = await fetchData(citiesUrl);
                const $citySelect = $('#current_city');
                resetDropdown($citySelect[0]);
                populateDropdown($citySelect[0], cities);
                if (cityCode) {
                    $citySelect.val(cityCode);
                    // Fetch barangays for the selected city
                    const barangaysUrl = buildValidatedUrl(BASE_URL, 'cities-municipalities', cityCode, 'barangays');
                    const barangays = await fetchData(barangaysUrl);
                    const $barangaySelect = $('#current_barangay');
                    resetDropdown($barangaySelect[0]);
                    populateDropdown($barangaySelect[0], barangays);
                    if (barangayCode) {
                        $barangaySelect.val(barangayCode);
                        $('#current_PSGC').val(barangayCode);
                    }
                }
            } else {
                // Normal case (with province)
                $('#current_province').prop('disabled', false);
                if (provinceCode) {
                    await setCurrentProvince(regionCode, provinceCode);
                    resetCurrentSelects('city');
                    if (cityCode) {
                        await setCurrentCity(provinceCode, cityCode);
                        resetCurrentSelects('barangay');
                        if (barangayCode) {
                            await setCurrentBarangay(cityCode, barangayCode);
                        }
                    }
                }
            }
        } else {
            resetCurrentSelects('all');
        }
    }

    function toggleCurrentAddress() {
        const currentAddressSection = document.getElementById('current_address_section');
        if (!currentAddressSection) return;

        const isCitizen = $('#citizenship').val() === 'yes';
        const isSame = $('#same_address').val() === 'yes';

        if (isCitizen) {
            currentAddressSection.style.display = '';
            if (isSame) {
                currentAddressSection.querySelectorAll('input, select').forEach(field => {
                    field.disabled = true;
                });
                copyPermanentToCurrent();
            } else {
                currentAddressSection.querySelectorAll('input, select').forEach(field => {
                    field.disabled = false;
                });
            }
        } else {
            currentAddressSection.style.display = '';
            currentAddressSection.querySelectorAll('input, select').forEach(field => {
                field.disabled = false;
            });
        }
    }

    function syncPermanentToCurrentOnChange() {
        if ($('#citizenship').val() === 'yes' && $('#same_address').val() === 'yes') {
            copyPermanentToCurrent();
        }
    }

    $('#room_flr_unit_bldg, #house_lot_blk, #street, #subdivision_line2').on('input', syncPermanentToCurrentOnChange);
    $('#region, #province, #city, #barangay').on('change', syncPermanentToCurrentOnChange);

    async function populateCountries(selectId) {
        const select = document.getElementById(selectId);
        if (!select) return;
        try {
            const response = await fetch('/api/countries');
            if (!response.ok) throw new Error('Network response was not ok');
            const countries = await response.json();
            countries.forEach(country => {
                const option = document.createElement('option');
                option.value = country.code;
                option.textContent = country.name;
                select.appendChild(option);
            });
        } catch (error) {
            console.error('Error fetching countries:', error);
        }
    }
    populateCountries('citizenship_country');
    populateCountries('foreign_country');

    const regionSelect = document.getElementById('region');
    const provinceSelect = document.getElementById('province');
    const citySelect = document.getElementById('city');
    const barangaySelect = document.getElementById('barangay');
    const psgcInput = document.getElementById('PSGC');

    async function loadRegions() {
        if (!regionSelect) return;
        resetDropdown(regionSelect, "Loading regions...");
        const regions = await fetchData(buildValidatedUrl(BASE_URL, 'regions'));
        resetDropdown(regionSelect);
        populateDropdown(regionSelect, regions);
    }

    regionSelect?.addEventListener("change", async function () {
    resetDropdown(provinceSelect);
    resetDropdown(citySelect);
    resetDropdown(barangaySelect);
    psgcInput.value = "";

    const isNCR = this.value === '1300000000';

    if (isNCR) {
        // NCR has no provinces — fetch cities directly from the region
        provinceSelect.disabled = true;
        provinceSelect.innerHTML = '<option value="">N/A (NCR)</option>';
        const cities = await fetchData(buildValidatedUrl(BASE_URL, 'regions', this.value, 'cities-municipalities'));
        populateDropdown(citySelect, cities);
    } else {
        provinceSelect.disabled = false;
        resetDropdown(provinceSelect);
        const provinces = await fetchData(buildValidatedUrl(BASE_URL, 'regions', this.value, 'provinces'));
        populateDropdown(provinceSelect, provinces);
    }
});

    provinceSelect?.addEventListener("change", async function () {
        resetDropdown(citySelect);
        resetDropdown(barangaySelect);
        psgcInput.value = "";
        const cities = await fetchData(buildValidatedUrl(BASE_URL, 'provinces', this.value, 'cities-municipalities'));
        populateDropdown(citySelect, cities);
    });

    citySelect?.addEventListener("change", async function () {
        resetDropdown(barangaySelect);
        psgcInput.value = "";
        const barangays = await fetchData(buildValidatedUrl(BASE_URL, 'cities-municipalities', this.value, 'barangays'));
        populateDropdown(barangaySelect, barangays);
    });

    barangaySelect?.addEventListener("change", function () {
        psgcInput.value = this.value;
    });

    loadRegions();

    const currentRegionSelect = document.getElementById('current_region');
    const currentProvinceSelect = document.getElementById('current_province');
    const currentCitySelect = document.getElementById('current_city');
    const currentBarangaySelect = document.getElementById('current_barangay');
    const currentPsgcInput = document.getElementById('current_PSGC');

    async function loadCurrentRegions() {
        if (!currentRegionSelect) return;
        resetDropdown(currentRegionSelect, "Loading regions...");
        const regions = await fetchData(buildValidatedUrl(BASE_URL, 'regions'));
        resetDropdown(currentRegionSelect);
        populateDropdown(currentRegionSelect, regions);
    }

    currentRegionSelect?.addEventListener("change", async function () {
    resetDropdown(currentProvinceSelect);
    resetDropdown(currentCitySelect);
    resetDropdown(currentBarangaySelect);
    currentPsgcInput.value = "";

    const isNCR = this.value === '1300000000';

    if (isNCR) {
        currentProvinceSelect.disabled = true;
        currentProvinceSelect.innerHTML = '<option value="">N/A (NCR)</option>';
        const cities = await fetchData(buildValidatedUrl(BASE_URL, 'regions', this.value, 'cities-municipalities'));
        populateDropdown(currentCitySelect, cities);
    } else {
        currentProvinceSelect.disabled = false;
        resetDropdown(currentProvinceSelect);
        const provinces = await fetchData(buildValidatedUrl(BASE_URL, 'regions', this.value, 'provinces'));
        populateDropdown(currentProvinceSelect, provinces);
    }
});

    currentProvinceSelect?.addEventListener("change", async function () {
        resetDropdown(currentCitySelect);
        resetDropdown(currentBarangaySelect);
        currentPsgcInput.value = "";
        const cities = await fetchData(buildValidatedUrl(BASE_URL, 'provinces', this.value, 'cities-municipalities'));
        populateDropdown(currentCitySelect, cities);
    });

    currentCitySelect?.addEventListener("change", async function () {
        resetDropdown(currentBarangaySelect);
        currentPsgcInput.value = "";
        const barangays = await fetchData(buildValidatedUrl(BASE_URL, 'cities-municipalities', this.value, 'barangays'));
        populateDropdown(currentBarangaySelect, barangays);
    });

    currentBarangaySelect?.addEventListener("change", function () {
        currentPsgcInput.value = this.value;
    });

    loadCurrentRegions();

    const citizenshipSelect = document.getElementById('citizenship');
    const sameAddressSelect = document.getElementById('same_address');
    const currentAddressSection = document.getElementById('current_address_section');

    const foreignFieldIds = [
        'citizenship_country',
        'outside_ph_addressline1',
        'outside_ph_addressline2',
        'city_foreign',
        'state/province_foreign',
        'zipcode_foreign',
        'foreign_country'
    ];

    const permanentPHFieldIds = [
        'room_flr_unit_bldg',
        'house_lot_blk',
        'street',
        'subdivision_line2',
        'region',
        'province',
        'city',
        'barangay',
        'PSGC'
    ];

    function toggleForeignFields() {
        const showForeign = citizenshipSelect?.value === 'no';

        foreignFieldIds.forEach(id => {
            const element = document.getElementById(id);
            if (!element) return;
            const container = element.closest('.relative.w-full');
            if (container) {
                container.style.display = showForeign ? '' : 'none';
                element.disabled = !showForeign;
            }
        });

        const heading = document.getElementById('outside_ph_heading');
        if (heading) heading.style.display = showForeign ? '' : 'none';

        const permanentPHHeading = document.getElementById('permanent_ph_heading');
        if (permanentPHHeading) {
            permanentPHHeading.style.display = showForeign ? 'none' : '';
        }

        permanentPHFieldIds.forEach(id => {
            const element = document.getElementById(id);
            if (!element) return;
            const container = element.closest('.relative.w-full');
            if (container) {
                container.style.display = showForeign ? 'none' : '';
                element.disabled = showForeign;
            }
        });

        const sameAddressContainer = sameAddressSelect?.closest('.relative.w-full');

        if (citizenshipSelect?.value === 'yes') {
            if (sameAddressContainer) {
                sameAddressContainer.style.display = '';
                sameAddressSelect.disabled = false;
            }
            toggleCurrentAddress();
        } else {
            if (sameAddressContainer) {
                sameAddressContainer.style.display = 'none';
                sameAddressSelect.disabled = true;
            }
            if (currentAddressSection) {
                currentAddressSection.style.display = '';
                currentAddressSection.querySelectorAll('input, select').forEach(field => {
                    field.disabled = false;
                });
            }
        }
    }

    citizenshipSelect?.addEventListener('change', function() {
        toggleForeignFields();
        if (this.value === 'yes' && sameAddressSelect?.value === 'yes') {
            copyPermanentToCurrent();
        }
    });
    sameAddressSelect?.addEventListener('change', function() {
        toggleCurrentAddress();
        if (this.value === 'yes') {
            copyPermanentToCurrent();
        }
    });

    toggleForeignFields();
    toggleCurrentAddress();

    const permanentTextFields = ['room_flr_unit_bldg', 'house_lot_blk', 'street', 'subdivision_line2'];
    permanentTextFields.forEach(id => {
        $(`#${id}`).on('input', syncPermanentToCurrentOnChange);
    });
    $('#region, #province, #city, #barangay').on('change', syncPermanentToCurrentOnChange);

    if (citizenshipSelect?.value === 'yes' && sameAddressSelect?.value === 'yes') {
        copyPermanentToCurrent();
    }

    // ---------- Final Submit Handler (AJAX) ----------
    $('#submitBtn').click(function(e) {
        e.preventDefault();

        // Validate all steps
        let allValid = true;
        let firstInvalidStep = null;
        for (let i = 0; i < visibleSteps.length; i++) {
            const step = visibleSteps[i];
            const errors = validateStep(step);
            if (errors.length > 0) {
                allValid = false;
                firstInvalidStep = step;
                showToast(errors[0], 'error');
                break;
            }
        }

        if (!allValid) {
            currentStep = firstInvalidStep;
            showStep(currentStep);
            return;
        }

        // All steps valid – submit final
        $.ajax({
            url: '/final-submit',
            type: 'POST',
            data: {
                session_id: sessionId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    // Show toast on final step – changed to "Step Saved"
                    showToast('Form Saved', 'success');
                    localStorage.removeItem('form_session_id');
                    setTimeout(() => {
                        window.location.href = '/thankyoupage';
                    }, 1000);
                } else {
                    showToast('Submission failed: ' + response.message, 'error');
                }
            },
            error: function(xhr) {
                showToast('Error submitting form. Please check your connection.', 'error');
            }
        });
    });

    // Initial calls
    showStep(currentStep);
    updateVisibleSteps();
    toggleCourtOrderContainer();
    toggleFirstPersonFields();
    toggleMobileSublabels();
});