<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo-dark.png')}}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="bg-white border-gray-200 border-b-2">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{route('home')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/logo-light.png')}}" class="h-8" alt="Job Board Logo" />
                <span class="self-center text-2xl font-semibold text-blue-800 whitespace-nowrap italic">Job Board</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-blue-700 rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-300 hover:bg-blue-200 " aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true"  fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 custom md:border-0 md:bg-transparent border-gray-700">
                <li class="navbarli">
                    <form id="createHEHE" action="{{route('job_create')}}" method="POST">
                        @csrf
                        <input type="hidden" id="company_id" name="company_id" value="{{$company->company_id}}">
                        <a href="#" onclick="createFunction()" class="navbar-animation block py-2 px-3 text-white bg-blue-500 rounded md:bg-transparent md:p-0 md:text-blue-800 md:hover:text-blue-500" aria-current="page">Add</a>
                    </form>
                    <script>
                        function createFunction() {
                            document.getElementById("createHEHE").submit();
                        }
                    </script>

                </li>
                <li class="navbarli">
                    <form id="profileHEHE" action="{{route('company_profile')}}" method="POST">
                        @csrf
                        <input type="hidden" id="company_id" name="company_id" value="{{$company->company_id}}">
                        <a href="#" onclick="profileFunction()" class="navbar-animation block py-2 px-3 text-white bg-blue-500 rounded md:bg-transparent md:p-0 md:text-blue-800 md:hover:text-blue-500" aria-current="page">Profile</a>
                    </form>
                    <script>
                        function profileFunction() {
                            document.getElementById("profileHEHE").submit();
                        }
                    </script>

                </li>
                <li class="navbarli">
                    <a href="{{route('home')}}" class="navbar-animation block py-2 px-3 text-white bg-blue-500 rounded md:bg-transparent md:p-0 md:text-blue-800 md:hover:text-blue-500" aria-current="page">Back</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="mt-7 mb-7 flex flex-col items-center justify-center">
        <h1 class="text-2xl text-gray-700 font-semibold text-center fontEpilogue">Your Ads</h1>
    </div>


    <div class="min-h-dvh flex flex-row flex-wrap my-4 justify-center fontEpilogue mx-10 gap-x-4">
        @foreach($ads as $ad)
            <a href="#" onclick="event.preventDefault(); document.getElementById('form-{{$ad->ad_id}}').submit();">
                <div class="w-64 h-64 bg-white border border-gray-200 rounded-lg shadow">
                    <form action="{{route('view_listings')}}" method="POST" id="form-{{$ad->ad_id}}">
                        @csrf
                        <div class="flex flex-col pb-10">
                            <div class="pt-2 px-5 w-full flex flex-row items-center justify-between mb-3">
                                <img src="{{asset('company_logos/'.$company->logo)}}" class="mt-2 w-14 h-14 rounded-full border" alt="Company logo" style="object-fit: contain;">
                                <span class="p-1 border border-blue-500 text-blue-500">{{$ad->enrollment}}</span>
                            </div>
                            <div class="mx-5">
                                <h5 class="mb-1 text-xl only-1-lines font-medium text-gray-900">{{$ad->title}}</h5>
                            </div>
                            <div class="mx-5">
                                <h5 class="mb-1 text-base font-medium text-gray-500">{{$company->Address}}</h5>
                            </div>
                            <div class="mx-5 mt-2 only-1-lines">
                                <h5 class="mb-1 text-base font-medium text-gray-500">{{$ad->description}}</h5>
                            </div>
                            <div class="mx-5"></div>
                            <input type="hidden" name="ad_id" value="{{$ad->ad_id}}">
                            <input type="hidden" name="company_id" value="{{$company->company_id}}">
                        </div>
                    </form>
                </div>
            </a>
        @endforeach
    </div>
    <footer class="custom mt-10">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8 flex justify-end">
            <div class="mb-6 md:mb-0">
                <a href="#">
                    <span class="text-sm text-gray-400">© 2024 <span class="hover:underline">Job Board</span>.
                </a>
            </div>
        </div>
    </footer>
