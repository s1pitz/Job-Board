<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Advertisement</title>
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
                <li>
                    <a href="{{route('home')}}" class="block py-2 px-3 text-white bg-blue-500 rounded md:bg-transparent md:p-0 md:text-blue-800 md:hover:text-blue-500" aria-current="page">Back</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="my-7 mx-auto p-10 min-h-dvh max-w-screen-md w-auto flex flex-col justify-center border rounded-3xl">
        <h2 class="text-5xl font-bold text-left mb-10">Create Advertisement</h1>
        <div class="">
            <form action="{{route('register_ad')}}" method="POST">
                @csrf
                <input type="hidden" id="company_id" name="company_id" value="{{$company_id}}">
                <label for="ad_title">Advertisement Title</label>
                <input type="name" name="ad_title" id="name" class="my-4 border-2 border-gray-200 rounded-lg p-2 w-full" required>
                <label for="description">Description</label>
                <textarea name="description" id="description" class="my-4 border-2 border-gray-200 rounded-lg p-2 w-full" required>Include the job description here with the qualifications and responsibilities.</textarea>
                <label for="Lower_salary">Salary Range (Lower Bound)</label>
                <input type="Lower_salary" name="company_Lower_salary" id="Lower_salary" class="my-4 border-2 border-gray-200 rounded-lg p-2 w-full" required>
                <label for="Upper_salary">Salary Range (Upper Bound)</label>
                <input type="Upper_salary" name="company_Upper_salary" id="Upper_salary" class="my-4 border-2 border-gray-200 rounded-lg p-2 w-full" required>
                <label for="enrollment">Choose an Enrollment:</label>
                <select id="enrollment" name="enrollment">
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Remote">Remote</option>
                    <option value="Internship">Internship</option>
                    <option value="Hybrid">Hybrid</option>
                </select>
                <button type="submit" class="w-full border rounded-lg p-2 buttonColor my-4 text-gray-100" >Create Ad</button>
            </form>
        </div>
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
    @vite('resources/js/app.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
