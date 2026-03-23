@extends('multi-step-form.body')
    @section('content')
        <center>
            <img
                class="mx-auto w-full max-w-[270px] max-h-[220px] mt-10"
                src="{{ asset('images/thankyou-mail.png') }}"
                alt="AMIS Logo">
            <h1 class="font-inter font-bold text-[60px] text-[#850038]">
                Thank You!
            </h1>
            <p class="text-[20px]">
                Your submission has been received.
            </p>
        </center>
    @endsection