@extends('partial.base')

@section('title', 'Home Page')

@section('content')

    <img src="{{asset('images/banner.png')}}" class="w-full" alt="banner">

    <div class="mt-7 mb-3 flex flex-col items-center justify-center">
        <h1 class="text-2xl text-gray-700 font-semibold text-center fontEpilogue">Jobs Available</h1>
    </div>

    <div class="flex flex-row items-center my-4 fontEpilogue mx-10 gap-x-4">
        <a href="">
            <div class="w-full max-w-64 bg-white border border-gray-200 rounded-lg shadow ">
                <div class="flex flex-col pb-10">
                    <div class="pt-2 px-5 w-full flex flex-row items-center justify-between">
                        <img class="mt-3 w-14 h-14 mb-3 rounded-full border" src="{{asset('images/logo-light.png')}}" alt="Bonnie image"/>

                        <span class="p-1 border border-blue-500 text-blue-500">Full Time</span>
                    </div>
                    <div class="mx-5">
                        <h5 class="mb-1 text-xl font-medium text-gray-900 ">Product Designer</h5>
                    </div>
                    <div class="mx-5">
                        <h5 class="mb-1 text-base font-medium text-gray-500 ">ClassPass ⋅ Manchester, UK</h5>
                    </div>
                    <div class="mx-5 mt-2 overflow-clip">
                        <h5 class="mb-1 text-base font-medium text-gray-500 ">ClassPass is looking for Product Designer to help us...</h5>
                    </div>
                    <div class="mx-5">

                    </div>
                </div>
            </div>
        </a>
    </div>
@endsection
