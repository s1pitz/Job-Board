@extends('partial.base')

@section('title', 'Home Page')

@section('content')

    <div id="overlay" class="" onclick="off()"></div>

    <div id="popup" class="fixed top-2/4 left-2/4 -translate-x-2/4 -translate-y-2/4 my-auto mx-auto p-10 min-h-96 max-h-screen max-w-screen-lg w-11/12 flex flex-col flex-wrap justify-items-start bg-slate-100 border rounded-2xl">
        <div class="flex flex-row mb-10">
            <div class="flex mr-24">
                <div class="flex items-center mr-5 w-12">
                    <img class="w-12 h-12 rounded-full border border-gray-200" src="{{asset('images/logo-light.png')}}" alt="logo image"/>
                </div>
                <div class="flex flex-col">
                    <h5 id="popupTitle" class="mb-1 text-xl font-medium text-gray-900"></h5>
                    <h5 id="popupAddress" class="mb-1 text-base font-medium text-gray-500 "></h5>
                </div>
            </div>
            <div class="flex items-center">
                <span id="popupEnrollment" class="p-1 text-blue-500 border border-blue-500"></span>
            </div>
        </div>
        <div class="flex flex-row h-80">
            <div class="flex mr-24">
                <div class="flex items-center mr-5 w-12"></div>
                <div class="flex flex-col">
                    <h5 id="popupDescription" class="mb-1 text-base font-medium text-gray-500"></h5>
                </div>
            </div>
        </div>
        <div class="mr-10 flex justify-end">
            @auth
                <div class="">
                    {{-- <input type="hidden" id="company_id" name="company_id">
                    <input type="hidden" id="ad_id" name="ad_id"> --}}
                    <button onclick="addCV()" class="font-bold text-xs py-2 px-8 border border-blue-950 fontEpilogue rounded-full">Apply Now</button>

                </div>
            @else
                <div class="">
                    <form action="{{route('login')}}" method="GET">
                        @csrf
                        <input type="hidden" id="company_id" name="company_id">
                        <input type="hidden" id="ad_id" name="ad_id">
                        <button type="submit" class="font-bold text-xs py-2 px-8 border border-blue-950 fontEpilogue rounded-full">Sign In</button>
                    </form>
                </div>
            @endauth
        </div>
    </div>

    <form action="{{route('create_listing')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="CV" class="fixed top-2/4 left-2/4 -translate-x-2/4 -translate-y-2/4 my-auto mx-auto p-10 min-h-96 max-h-screen max-w-screen-lg w-11/12 flex flex-col flex-wrap justify-center gap-6 bg-slate-100 border rounded-2xl">
            <input type="hidden" id="company_id" name="company_id">
            <input type="hidden" id="ad_id" name="ad_id">
            <div class="w-full border border-blue-800 rounded-lg py-10 flex flex-row justify-center">
                <input type="file" name="fileCV" id="fileCV" class="inputfile" required>
                <label for="fileCV" class="text-base fontEpilogue text-gray-600">Add your CV here!</label>
            </div>
            <div class="w-full border border-blue-800 rounded-lg py-10 flex flex-row justify-center">
                <input type="file" name="filePortofolio" id="filePortofolio" class="inputfile" required>
                <label for="filePortofolio" class="text-base fontEpilogue text-gray-600">Add your Portfolio here!</label>
            </div>
            <div>
                <h5 class="text-sm text-gray-400 text-center fontEpilogue">Make sure to include your contact information on your CV</h5>
            </div>
            <div class="w-full flex flex-row justify-center">
                <button type="submit" class="font-bold text-xs py-2 px-8 border border-blue-950 fontEpilogue rounded-full">Submit</button>
            </div>
        </div>
    </form>

    @if($successfull == true)
    <div id="overlayOn" class="" onclick="off()"></div>

    <div id="popSuccessfull" class="fixed top-2/4 left-2/4 -translate-x-2/4 -translate-y-2/4 my-auto mx-auto px-10 pb-10 min-h-96 max-h-screen max-w-screen-lg w-11/12 flex flex-col flex-wrap justify-items-start bg-slate-50 border rounded-2xl" onclick="off()">
        <div class="flex flex-row justify-center">
            <img class="w-96" src="{{asset('images/successfull.png')}}" alt="">
        </div>
        <div class="mt-5 mb-2">
            <h5 class="text-2xl text-gray-700 font-semibold text-center fontEpilogue mb-0">Your Application Submitted!</h5>
        </div>
        <div>
            <h5 class="text-base text-gray-400 text-center fontEpilogue">The Recruiter will contact you soon</h5>
        </div>
        <div class="mt-6 mb-1">
            <h5 class="text-base text-slate-400 text-center fontEpilogue">Click anywhere to main page</h5>
        </div>
    </div>
    @endif

    <img src="{{asset('images/banner.png')}}" class="w-full" alt="banner">
    <div class="mt-7 mb-3 flex flex-col items-center justify-center">
        <h1 class="text-2xl text-gray-700 font-semibold text-center fontEpilogue">Hiring Companies</h1>
    </div>

    <div class="flex flex-row items-center justify-center flex-wrap gap-y-4 my-4 fontEpilogue mx-10">
        @foreach($logos as $logo)
            <div class="w-[calc(20%)] flex flex-col h-24 items-center border">
                <img src="{{asset('company_logos/'.$logo->logo)}}" class="h-24" alt="Company logo" style="object-fit: cover;">
            </div>
        @endforeach
    </div>

    <div class="mt-7 mb-3 flex flex-col items-center justify-center">
        <h1 class="text-2xl text-gray-700 font-semibold text-center fontEpilogue">Jobs Available</h1>
    </div>

    <div class="flex flex-row items-center justify-center flex-wrap gap-y-4 my-4 fontEpilogue mx-10 gap-x-4">
        @foreach($availableads as $availablead)
        <a href="#" onclick="on({{json_encode($availablead)}})">
            <div class="w-64 h-64 bg-white border border-gray-200 rounded-lg shadow ">
                <div class="flex flex-col pb-10">
                    <div class="pt-2 px-5 w-full flex flex-row items-center justify-between">
                        <img src="{{asset('company_logos/'.$availablead->logo)}}" class="mt-2 w-14 h-14 rounded-full border" alt="Company logo" style="object-fit: contain;">

                        <span class="p-1 border border-blue-500 text-blue-500">{{$availablead->enrollment}}</span>
                    </div>
                    <div class="mx-5 mt-2">
                        <h5 class="only-1-lines mb-1 text-xl font-medium text-gray-900 ">{{$availablead->title}}</h5>
                    </div>
                    <div class="mx-5 whitespace-nowrap">
                        <h5 class="only-1-lines mb-1 text-base font-medium text-gray-500 ">{{$availablead->Address}}</h5>
                    </div>
                    <div class="mx-5 mt-2 only-1-lines">
                        <h5 class="mb-1 text-base font-medium text-gray-500 ">{{$availablead->description}}</h5>
                    </div>
                    <div class="mt-5 mx-5">
                        <div class="scroll-container overflow-x-scroll" style="-ms-overflow-style: none; scrollbar-width: none;" >
                            <ul id="listCategories" class=" whitespace-nowrap">
                                @foreach($categories as $category)
                                    @if ($category->ad_id == $availablead->ad_id)
                                        <li>
                                            <button class="px-5 py-2 rounded-l-full rounded-r-full text-base" style="background-color: {{ $category->background_color }}; color: {{ $category->text_color }}">
                                                {{$category->name}}
                                            </button>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <div id="overlayWait" class="" onclick="offWait()"></div>
    <div id="popUpWait" class="fixed top-2/4 left-2/4 -translate-x-2/4 -translate-y-2/4 my-auto mx-auto px-10 pb-10 min-h-96 max-h-screen max-w-screen-lg w-11/12 flex flex-col flex-wrap justify-items-start bg-slate-50 border rounded-2xl" onclick="off()">
        <div class="flex flex-row justify-center">
            <img class="w-96" src="{{asset('images/successfull.png')}}" alt="">
        </div>
        <div class="mt-5 mb-2">
            <h5 class="text-2xl text-gray-700 font-semibold text-center fontEpilogue mb-0">Your Application Submitted!</h5>
        </div>
        <div>
            <h5 class="text-base text-gray-400 text-center fontEpilogue">The Recruiter will contact you soon</h5>
        </div>
        <div class="mt-6 mb-1">
            <h5 class="text-base text-slate-400 text-center fontEpilogue">Click anywhere to main page</h5>
        </div>
    </div>

    @auth

    @if($activeads->count() > 0)
        <div class="mt-7 mb-3 flex flex-col items-center justify-center">
            <h1 class="text-2xl text-gray-700 font-semibold text-center fontEpilogue">Active Listings</h1>
        </div>
    @endif
    <div class="flex flex-row items-center justify-center flex-wrap gap-y-4 my-4 fontEpilogue mx-10 gap-x-4">
        @foreach($activeads as $activead)
        <a href="#" onclick="wait()">
            <div class="w-64 h-64 bg-white border border-gray-200 rounded-lg shadow ">
                <div class="flex flex-col pb-10">
                    <div class="pt-2 px-5 w-full flex flex-row items-center justify-between">
                        <img src="{{asset('company_logos/'.$activead->logo)}}" class="mt-2 w-14 h-14 rounded-full border" alt="Company logo" style="object-fit: cover;">

                        <span class="p-1 border border-blue-500 text-blue-500">{{$activead->enrollment}}</span>
                    </div>
                    <div class="mx-5 mt-2">
                        <h5 class="only-1-lines mb-1 text-xl font-medium text-gray-900 ">{{$activead->title}}</h5>
                    </div>
                    <div class="mx-5 whitespace-nowrap">
                        <h5 class="only-1-lines  mb-1 text-base font-medium text-gray-500 ">{{$activead->Address}}</h5>
                    </div>
                    <div class="mx-5 mt-2 only-1-lines">
                        <h5 class="mb-1 text-base font-medium text-gray-500 ">{{$activead->description}}</h5>
                    </div>
                    <div class="mt-5 mx-5">
                        <div class="scroll-container overflow-x-scroll" style="-ms-overflow-style: none; scrollbar-width: none;" >
                            <ul id="listCategories" class=" whitespace-nowrap">
                                @foreach($categories as $category)
                                    @if ($category->ad_id == $activead->ad_id)
                                        <li>
                                            <button class="px-5 py-2 rounded-l-full rounded-r-full text-base" style="background-color: {{ $category->background_color }}; color: {{ $category->text_color }}">
                                                {{$category->name}}
                                            </button>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    @endauth
@endsection


<script>
function on(company) {

    document.getElementById("company_id").value = company.company_id;
    document.getElementById("ad_id").value = company.ad_id;
    document.getElementById("popupTitle").innerText = company.title;
    document.getElementById("popupAddress").innerText = company.Address;
    document.getElementById("popupEnrollment").innerText = company.enrollment;
    document.getElementById("popupDescription").innerText = company.description;

    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "flex";
    console.log("clicked");
    document.body.style.overflow = "hidden";
}

function wait(){
    document.getElementById("overlayWait").style.display = "block";
    document.getElementById("popUpWait").style.display = "flex";
    document.body.style.overflow = "hidden";
}

function offWait(){
    document.body.style.overflow = "auto";
    document.getElementById("popUpWait").style.display="none";
    document.getElementById("overlayWait").style.display = "none";
}

function off() {
    document.body.style.overflow = "auto";
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
    document.getElementById("CV").style.display="none";
    document.getElementById("popSuccessfull").style.display="none";
    document.getElementById("overlayOn").style.display="none";
}

function addCV(){
    document.getElementById("popup").style.display="none";
    document.getElementById("CV").style.display="flex";
}

function switchPopup(){
    document.getElementById("overlay").style.display = "block";
}
</script>

