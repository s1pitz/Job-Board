<?php

?>
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
                        <input type="hidden" id="company_id" name="company_id" value={{$company_id}}>
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

    <main class="mb-10">
        <div class="">
            <div class="max-w-screen-xl flex flex-wrap flex-col justify-normal mx-auto p-4">
                <div>
                    <h5 class="ml-2 mt-1 mb-2 text-xs font-semibold text-gray-400">Company / Create Ads</h5>
                    <h5 class="ml-2 text-blue-900 font-semibold">New Advertisement</h5>
                </div>
            </div>
        </div>
        <div>
            <div class="max-w-screen-xl flex flex-wrap flex-row items-center justify-between mx-auto px-6">
                <div id="first-step" class="h-1.5 rounded-lg bg-gray-300 w-[32%]" style="transition: background-color 0.3s ease-in-out;"></div>
                <div id="second-step" class="h-1.5 rounded-lg bg-gray-300 w-[32%]" style="transition: background-color 0.3s ease-in-out;"></div>
                <div id="third-step" class="h-1.5 rounded-lg bg-gray-300 w-[32%]" style="transition: background-color 0.3s ease-in-out;"></div>
            </div>
        </div>

        <div class="mt-2 ml-2">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-normal mx-auto p-4">
                <svg class="h-7 mx-1" fill="#757577" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#757577" stroke-width="0.00032">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier"> <title>eye</title>
                        <path d="M0 16q0.064 0.128 0.16 0.352t0.48 0.928 0.832 1.344 1.248 1.536 1.664 1.696 2.144 1.568 2.624 1.344 3.136 0.896 3.712 0.352 3.712-0.352 3.168-0.928 2.592-1.312 2.144-1.6 1.664-1.632 1.248-1.6 0.832-1.312 0.48-0.928l0.16-0.352q-0.032-0.128-0.16-0.352t-0.48-0.896-0.832-1.344-1.248-1.568-1.664-1.664-2.144-1.568-2.624-1.344-3.136-0.896-3.712-0.352-3.712 0.352-3.168 0.896-2.592 1.344-2.144 1.568-1.664 1.664-1.248 1.568-0.832 1.344-0.48 0.928zM10.016 16q0-2.464 1.728-4.224t4.256-1.76 4.256 1.76 1.76 4.224-1.76 4.256-4.256 1.76-4.256-1.76-1.728-4.256zM12 16q0 1.664 1.184 2.848t2.816 1.152 2.816-1.152 1.184-2.848-1.184-2.816-2.816-1.184-2.816 1.184l2.816 2.816h-4z"></path>
                    </g>
                </svg>
                <span class="ml-1 self-center text-sm font-semibold text-[#757577] whitespace-nowrap">Ad Overview</span>
            </div>
        </div>
        <form action="{{route('register_ad')}}" method="POST" id="form1">
            @csrf
            <div class="block">
                <div class="max-w-screen-xl flex flex-wrap flex-row items-center justify-normal mx-auto px-6">
                    <div class="grid-ad w-full gap-2 h-auto">
                        <div class="bg-white border-gray-300 drop-shadow-sm rounded-md p-5">
                            <label for="ad_title">Advertisement Title</label>
                            <input type="name" form="form1" name="ad_title" id="name" class="my-4 bg-gray-200 rounded-lg p-2 w-full" placeholder="Title" required>
                            <label for="description">Description</label>
                            <textarea name="description" form="form1" id="description" class="my-4 min-h-10 max-h-32 bg-gray-200 rounded-lg p-2 w-full" placeholder="Brief Description of the Job" required></textarea>
                        </div>
                        <div class=""></div>
                        <div class="hidden md:grid bg-white grid-preview border-gray-300 drop-shadow-sm rounded-md p-5">
                            <span>Example Preview</span>
                            <div class="flex flex-col pb-10">
                                <div class="pt-2 w-full flex flex-row items-center justify-between">
                                    <img class="mt-3 w-14 h-14 mb-3 rounded-full border" src="{{asset('images/logo-light.png')}}" alt="logo image"/>
                                    <span class="p-1 border border-blue-500 text-blue-500">Part-time</span>
                                </div>
                                <div class="">
                                    <h5 class="mb-1 text-xl font-medium text-gray-900 ">Assistant Manager</h5>
                                </div>
                                <div class="whitespace-nowrap">
                                    <h5 class="mb-1 text-base font-medium text-gray-500 ">John Doe Street</h5>
                                </div>
                                <div class="mt-2 only-1-lines">
                                    <h5 class="mb-1 text-base font-normal text-gray-500 ">We are seeking a highly motivated and dynamic Assistant Manager to join our team. The Assistant Manager will support the Human Resource Faculty in various operational tasks, ensuring efficiency and productivity. The ideal candidate will have strong leadership skills, excellent communication abilities, and a knack for problem-solving.</h5>
                                </div>
                                <div class="mt-10">
                                    <span class="bg-[#eefaf7] px-5 py-2 text-[#85dbc4] rounded-l-full rounded-r-full">Design</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 flex flex-wrap flex-row">
                            <svg class="h-7 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path opacity="0.4" d="M18.6695 2H16.7695C14.5895 2 13.4395 3.15 13.4395 5.33V7.23C13.4395 9.41 14.5895 10.56 16.7695 10.56H18.6695C20.8495 10.56 21.9995 9.41 21.9995 7.23V5.33C21.9995 3.15 20.8495 2 18.6695 2Z" fill="#757577"></path>
                                    <path opacity="0.4" d="M7.24 13.4302H5.34C3.15 13.4302 2 14.5802 2 16.7602V18.6602C2 20.8502 3.15 22.0002 5.33 22.0002H7.23C9.41 22.0002 10.56 20.8502 10.56 18.6702V16.7702C10.57 14.5802 9.42 13.4302 7.24 13.4302Z" fill="#757577"></path>
                                    <path d="M6.29 10.58C8.6593 10.58 10.58 8.6593 10.58 6.29C10.58 3.9207 8.6593 2 6.29 2C3.9207 2 2 3.9207 2 6.29C2 8.6593 3.9207 10.58 6.29 10.58Z" fill="#757577"></path>
                                    <path d="M17.7099 21.9999C20.0792 21.9999 21.9999 20.0792 21.9999 17.7099C21.9999 15.3406 20.0792 13.4199 17.7099 13.4199C15.3406 13.4199 13.4199 15.3406 13.4199 17.7099C13.4199 20.0792 15.3406 21.9999 17.7099 21.9999Z" fill="#757577"></path>
                                </g>
                            </svg>
                            <span class="ml-1 self-center text-sm font-semibold text-[#757577] whitespace-nowrap">Categories</span>
                        </div>
                        <div class="hidden md:block"></div>
                        <div class="bg-white border-gray-300 drop-shadow-sm rounded-md p-5">
                            <div class="scroll-container overflow-x-scroll" style="-ms-overflow-style: none; scrollbar-width: none;">
                                <ul id="listCategories" class=" whitespace-nowrap">
                                    @php
                                        $categories = [
                                            ['name' => 'Marketing', 'text_color' => '#feca70', 'background_color' => '#fdf3eb'],
                                            ['name' => 'Design', 'text_color' => '#85dbc4', 'background_color' => '#eefaf7'],
                                            ['name' => 'Business', 'text_color' => '#234cb7', 'background_color' => '#ececfc'],
                                            ['name' => 'Law', 'text_color' => '#660099', 'background_color' => '#f4e0ff'],
                                            ['name' => 'Technology', 'text_color' => '#ff6550', 'background_color' => '#fff0ee'],
                                            ['name' => 'Administration', 'text_color' => '#ffbf00', 'background_color' => '#fff2cb'],
                                            ['name' => 'Engineering', 'text_color' => '#562424', 'background_color' => '#fed7d7'],
                                            ['name' => 'Communications', 'text_color' => '#be29ec', 'background_color' => '#f7dcff'],
                                            ['name' => 'Health care', 'text_color' => '#3bd6c6', 'background_color' => '#d9f7f7']
                                        ];
                                    @endphp

                                    <form action=""></form>

                                    @foreach ($categories as $category)
                                        @php
                                            $isSelected = false;
                                            if($selectedCategories != null){
                                                foreach ($selectedCategories as $selectedCategory){
                                                    if($selectedCategory->name == $category['name']){
                                                        $isSelected = true;
                                                    }
                                                }
                                            }
                                            $bgColor = $isSelected ? '#FFFFFF' : $category['background_color'];
                                            $textColor = $isSelected ? $category['text_color'] : $category['text_color'];
                                        @endphp
                                        <li>
                                            <form action="{{ route('add_category') }}" id="form-{{$category['name']}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="category" value="{{ $category['name'] }}">
                                                <input type="hidden" name="bg_color" value="{{ $category['background_color'] }}">
                                                <input type="hidden" name="text_color" value="{{ $category['text_color'] }}">
                                                <input type="hidden" name="ad_id" value="{{ $ad->ad_id }}">
                                                <input type="hidden" name="company_id" value="{{ $company_id }}">
                                                <button class="px-5 py-2 rounded-l-full rounded-r-full"
                                                    style="background-color: {{ $bgColor }}; color: {{ $textColor }}">
                                                    {{ $category['name'] }}
                                                </button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class=""></div>
                        <div class="mt-3 grid-requirements md:mt-2 flex flex-wrap flex-row">
                            <svg class="h-7 mx-1" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M1 3C0.447715 3 0 3.44772 0 4C0 4.55228 0.447716 5 1 5H9C9.55228 5 10 4.55228 10 4C10 3.44772 9.55228 3 9 3H1Z" fill="#757577"></path>
                                    <path d="M1 7C0.447715 7 0 7.44772 0 8C0 8.55228 0.447715 9 1 9H7C7.55228 9 8 8.55228 8 8C8 7.44772 7.55228 7 7 7H1Z" fill="#757577"></path>
                                    <path d="M0 12C0 11.4477 0.447715 11 1 11H9C9.55228 11 10 11.4477 10 12C10 12.5523 9.55228 13 9 13H1C0.447716 13 0 12.5523 0 12Z" fill="#757577"></path>
                                    <path d="M15.707 7.20711C16.0975 6.81658 16.0975 6.18342 15.707 5.79289C15.3165 5.40237 14.6833 5.40237 14.2928 5.79289L11.9999 8.08579L11.2115 7.29741C10.821 6.90689 10.1878 6.90689 9.79729 7.29741C9.40676 7.68793 9.40676 8.3211 9.79729 8.71162L11.2928 10.2071C11.6833 10.5976 12.3165 10.5976 12.707 10.2071L15.707 7.20711Z" fill="#757577"></path>
                                </g>
                            </svg>
                            <span class="ml-1 self-center text-sm font-semibold text-[#757577] whitespace-nowrap">Requirements</span>
                        </div>
                        <div class="grid-requirements bg-white border-gray-300 drop-shadow-sm rounded-md p-5">
                            <div class="flex flex-wrap flex-row items-center justify-between">
                                <label for="ad_title">Add Requirements</label>
                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" type="button" onclick="on()">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM12.75 9C12.75 8.58579 12.4142 8.25 12 8.25C11.5858 8.25 11.25 8.58579 11.25 9L11.25 11.25H9C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75H11.25V15C11.25 15.4142 11.5858 15.75 12 15.75C12.4142 15.75 12.75 15.4142 12.75 15L12.75 12.75H15C15.4142 12.75 15.75 12.4142 15.75 12C15.75 11.5858 15.4142 11.25 15 11.25H12.75V9Z" fill="#1e3a8a"></path>
                                            </g>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </div>
                        @if ($requirementList != null)
                        <div class="grid-requirements bg-white border-gray-300 drop-shadow-sm rounded-md p-5">
                            <label for="requirements">Requirements</label>
                            <form action="" class="hidden"></form>
                            @foreach ($requirementList as $requirement)
                                <form action="{{ route('delete_requirement') }}" method="POST" id="form-{{ $requirement->requirement_id }}">
                                    @csrf
                                    <div class="mt-5 flex flex-row items-center justify-between">
                                        <span class="text-sm font-semibold text-gray-900">{{ $requirement->name }}</span>
                                        <input type="hidden" name="requirement_id" value="{{ $requirement->requirement_id }}">
                                        <input type="hidden" name="ad_id" value="{{ $ad->ad_id }}">
                                        <input type="hidden" name="company_id" value="{{ $company_id }}">
                                        <button class="text-red-500 mr-1.5" type="submit">
                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </form form="form-{{ $requirement->requirement_id }}">
                            @endforeach
                        </div>
                        @endif
                        <div class="grid-requirements flex flex-wrap flex-row mt-5">
                            <svg class="h-7 mx-1" version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <style type="text/css"> .linesandangles_een{fill:#757577;} </style>
                                    <path class="linesandangles_een" d="M6,6v20h20V6H6z M24,24H8V8h16V24z M15,20.414l-4.707-4.707l1.414-1.414L15,17.586l5.293-5.293 l1.414,1.414L15,20.414z"></path>
                                </g>
                            </svg>
                            <span class="ml-1 self-center text-sm font-semibold text-[#757577] whitespace-nowrap">Finishing Touches</span>
                        </div>
                        <div class="bg-white border-gray-300 drop-shadow-sm rounded-md p-5 grid-requirements">
                            <label for="Lower_salary">Salary Range (Lower Bound)</label>
                            <input form="form1" type="number" name="company_Lower_salary" id="Lower_salary" class="my-4 border-2 border-gray-200 rounded-lg p-2 w-full" required>
                            <label for="Upper_salary">Salary Range (Upper Bound)</label>
                            <input form="form1" type="number" name="company_Upper_salary" id="Upper_salary" class="my-4 border-2 border-gray-200 rounded-lg p-2 w-full" required>
                            <label for="enrollment">Choose an Enrollment:</label>
                            <select form="form1" id="enrollment" name="enrollment">
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Remote">Remote</option>
                                <option value="Internship">Internship</option>
                                <option value="Hybrid">Hybrid</option>
                            </select>
                            <input type="hidden" name="ad_id" form="form1" value="{{ $ad->ad_id }}">
                            <input type="hidden" name="company_id" form="form1" value="{{ $company_id }}">
                        </div>
                        <div class="grid-requirements w-full flex flex-row items-center justify-center">
                            <div id="error-message" class="h-auto hidden items-center p-4 text-sm text-red-800 rounded-lg dark:text-red-400" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Error!</span> Upper Bound has to be greater than Lower Bound.
                                </div>
                            </div>
                        </div>
                        <div class="grid-requirements w-full flex flex-row items-center justify-center">
                            <button type="submit" class="py-2 rounded-full bg-[#1e3a8a] px-6 w-auto flex flex-row items-center justify-center" form="form1">
                                <svg class="h-6 mx-1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#FFFFFF">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M16 2H3v20h13v-7h1v8H2V1h15v9h-1zm3.425 6.632l-.707.707L21.378 12H9v1h12.309l-2.649 2.648.707.707 3.89-3.89z"></path>
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                    </g>
                                </svg>
                                <span class="ml-1 self-center text-sm font-semibold text-white whitespace-nowrap">Submit</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form form="form1">
    </main>

    <div id="overlay" class="" onclick="off()"></div>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="z-70 relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative  rounded-lg shadow bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Create New Requirement
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal" onclick="off()">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{route('add_requirement')}}" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="hidden" name="ad_id" value={{$ad->ad_id}}>
                            <input type="hidden" name="company_id" value={{$company_id}}>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Input requirement here" required="">
                        </div>
                    </div>
                    <div class="w-full flex flex-wrap flex-row items-center justify-center">
                        <button type="submit" name="addBtn" class="text-white inline-flex items-center justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="off()">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="custom">
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
    <script>
        const container = document.querySelector('.scroll-container');

        let isDown = false;
        let startX;
        let scrollLeft;

        container.addEventListener('mousedown', (e) => {
            isDown = true;
            container.classList.add('active');
            startX = e.pageX - container.offsetLeft;
            scrollLeft = container.scrollLeft;
        });

        container.addEventListener('mouseleave', () => {
            isDown = false;
            container.classList.remove('active');
        });

        container.addEventListener('mouseup', () => {
            isDown = false;
            container.classList.remove('active');
        });

        container.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - container.offsetLeft;
            const walk = (x - startX) * 3; //scroll-fast
            container.scrollLeft = scrollLeft - walk;
        });

        // For touch events
        let startXTouch;
        let scrollLeftTouch;

        container.addEventListener('touchstart', (e) => {
            startXTouch = e.touches[0].pageX - container.offsetLeft;
            scrollLeftTouch = container.scrollLeft;
        }, { passive: true });

        container.addEventListener('touchmove', (e) => {
            const x = e.touches[0].pageX - container.offsetLeft;
            const walk = (x - startXTouch) * 3; //scroll-fast
            container.scrollLeft = scrollLeftTouch - walk;
        }, { passive: true });

        function off() {
            document.body.style.overflow = "auto";
            document.getElementById("overlay").style.display = "none";
        }

        function on() {
            document.getElementById("overlay").style.display = "block";
            document.body.style.overflow = "hidden";
        }

        document.getElementById('form1').addEventListener('submit', function(event) {
            var lowerSalary = parseFloat(document.getElementById('Lower_salary').value);
            var upperSalary = parseFloat(document.getElementById('Upper_salary').value);
            var errorMessage = document.getElementById('error-message');

            if (upperSalary < lowerSalary) {
                event.preventDefault();
                errorMessage.style.display = 'flex'; // Show error message
            } else {
                errorMessage.style.display = 'none'; // Hide error message
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            const formId = 'form1';
            const inputs = document.querySelectorAll(`input[form="${formId}"], textarea[form="${formId}"]`);

            // Function to handle input background color change
            function handleInputBackgroundChange(input) {
                if (input.value.trim() !== '') {
                    input.classList.remove('bg-gray-200');
                    input.classList.add('bg-[#e8f0fe]');
                } else {
                    input.classList.remove('bg-[#e8f0fe]');
                    input.classList.add('bg-gray-200');
                }
            }

            inputs.forEach(input => {
                input.addEventListener('input', () => {
                    handleInputBackgroundChange(input);
                });
            });

            const titleInput = document.getElementById('name');
            const descriptionInput = document.getElementById('description');
            const first_step = document.getElementById('first-step');

            function checkInputs() {
                if (titleInput.value.trim() !== '' && descriptionInput.value.trim() !== '') {
                    first_step.classList.add('bg-blue-900');
                    first_step.classList.remove('bg-gray-300');
                } else {
                    first_step.classList.remove('bg-blue-900');
                    first_step.classList.add('bg-gray-300');
                }
            }

            titleInput.addEventListener('input', checkInputs);
            descriptionInput.addEventListener('input', checkInputs);

            checkInputs();

            const selectedCategories = @json($selectedCategories); // Injecting PHP variable into JavaScript
            const second_step = document.getElementById('second-step');

            function checkSelectedCategories() {
                if (selectedCategories && selectedCategories.length > 0) {
                    first_step.classList.add('bg-blue-900');
                    first_step.classList.remove('bg-gray-300');
                    second_step.classList.add('bg-blue-900');
                    second_step.classList.remove('bg-gray-300');
                } else {
                    second_step.classList.remove('bg-blue-900');
                    second_step.classList.add('bg-gray-300');
                }
            }

            checkSelectedCategories();

            const salary = document.getElementById('Lower_salary');
            const enrollment = document.getElementById('enrollment');
            const third_step = document.getElementById('third-step');

            function checkLast() {
                if (salary.value.trim() !== '' && enrollment.value.trim() !== '') {
                    first_step.classList.add('bg-blue-900');
                    first_step.classList.remove('bg-gray-300');
                    second_step.classList.add('bg-blue-900');
                    second_step.classList.remove('bg-gray-300');
                    third_step.classList.add('bg-blue-900');
                    third_step.classList.remove('bg-gray-300');
                } else {
                    third_step.classList.remove('bg-blue-900');
                    third_step.classList.add('bg-gray-300');
                }
            }

            salary.addEventListener('input', checkLast);
            enrollment.addEventListener('input', checkLast);

            checkLast();
        });

    </script>
</body>
</html>
