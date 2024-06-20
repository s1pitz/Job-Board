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
