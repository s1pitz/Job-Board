<nav class="bg-white border-gray-200 border-b-2">
    <div class="max-w-full flex flex-wrap items-center justify-between mx-5 p-5">
        <a href="{{route('home')}}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo-light.png')}}" class="h-8" alt="Job Board Logo" />
            <span class="self-center text-2xl font-semibold text-blue-800 whitespace-nowrap italic">Job Board</span>
        </a>
        <div class="hidden min-[1150px]:flex px-4 pt-4 pb-3 flex-row items-center justify-center gap-24 mt-1 border border-opacity-25 border-[#bfc7db] rounded-2xl shadow-sm shadow-gray-200">
            <div class="flex flex-row gap-2 items-center">
                <div class="flex flex-row gap-4">
                    <svg class="h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#234CB7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </g>
                    </svg>
                    <div class="flex flex-col justify-center gap-2">
                        <input type="text" class="pl-2 font-sans h-4 text-xs font-medium" placeholder="Job title or keyword">
                        <hr class="">
                    </div>
                </div>
                <div class="flex flex-row gap-4 items-center h-full">
                    <div>
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="bg-transparent" type="button">
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="#234CB7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden divide-y divide-gray-100 rounded-lg shadow w-44 bg-gray-700">
                            <ul class="py-2 text-sm text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#" id="" onclick="" class="block px-4 py-2  hover:bg-gray-600 hover:text-white ">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-white">Earnings</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-600 hover:text-white">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center gap-2">
                        <input type="text" class="bg-transparent font-sans h-4 text-xs font-medium" placeholder="Category" disabled>
                        <hr class="">
                    </div>
                </div>
                <div>
                    <button class="px-8 py-2 text-xs font-sans bg-[#234CB7] text-white rounded-[26.65px]">Search My Job</button>
                </div>
            </div>
        </div>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-blue-700 rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-300 hover:bg-blue-200 " aria-controls="navbar-default" aria-expanded="false">
            <svg class="w-5 h-5" aria-hidden="true"  fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 custom md:border-0 md:bg-transparent border-gray-700">
            <li class="navbarli">
                <a href="{{route('home')}}" class="navbar-animation block py-2 px-3 text-white bg-blue-500 rounded md:bg-transparent md:p-0 md:text-blue-800 md:hover:text-blue-500" aria-current="page">Home</a>
            </li>
            <li class="navbarli">
                <a href="#" class="navbar-animation block py-2 px-3 text-white rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-500 md:p-0 md:text-blue-800 md:dark:hover:bg-transparent" onclick="ongoing()">Events</a>
            </li>
            @auth
                <li class="navbarli">
                    <form id="HEHE" action="{{route("user_logout")}}" method="POST">
                        @csrf
                        <a href="#" onclick="logoutFunction()" class="navbar-animation block py-2 px-3 text-white rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-500 md:p-0 md:text-blue-800 md:dark:hover:bg-transparent">Logout</a>
                    </form>
                    <script>
                        function logoutFunction() {
                            document.getElementById("HEHE").submit();
                        }
                    </script>
                </li>
            @else
                <li class="navbarli">
                    <a href="{{route('login')}}" class="navbar-animation block py-2 px-3 text-white rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-500 md:p-0 md:text-blue-800 md:dark:hover:bg-transparent">Sign In</a>
                </li>
            @endauth
            <li class="navbarli">
                <a href="{{route('company')}}" class="navbar-animation block py-2 px-3 text-white rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-blue-500 md:p-0 md:text-blue-800 md:dark:hover:bg-transparent">Company</a>
            </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function ongoing() {
        alert("Future Update!");
    }
</script>
