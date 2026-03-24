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

    // ---------- Close Toast Button Handler ----------
    $(document).on('click', '.close-toast-btn', function() {
        closeToast($(this).data('toast-id'));
    });

    // ---------- Toggle sublabels for mobile number fields based on citizenship ----------
    function toggleMobileSublabels() {
        const citizenship = $('#citizenship').val();
        const isNonCitizen = (citizenship === 'no');

        // List of mobile number fields that have sublabels
        const mobileFieldIds = ['mobilenumber', 'emergency_mobilenumber', 'guardian_phonenumber'];

        mobileFieldIds.forEach(id => {
            const $field = $('#' + id);
            if ($field.length) {
                // The sublabel is the immediate sibling <p> with the example text
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

    // ---------- Toggle Guardian Section based on Category ----------
    function toggleGuardianSection() {
        const category = $('#category').val();
        if (category === 'undergraduate') {
            $('#guardian-section').removeClass('hidden');
        } else {
            $('#guardian-section').addClass('hidden');
            $('#guardian-section input, #guardian-section select').val('');
        }
    }

    // ---------- Toggle first-person fields based on Category ----------
    function toggleFirstPersonFields() {
        const category = $('#category').val();
        const shouldHide = category === 'graduate';

        // Find the parent containers of the two fields
        const $collegeContainer = $('#firstperson_to_attend_college').closest('.relative.w-full');
        const $upContainer = $('#firstpersonup').closest('.relative.w-full');

        if (shouldHide) {
            $collegeContainer.addClass('hidden');
            $upContainer.addClass('hidden');
            // Clear the values when hidden
            $('#firstperson_to_attend_college').val('');
            $('#firstpersonup').val('');
        } else {
            $collegeContainer.removeClass('hidden');
            $upContainer.removeClass('hidden');
        }
    }

    // ---------- Step Visibility Based on Category ----------
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

    // ---------- Toggle Court Order upload (marriage_container) ----------
    function toggleCourtOrderContainer() {
        const sex = $('#sexatbirth').val();
        const civil = $('#civilstatus').val();
        const nameFormat = $('input[name="name_format"]:checked').val();
        const showCourtOrder = (sex === 'female' && civil === 'married' && (nameFormat === 'hyphenated' || nameFormat === 'husband'));

        if (showCourtOrder) {
            $('#marriage_container').removeClass('hidden');
        } else {
            $('#marriage_container').addClass('hidden');
            // Clear the file input when hidden to avoid stale data
            $('#marriage_container input[type="file"]').val('');
        }
    }

    function showStep(step) {
        // Close modal if open when navigating manually
        if (motherConfirmPending) {
            $('#motherLastnameModal').hide().addClass('hidden');
            motherConfirmPending = false;
            pendingTargetStep = null;
        }

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
        // Disable Next button on step 1 if agreement not checked
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
            toggleFirstPersonFields(); // Ensure first-person fields toggle when step 8 loads
        }
        if (step === 9) {
            togglePWDContainer();
            toggleCourtOrderContainer(); // ensure court order visibility when step 9 loads
        }
        if (step === 5) {
            toggleGuardianSection();
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

            let label = fieldName;
            const $label = $field.closest('.mb-4, .relative, .flex-col, .md\\:col-span-1').find('label').first();
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
                'province',
                'city',
                'barangay',
                'PSGC',
                'personalemail',
                'mobilenumber',
                'emergenency_fullname',
                'emergency_mobilenumber',
                'seniorhighschoolattended',
                'locationofhighschool',
                'honorsreceived',
                'scholarship',
                'educationalattainment',
                'undergraddegree',
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
                //'outside_ph_addressline2',
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

            // Updated condition for current address fields
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

            if (fieldName === 'fathers_email' && value) {
                const emailPattern = /^\S+@\S+\.\S+$/;
                if (!emailPattern.test(value)) {
                    errors.push(`Please enter a valid email address.`);
                    $field.addClass('border-red-500');
                }
            }
            if (fieldName === 'mother_email' && value) {
                const emailPattern = /^\S+@\S+\.\S+$/;
                if (!emailPattern.test(value)) {
                    errors.push(`Please enter a valid email address.`);
                    $field.addClass('border-red-500');
                }
            }
            if (fieldName === 'guardian_email' && value) {
                const emailPattern = /^\S+@\S+\.\S+$/;
                if (!emailPattern.test(value)) {
                    errors.push(`Please enter a valid email address.`);
                    $field.addClass('border-red-500');
                }
            }

            // --- ZIP Code ---
            if (fieldName === 'zipcode_foreign' && value) {
                if (!/^\d{4}$/.test(value)) {
                    errors.push(`ZIP Code must be 4 digits only.`);
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
            const mobileFields = ['mobilenumber', 'emergency_mobilenumber', 'guardian_phonenumber', 'fathers_phonenumber', 'mother_phonenumber'];
            if (mobileFields.includes(fieldName) && value) {
                const cleanNumber = value.replace(/[\s\-\(\)]/g, '');
                if (citizenship === 'yes') {
                    // Philippine format: starts with 0, total 11 digits
                    if (!/^0\d{10}$/.test(cleanNumber)) {
                        errors.push(`Phone number is invalid. Please enter a valid Philippines mobile number.`);
                        $field.addClass('border-red-500');
                    }
                } else {
                    // Non-citizen: only digits allowed
                    if (!/^\d+$/.test(cleanNumber)) {
                        errors.push(`Phone number must contain only digits.`);
                        $field.addClass('border-red-500');
                    }
                }
            }

            // --- BIRTH DATE validation ---
            if (fieldName === 'dob') {
                const dobValue = value; // YYYY-MM-DD
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
                const marriageValue = value; // YYYY-MM-DD

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

                                // Compare with birth date
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

                                        // Age at marriage
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

                                // Too far in the past
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
                    return false; // break loop
                }
            });
            if (!hasValue) {
                errors.push('Please specify at least one scholarship.');
                // Highlight the first empty scholarship input
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
                $('#imageInput').removeClass('border-red-500');
            }

            const docFields = [
                { name: 'medical_certificate', label: 'Medical Certificate' },
                { name: 'student_directory', label: 'Student Directory' },
                { name: 'notice_of_admission', label: 'Notice of Admission' },
               // { name: 'honorable_dismissal', label: 'Honorable Dismissal' },
                { name: 'tor_remarks', label: 'TOR with Remarks' },
                { name: 'birth_certificate', label: 'Birth Certificate (PSA/LCR)' }
            ];

            docFields.forEach(field => {
                const fileInput = $(`input[name="${field.name}"]`)[0];
                if (!fileInput || !fileInput.files.length) {
                    errors.push(`${field.label} is required.`);
                    $(`input[name="${field.name}"]`).addClass('border-red-500');
                } else {
                    $(`input[name="${field.name}"]`).removeClass('border-red-500');
                }
            });

            const civilStatus = $('#civilstatus').val();
            if (civilStatus === 'married') {
                const marriageInput = $('input[name="marriage_certificate"]')[0];
                if (!marriageInput || !marriageInput.files.length) {
                    errors.push('Marriage certificate is required because Civil Status is Married.');
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
                } else {
                    $('input[name="pwd_card_container"]').removeClass('border-red-500');
                }
            }

            // Court Order re: Change of Name (if visible) – now optional
            if (!$('#marriage_container').hasClass('hidden')) {
                // Optional: you can still remove the red border if it was previously added
                $('input[name="marriage_container"]').removeClass('border-red-500');
                // No required validation – no error is pushed
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

        // Step 5 specific validation: mother's last name should not equal father's last name
        if (step === 5) {
            const mothersLastname = $('#mother_lastname').val()?.trim() || '';
            const fathersLastname = $('#fathers_lastname').val()?.trim() || '';
            if (mothersLastname && fathersLastname && mothersLastname.toLowerCase() === fathersLastname.toLowerCase()) {
                errors.push("Mother's maiden name should be different from father's last name. Are you sure?");
                $('#mother_lastname').addClass('border-red-500');
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
        // Toggle sublabels for mobile fields
        toggleMobileSublabels();
        // Re-validate current step if it's step 5
        if (currentStep === 5) {
            validateStep(currentStep);
        }
        // Also trigger custom event for any other listeners
        $(document).trigger('citizenshipChanged');
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

    $('#nextBtn').click(function() {
        if (motherConfirmPending) return; // ignore if modal is open

        const currentIndex = visibleSteps.indexOf(currentStep);
        const errors = validateStep(currentStep);

        // Special case: only mother's last name conflict
        const motherNameError = "Mother's maiden name should be different from father's last name. Are you sure?";
        if (errors.length === 1 && errors[0] === motherNameError) {
            // Show modal
            $('#motherLastnameModal').removeClass('hidden').show();
            motherConfirmPending = true;
            pendingTargetStep = visibleSteps[currentIndex + 1];
            return;
        }

        if (errors.length === 0) {
            if (currentIndex < totalSteps - 1) {
                currentStep = visibleSteps[currentIndex + 1];
                showStep(currentStep);
            }
        } else {
            errors.forEach(error => showToast(error, 'error'));
        }
    });

    $('#prevBtn').click(function() {
        // Close modal if open
        if (motherConfirmPending) {
            $('#motherLastnameModal').hide().addClass('hidden');
            motherConfirmPending = false;
            pendingTargetStep = null;
        }

        const currentIndex = visibleSteps.indexOf(currentStep);
        if (currentIndex > 0) {
            currentStep = visibleSteps[currentIndex - 1];
            showStep(currentStep);
        }
    });

    $('.step-label').click(function () {
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
        // Also trigger court order toggle when civil status changes
        toggleCourtOrderContainer();
    });

    $(document).on('change', '#pwd', function() {
        if (currentStep === 9) {
            togglePWDContainer();
        }
    });

    // Listen for changes that affect court order visibility
    $('#sexatbirth').on('change', toggleCourtOrderContainer);
    $(document).on('change', 'input[name="name_format"]', toggleCourtOrderContainer);

    // Modal button handlers
    $('#modalYes').click(function() {
        $('#motherLastnameModal').hide().addClass('hidden');
        motherConfirmPending = false;
        // Remove red border from mother_lastname if any
        $('#mother_lastname').removeClass('border-red-500');
        // Proceed to next step
        if (pendingTargetStep) {
            currentStep = pendingTargetStep;
            showStep(currentStep);
            pendingTargetStep = null;
        }
    });

    $('#modalNo').click(function() {
        $('#motherLastnameModal').hide().addClass('hidden');
        motherConfirmPending = false;
        pendingTargetStep = null;
        // Keep the red border; do not proceed
    });

    // Close modal if clicked outside
    $(document).on('click', '#motherLastnameModal', function(e) {
        if ($(e.target).is('#motherLastnameModal')) {
            $('#modalNo').click(); // treat as No
        }
    });

    // Initial calls
    showStep(currentStep);
    updateVisibleSteps();
    toggleCourtOrderContainer(); // ensure initial state
    toggleFirstPersonFields(); // ensure initial state for first-person fields
    toggleMobileSublabels(); // ensure sublabels visibility matches initial citizenship

    $(document).on('citizenshipChanged', function() {
        if (currentStep === 4) {
            validateStep(currentStep);
        }
    });
});