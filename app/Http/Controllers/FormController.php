<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class FormController extends Controller
    {
        /*
        Sanitize a string input (trim + strip_tags).
         *For arrays, it recurses.
         * @param mixed $input
         * @return mixed
         */
        private function sanitizeInput($input)
        {
            if (is_string($input)) {
                return trim(strip_tags($input));
            }
            if (is_array($input)) {
                return array_map([$this, 'sanitizeInput'], $input);
            }
            return $input;
        }

        public function submit(Request $request)
        {
            // ----- SANITIZATION: clean all string inputs before validation -----
            $sanitized = $this->sanitizeInput($request->all());
            $request->merge($sanitized);

            // ----- VALIDATION (your existing rules, unchanged) -----
            $validated = $request->validate([
                // Access Verification (always required) STEP 2
                'student_number' => 'required|string|max:255',
                'category'       => 'required|string|max:255',
                'UP_email'       => 'nullable|string|max:255',

                // Basic Information (always required) STEP 3
                'degreeprogram' => 'required',
                'first_name'    => 'required|string|max:255',
                'middle_name'   => 'nullable|string|max:255',
                'last_name'     => 'required|string|max:255',
                'name_suffix'   => 'nullable|string|max:255',
                'dob'           => 'required|date',
                'sexatbirth'    => 'required|in:male,female',
                'birthplace'    => 'required|string|max:255',
                'civilstatus'   => 'required|in:single,married,separated,annuled,widowed,livin,noans',
                'marriagedate'  => 'required_if:civilstatus,married|date|nullable',
                'name_format'   => 'required_if:civilstatus,married|in:maiden,hyphenated,husband|nullable',

                // Contact Details (always required) STEP 4
                'citizenship'               => 'required|in:yes,no',
                'citizenship_country'       => 'exclude_if:citizenship,yes|required|string|max:255',
                

                // Foreign address
                'outside_ph_addressline1'   => 'exclude_if:citizenship,yes|required|string|max:255',
                'outside_ph_addressline2'   => 'exclude_if:citizenship,yes|nullable|string|max:255',
                'city_foreign'              => 'exclude_if:citizenship,yes|required|string|max:255',
                'state_province_foreign'    => 'exclude_if:citizenship,yes|required|string|max:255',
                'zipcode_foreign'           => 'exclude_if:citizenship,yes|required|string|max:255',
                'foreign_country'           => 'exclude_if:citizenship,yes|required|string|max:255',

                // Permanent address inside PH
                'room_flr_unit_bldg'        => 'nullable|string|max:255',
                'house_lot_blk'             => 'nullable|string|max:255',
                'street'                    => 'required|string|max:255',
                'subdivision_line2'         => 'nullable|string|max:255',
                'region'                    => 'required|string|max:255',
                'province'                  => 'required|string|max:255',
                'city'                      => 'required|string|max:255',
                'barangay'                  => 'required|string|max:255',

                'same_address'              => 'required|in:yes,no',

                // Current address (inside PH) – required only if same_address == 'no'
                'current_room_flr_unit_bldg' => 'required_if:same_address,no|nullable|string|max:255',
                'current_house_lot_blk'      => 'required_if:same_address,no|nullable|string|max:255',
                'current_street'             => 'required_if:same_address,no|nullable|string|max:255',
                'current_subdivision_line2'  => 'required_if:same_address,no|nullable|string|max:255',
                'current_region'             => 'required_if:same_address,no|nullable|string|max:255',
                'current_province'           => 'required_if:same_address,no|nullable|string|max:255',
                'current_city'               => 'required_if:same_address,no|nullable|string|max:255',
                'current_barangay'           => 'required_if:same_address,no|nullable|string|max:255',

                // Step 5 – Contact Information
                'personalemail'           => 'required|email|max:255',
                'mobilenumber'            => 'required|string|max:255',
                'landlinenumber'          => 'nullable|string|max:255',

                'emergency_fullname'      => 'required|string|max:255',
                'emergency_mobilenumber'  => 'required|string|max:255',

                'fathers_firstname'       => 'nullable|string|max:255',
                'fathers_middlename'      => 'nullable|string|max:255',
                'father_suffix'           => 'nullable|string|max:255',

                'mother_firstname'        => 'nullable|string|max:255',
                'mother_middlename'       => 'nullable|string|max:255',
                'mother_lastname'         => 'nullable|string|max:255',

                'guardian_firstname'      => 'nullable|string|max:255',
                'guardian_middlename'     => 'nullable|string|max:255',
                'guardian_lastname'       => 'nullable|string|max:255',

                // Step 6 – Academic Matters (undergraduate)
                'seniorhighschoolattended' => 'exclude_if:category,graduate|required|string|max:255',
                'locationofhighschool'     => 'exclude_if:category,graduate|required|string|max:255',
                'honorsreceived'           => 'exclude_if:category,graduate|required|in:none,honor,highhonor,highesthonor',
                'scholarship'              => 'exclude_if:category,graduate|required|in:yes,no',
                'specifyscholarship'       => 'exclude_if:category,graduate|required_if:scholarship,yes|string|max:255',

                // Step 7 – Education & Employment (graduate)
                'school'                => 'exclude_if:category,undergraduate|required|string|max:255',
                'program'               => 'exclude_if:category,undergraduate|required|string|max:255',
                'degree'                => 'exclude_if:category,undergraduate|nullable|string|max:255',
                'year_graduated'        => 'exclude_if:category,undergraduate|required|string|max:255',
                'lastschoolattended' => 'exclude_if:category,undergraduate|required|string|max:255',

                'degrees[]'             => 'required|string|max:255',
                'typeofincome'          => 'exclude_if:category,undergraduate|required|in:employeed,self-employeed,combination,passiveincome,notearning',
                'nameofemployer'        => 'exclude_if:category,undergraduate|required_if:typeofincome,employeed,self-employeed,combination,passiveincome|string|max:255',
                'natureofwork'          => 'exclude_if:category,undergraduate|required_if:typeofincome,employeed,self-employeed,combination,passiveincome|string|max:255',
                'income'                => 'exclude_if:category,undergraduate|required_if:typeofincome,employeed,self-employeed,combination,passiveincome|in:below20k,20k-39k,40k-59k,60k-79k,80k-99k,100k-149k,150kup',
                'funding_sources'       => 'exclude_if:category,undergraduate|required|array|min:1',
                'funding_sources.*'     => 'exclude_if:category,undergraduate|required|in:personal_income,savings,family_support,up_scholarship,government_scholarship,private_scholarship,graduate_assistantship,employer_sponsorship,educational_loan,passive_income,other',
                'funding_other'         => 'exclude_if:category,undergraduate|required_if:funding_sources.*,other|nullable|string|max:255',

                // Step 8 – Additional Information
                'firstperson_to_attend_college'  => 'required|in:yes,no',
                'firstpersonup'                  => 'required|in:yes,no',
                'annualincome'                   => 'required|in:below250k,250-499k,500-749k,750-999k,1m-1.49m,1.5m-1.9m,1.9m-2.9m,3m,idk,prefernottosay',
                'pwd'                            => 'required|in:Yes,No,prefernottosay',
                'disability_types'               => 'exclude_if:pwd,No|exclude_if:pwd,prefernottosay|required|array|min:1',
                'disability_types.*'             => 'exclude_if:pwd,No|exclude_if:pwd,prefernottosay|required|in:visual,hearing,speech,physical,orthopedic,learning,intellectual,autism,psychosocial,mental,cancer,rare_disease',
                'support_needs'                  => 'required|array|min:1',
                'support_needs.*'                => 'required|in:academic,health,mobility,communication,assistive,other,none',
                'support_specify'                => 'required_if:support_needs.*,other|nullable|string|max:255',
                'ipra'                           => 'required|in:yes,no,unsure',
                'indigenous_group'               => 'exclude_if:ipra,no|exclude_if:ipra,unsure|required|in:Aeta,Agta,Ati,Bagobo,Blaan,Bontoc,Higaonon,Ibaloi,Ifugao,Ivatan,Kankanaey,Maguindanao,Mandaya,Mangyan,Manobo,Maranao,Sama-Bajau,Subanen,Tboli,Tausug,Tumandok,Yakan,other',
                'ipra_specify'                   => 'required_if:indigenous_group,other|nullable|string|max:255',

                // Step 9 – Documents (only file existence validated, not sanitized)
                'image'                         => 'required',
                'medical_certificate'           => 'required',
                'notice_of_admission'           => 'required',
                'honorable_dismissal'           => 'nullable',
                'tor_remarks'                   => 'required',
                'birth_certificate'             => 'required',
                'marriage_certificate'          => 'nullable',
                'pwd_card_container'            => 'required_if:pwd,yes',
                'marriage_container'            => 'nullable',

                // Step 10 – Undertakings
                'confirmation' => 'required|accepted',
                'data_privacy' => 'required|accepted',
            ]);
        }
    }