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
<body class="bg-blue-600" style="background: linear-gradient(90deg, #2264dd, #C359CB)">
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
                    <a href="{{route('home')}}" class="navbar-animation block py-2 px-3 text-white bg-blue-500 rounded md:bg-transparent md:p-0 md:text-blue-800 md:hover:text-blue-500" aria-current="page">Back</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="w-full flex justify-center items-center h-screen">
        <div class="bg-slate-50 p-5 max-w-screen-md w-auto flex flex-row justify-center items-center gap-2 border rounded-3xl">
            <div class="sm:bg-white sm:shadow-slate-300 sm:shadow-md p-5 w-96 rounded-xl">
                <h5 class="text-4xl font-bold text-left mt-2 mb-10 background-transparent">Login</h5>
                <div class="">
                    <form action="{{route('auth_login')}}" method="POST">
                        @csrf
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="my-4 border-2 border-gray-200 rounded-lg p-2 w-full" required>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="mt-4 border-2 border-gray-200 rounded-lg p-2 w-full" required>
                        <div class="mt-3 flex justify-end">
                            <a href="#" class="text-sm font-medium hover:underline dark:text-primary-500">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full border rounded-lg p-2 buttonColor my-4 text-gray-100" >Sign in</button>
                        <p class="text-sm font-light text-gray-700">
                            Don’t have an account yet? <a href="{{route('company_register')}}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                        </p>
                        @if ($errors->any())
                        <div class="text-sm mt-5 alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
            <div class="hidden sm:block">
                <img src="{{ asset('images/company1.png')}}" class="" alt="Login Image">
            </div>
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
