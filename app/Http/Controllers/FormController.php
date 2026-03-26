<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;

    class FormController extends Controller
    {
        public function submit(Request $request)
        {
                $validated = $request->validate([

        // Access Verification (always required)
        'student_number' => 'required|string|max:255',
        'category'       => 'required|string|max:255',

        // Basic Information (always required)
        'degreeprogram' => 'required|string|max:255',
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

        // Contact Details (always required)
        'citizenship'               => 'required|in:yes,no',
        'citizenship_country'       => 'exclude_if:citizenship,yes|required|string|max:255',
        'same_address'              => 'required|in:yes,no',
        'outside_ph_addressline1'   => 'exclude_if:citizenship,yes|required|string|max:255',
        'outside_ph_addressline2'   => 'exclude_if:citizenship,yes|nullable|string|max:255',
        'city_foreign'              => 'exclude_if:citizenship,yes|required|string|max:255',
        'state/province_foreign'    => 'exclude_if:citizenship,yes|required|string|max:255',
        'zipcode_foreign'           => 'exclude_if:citizenship,yes|required|string|max:255',
        'foreign_country'           => 'exclude_if:citizenship,yes|required|string|max:255',
        'streetaddressline1_ph'     => 'required|string|max:255',
        'region'                    => 'required|string|max:255',
        'province'                  => 'required|string|max:255',
        'city'                      => 'required|string|max:255',
        'barangay'                  => 'required|string|max:255',
        //'PSGC' => 'required|string|max:255',

        // Current Address (inside the Philippines) – required only if same_address == 'no'
        'current_room_flr_unit_bldg' => 'required_if:same_address,no|nullable|string|max:255',
        'current_house_lot_blk'      => 'required_if:same_address,no|nullable|string|max:255',
        'current_street'             => 'required_if:same_address,no|nullable|string|max:255',
        'current_subdivision_line2'  => 'required_if:same_address,no|nullable|string|max:255',
        'current_region'             => 'required_if:same_address,no|nullable|string|max:255',
        'current_province'           => 'required_if:same_address,no|nullable|string|max:255',
        'current_city'               => 'required_if:same_address,no|nullable|string|max:255',
        'current_barangay'           => 'required_if:same_address,no|nullable|string|max:255',
        
        // current_PSGC is disabled and not submitted, so no rule needed

        'personalemail'           => 'required|email|max:255',
        'mobilenumber'            => 'required|string|max:255',
        'landlinenumber'          => 'nullable|string|max:255',
        'emergency_fullname'      => 'required|string|max:255',
        'emergency_mobilenumber'  => 'required|string|max:255',

        // ===== Academic Matters (step 5) – required only for undergraduates =====
        'seniorhighschoolattended' => 'exclude_if:category,graduate|required|string|max:255',
        'locationofhighschool'     => 'exclude_if:category,graduate|required|string|max:255',
        'honorsreceived'           => 'exclude_if:category,graduate|required|in:none,honor,highhonor,highesthonor',
        'scholarship'              => 'exclude_if:category,graduate|required|in:yes,no',
        'specifyscholarship'       => 'exclude_if:category,graduate|required_if:scholarship,yes|string|max:255',

        // ===== Education & Employment (step 6) – required only for graduates =====
        'educationalattainment' => 'exclude_if:category,undergraduate|required|in:bachelorsdegree,postbaccalaureate,mastersdegree,postmasters,doctoral',
        'undergraddegree'       => 'exclude_if:category,undergraduate|required|string|max:255',
        'listofdegree'          => 'exclude_if:category,undergraduate|nullable|string|max:255',
        'lastschoolattended'    => 'exclude_if:category,undergraduate|required|string|max:255',

        'school'                => 'exclude_if:category,undergraduate|required|in:bachelorsdegree,postbaccalaureate,mastersdegree,postmasters,doctoral',
        'program'               => 'exclude_if:category,undergraduate|required|string|max:255',
        'degree'                => 'exclude_if:category,undergraduate|nullable|string|max:255',
        'year_graduated'        => 'exclude_if:category,undergraduate|required|string|max:255',

        'degrees[]'             => 'required|string|max:255',
        'typeofincome'          => 'exclude_if:category,undergraduate|required|in:employeed,self-employeed,combination,passiveincome,notearning',
        'nameofemployer'        => 'exclude_if:category,undergraduate|required_if:typeofincome,employeed,self-employeed,combination,passiveincome|string|max:255',
        'natureofwork'          => 'exclude_if:category,undergraduate|required_if:typeofincome,employeed,self-employeed,combination,passiveincome|string|max:255',
        'income'                => 'exclude_if:category,undergraduate|required_if:typeofincome,employeed,self-employeed,combination,passiveincome|in:below20k,20k-39k,40k-59k,60k-79k,80k-99k,100k-149k,150kup',
        'funding_sources'       => 'exclude_if:category,undergraduate|required|array|min:1',
        'funding_sources.*'     => 'exclude_if:category,undergraduate|required|in:personal_income,savings,family_support,up_scholarship,government_scholarship,private_scholarship,graduate_assistantship,employer_sponsorship,educational_loan,passive_income,other',
        'funding_other'         => 'exclude_if:category,undergraduate|required_if:funding_sources.*,other|nullable|string|max:255',

        // ===== Additional Information (step 7) – always required =====
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
            ]);
        }
    }