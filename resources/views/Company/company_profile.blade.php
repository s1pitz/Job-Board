<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company Profile</title>
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
    <form action="{{route('update_profile')}}" id="form_profile" method="POST">@csrf</form>
    <form action="{{route('update_logo')}}" id="form_logo" method="POST" enctype="multipart/form-data">@csrf</form>

    <main class="h-[calc(100vh-10rem)] mb-10">
        <div class="">
            <div class="max-w-screen-xl flex flex-wrap flex-col justify-normal mx-auto p-4">
                <div>
                    <h5 class="ml-2 mt-1 mb-2 text-xs font-semibold text-gray-400">Company / Company Profile</h5>
                    <h5 class="ml-2 text-blue-900 font-semibold">Company Profile</h5>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="max-w-screen-xl flex flex-wrap flex-row items-center justify-normal mx-auto px-6">
                <div class="grid-profile w-full gap-2 h-auto">
                    <div class="bg-white border-gray-300 drop-shadow-sm rounded-md p-10 flex flex-col items-center gap-5">
                        <div class="w-full flex flex-row items-center justify-center gap-14">
                            <div class="h-full flex flex-col items-start justify-start gap-4">
                                <div class="w-36 h-36 mt-1">
                                    @if ($company->logo != null)
                                        <img src="{{asset('company_logos/'.$company->logo)}}" class="w-36 h-36 rounded-full border-b-2 mt-2" alt="Company logo" style="object-fit: cover;">
                                    @else
                                        <img src="{{asset('images/logo-light.png')}}" class="w-fit h-fit" alt="Company logo">
                                    @endif
                                </div>
                                <div class="w-full flex items-center justify-center">
                                    <input form="form_logo" type="hidden" id="id" name="id" value={{$company->company_id}}>
                                    @if ($company->logo != null)
                                        <input form="form_logo" type="file" name="imageLogo" id="imageLogo" class="inputfile" accept="image/*" >
                                        <label for="imageLogo" class="text-sm fontEpilogue text-gray-600 hover:text-gray-900">Update Logo</label>
                                    @else
                                        <input form="form_logo" type="file" name="imageLogo" id="imageLogo" class="inputfile">
                                        <label for="imageLogo" class="text-sm fontEpilogue text-gray-600 hover:text-gray-900">Add your Logo here!</label>
                                    @endif
                                </div>
                            </div>
                            <div class="flex flex-col justify-between w-full">
                                <div class="">
                                    <label for="company_name" class="text-sm">Company Name</label>
                                    <input form="form_profile" type="name" form="form1" name="company_name" id="name" class="my-1.5 text-sm bg-gray-200 rounded-lg p-2 w-full" value="{{$company->name}}" disabled required>
                                </div>
                                <div>
                                    <label for="company_address" class="text-sm">Company Address</label>
                                    <input form="form_profile" type="name" form="form1" name="company_address" id="address" class="my-1.5 text-sm bg-gray-200 rounded-lg p-2 w-full" value="{{$company->Address}}" disabled required>
                                </div>
                                <div>
                                    <label for="phone" class="text-sm">Phone Number</label>
                                    <input form="form_profile" type="text" form="form1" name="phone" id="phone" class="my-1.5 text-sm bg-gray-200 rounded-lg p-2 w-full" value="{{$company->phone}}" disabled required>
                                </div>
                                <div>
                                    <label for="email" class="text-sm">Email</label>
                                    <input form="form_profile" type="text" form="form1" name="email" id="email" class="my-1.5 text-sm bg-gray-200 rounded-lg p-2 w-full" value="{{$company->email}}" disabled required>
                                    <input form="form_profile" type="hidden" id="company_id" name="company_id" value={{$company->company_id}}>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="py-2 rounded-full bg-[#1e3a8a] hover:bg-blue-950 px-4 w-auto flex flex-row items-center justify-center" onclick="enable()" id="edit">
                                <svg class="h-4 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <span class="ml-1 self-center text-sm font-semibold text-white whitespace-nowrap">Edit</span>
                            </button>
                            <button type="submit" form="form_profile" class="hidden py-2 rounded-full bg-[#1e3a8a] hover:bg-blue-950 px-4 w-auto flex-row items-center justify-center" id="update">
                                <svg class="h-4 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M18.4721 16.7023C17.3398 18.2608 15.6831 19.3584 13.8064 19.7934C11.9297 20.2284 9.95909 19.9716 8.25656 19.0701C6.55404 18.1687 5.23397 16.6832 4.53889 14.8865C3.84381 13.0898 3.82039 11.1027 4.47295 9.29011C5.12551 7.47756 6.41021 5.96135 8.09103 5.02005C9.77184 4.07875 11.7359 3.77558 13.6223 4.16623C15.5087 4.55689 17.1908 5.61514 18.3596 7.14656C19.5283 8.67797 20.1052 10.5797 19.9842 12.5023M19.9842 12.5023L21.4842 11.0023M19.9842 12.5023L18.4842 11.0023" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M12 8V12L15 15" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <span class="ml-1 self-center text-sm font-semibold text-white whitespace-nowrap">Update</span>
                            </button>
                        </div>
                    </div>
                </div>
                </form>
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
    @vite('resources/js/app.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        function enable(){
            document.getElementById("name").disabled = false;
            document.getElementById("address").disabled = false;
            document.getElementById("phone").disabled = false;
            document.getElementById("email").disabled = false;

            const updateButton = document.getElementById("update");
            const editButton = document.getElementById("edit");
            editButton.classList.add("hidden");
            editButton.classList.remove("flex");
            updateButton.classList.add("flex");
            updateButton.classList.remove("hidden");
        }

        document.getElementById('imageLogo').addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                document.getElementById('form_logo').submit();
            }
        });
    </script>
</body>
