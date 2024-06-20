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
<body class="bg-[#f5f6f8]">
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
                        <form id="HEHE" action="{{route("company_home")}}" method="POST">
                            @csrf
                            <input type="hidden" id="company_id" name="company_id" value={{$company->company_id}}>
                            <a href="#" onclick="backFunction()" class="navbar-animation block py-2 px-3 text-white bg-blue-500 rounded md:bg-transparent md:p-0 md:text-blue-800 md:hover:text-blue-500" aria-current="page">Back</a>
                        </form>
                        <script>
                            function backFunction() {
                                document.getElementById("HEHE").submit();
                            }
                        </script>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="min-h-[calc(100vh_-_12rem)] flex flex-row flex-wrap my-4 items-center justify-center fontEpilogue">
        <div class="h-auto grid-profile w-full gap-2 mx-auto px-20">
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5">
                <table class="w-full" data-tab-for="order" data-page="active" >
                    <thead>
                        <tr class="">
                            <th class="text-[12px] font-semibold uppercase tracking-wide text-blue-600 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">Listing ID</th>
                            <th class="text-[12px] font-semibold uppercase tracking-wide text-blue-600 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">User ID</th>
                            <th class="text-[12px] font-semibold uppercase tracking-wide text-blue-600 py-2 px-4 bg-gray-50 text-left">Username</th>
                            <th class="text-[12px] font-semibold uppercase tracking-wide text-blue-600 py-2 px-4 bg-gray-50 text-left">CV</th>
                            <th class="text-[12px] font-semibold uppercase tracking-wide text-blue-600 py-2 px-4 bg-gray-50 text-left">Portfolio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listings as $listing)
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">{{$listing->listing_id}}</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">{{$listing->user_id}}</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium text-gray-400">{{$listing->user_name}}</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <a href="{{ route('downloadCV', $listing->listing_id) }}">
                                    <span class="text-[13px] hover:text-gray-700 font-medium text-gray-400">{{$listing->cv}}</span>
                                </a>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <a href="{{ route('downloadPort', $listing->listing_id) }}">
                                    <span class="text-[13px] hover:text-gray-700 font-medium text-gray-400">{{$listing->portofolio}}</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="custom mt-10">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8 flex justify-end">
            <div class="mb-6 md:mb-0">
                <a href="#">
                    <span class="text-sm text-gray-400">© 2024 <span class="hover:underline">Job Board</span>.
                </a>
            </div>
        </div>
    </footer>
