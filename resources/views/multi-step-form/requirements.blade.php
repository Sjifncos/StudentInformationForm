<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UP CEBU OUR</title>
    <link href="https://fonts.cdnfonts.com/css/palatino" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-[#F2F3F4] min-h-screen flex flex-col items-center justify-center px-4">
     @include('multi-step-form.header')
        <div class="bg-white rounded-2xl shadow-lg w-full max-w-2xl lg:max-w-5xl xl:max-w-6xl overflow-hidden mb-8">

        {{-- Header --}}
        <div class="bg-[#8A1538] px-6 py-5">
            <p class="text-white font-semibold text-[18px] leading-snug">
                Before Proceeding To The Student Information Form, Please Prepare The Following Documents:
            </p>
        </div>

        {{-- Document List --}}
        <div class="px-6 pt-5 pb-4">
            <ul class="space-y-1">

                <li class="flex items-start gap-3 px-2 py-2 rounded-lg hover:bg-red-50">
                    <span class="mt-[6px] w-2 h-2 rounded-full bg-gray-400 flex-shrink-0"></span>
                    <span class="text-black-800 text-sm">2×2 Picture <span class="text-[#8A1538] font-semibold">(Required)</span></span>
                </li>

                <li class="flex items-start gap-3 px-2 py-2 rounded-lg hover:bg-red-50">
                    <span class="mt-[6px] w-2 h-2 rounded-full bg-gray-400 flex-shrink-0"></span>
                    <span class="text-black-800 text-sm">Medical Certificate <span class="text-[#8A1538] font-semibold">(Required)</span></span>
                </li>

                <li class="flex items-start gap-3 px-2 py-2 rounded-lg hover:bg-red-50">
                    <span class="mt-[6px] w-2 h-2 rounded-full bg-gray-400 flex-shrink-0"></span>
                    <span class="text-black-800 text-sm">Student Directory <span class="text-[#8A1538] font-semibold">(Required)</span></span>
                </li>

                <li class="flex items-start gap-3 px-2 py-2 rounded-lg hover:bg-red-50">
                    <span class="mt-[6px] w-2 h-2 rounded-full bg-gray-400 flex-shrink-0"></span>
                    <span class="text-black-800 text-sm">Notice Of Admission <span class="text-[#8A1538] font-semibold">(Required)</span></span>
                </li>

                <li class="flex items-start gap-3 px-2 py-2 rounded-lg hover:bg-red-50">
                    <span class="mt-[6px] w-2 h-2 rounded-full bg-gray-400 flex-shrink-0"></span>
                    <span class="text-black-800 text-sm">Transcript Of Records (TOR) With Remarks "Copy For UP Cebu" <span class="text-[#8A1538] font-semibold">(Required)</span></span>
                </li>

                <li class="flex items-start gap-3 px-2 py-2 rounded-lg hover:bg-red-50">
                    <span class="mt-[6px] w-2 h-2 rounded-full bg-gray-400 flex-shrink-0"></span>
                    <span class="text-black-800 text-sm">PSA Birth Certificate <span class="text-[#8A1538] font-semibold">(Required)</span></span>
                </li>

                <li class="flex items-start gap-3 px-2 py-2 rounded-lg hover:bg-red-50">
                    <span class="mt-[6px] w-2 h-2 rounded-full bg-gray-400 flex-shrink-0"></span>
                    <span class="text-black-800 text-sm">Local Civil Registrar (LCR) Birth Certificate <span class="text-[#8A1538] font-semibold">(If PSA Copy Is Not Legible)</span></span>
                </li>

                
                <li class="flex items-start gap-3 px-2 py-2 rounded-lg hover:bg-red-50">
                    <span class="mt-[6px] w-2 h-2 rounded-full bg-gray-400 flex-shrink-0"></span>
                    <span class="text-black-800 text-sm">Honorable Dismissal <span class="text-[#8A1538] font-semibold">(If Applicable)</span></span>
                </li>

                <li class="flex items-start gap-3 px-2 py-2 rounded-lg hover:bg-red-50">
                    <span class="mt-[6px] w-2 h-2 rounded-full bg-gray-400 flex-shrink-0"></span>
                    <span class="text-black-800 text-sm">Photo Copy Of PWD Card <span class="text-[#8A1538] font-semibold">(If Applicable)</span></span>
                </li>

                <li class="flex items-start gap-3 px-2 py-2 rounded-lg hover:bg-red-50">
                    <span class="mt-[6px] w-2 h-2 rounded-full bg-gray-400 flex-shrink-0"></span>
                    <span class="text-black-800 text-sm">Photocopy Of Marriage Certificate <span class="text-[#8A1538] font-semibold">(If Married)</span></span>
                </li>

                <li class="flex items-start gap-3 px-2 py-2 rounded-lg hover:bg-red-50">
                    <span class="mt-[6px] w-2 h-2 rounded-full bg-gray-400 flex-shrink-0"></span>
                    <span class="text-black-800 text-sm">Court Order For Change Of Name <span class="text-[#8A1538] font-semibold">(If Applicable)</span></span>
                </li>

            </ul>
        </div>

        {{-- Footer --}}
        <div class="flex items-center justify-between px-6 py-4">
            <p class="text-black-400 text-xs">
                Allowed File Formats: PDF, PNG, JPG, JPEG, WEBP
            </p>
        </div>
        <div class="flex items-center justify-end px-6 py-4">
            <button 
                type="button"
                onclick="window.location='{{ route('form') }}'"
                class="w-full sm:w-auto px-8 py-3 bg-[#8A1538] text-white font-semibold rounded hover:bg-[#FFAD0D] transition-colors duration-200">
                Next
            </button>
        </div>
    </div>
</body>
</html>