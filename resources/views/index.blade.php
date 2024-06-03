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
                <input type="file" name="fileCV" id="fileCV" class="inputfile">
                <label for="fileCV" class="text-base fontEpilogue text-gray-600">Add your CV here!</label>
            </div>
            <div class="w-full border border-blue-800 rounded-lg py-10 flex flex-row justify-center">
                <input type="file" name="filePortofolio" id="filePortofolio" class="inputfile">
                <label for="filePortofolio" class="text-base fontEpilogue text-gray-600">Add your Portofolio here!</label>
            </div>
            <div class="w-full flex flex-row justify-center">
                <button type="submit" class="font-bold text-xs py-2 px-8 border border-blue-950 fontEpilogue rounded-full">Submit</button>
            </div>
        </div>
    </form>

    <img src="{{asset('images/banner.png')}}" class="w-full" alt="banner">

    <div class="mt-7 mb-3 flex flex-col items-center justify-center">
        <h1 class="text-2xl text-gray-700 font-semibold text-center fontEpilogue">Jobs Available</h1>
    </div>

    <div class="flex flex-row items-center justify-center flex-wrap gap-y-4 my-4 fontEpilogue mx-10 gap-x-4">
        @foreach($companies as $company)
        <a href="#" onclick="on({{json_encode($company)}})">
            <div class="w-64 h-64 bg-white border border-gray-200 rounded-lg shadow ">
                <div class="flex flex-col pb-10">
                    <div class="pt-2 px-5 w-full flex flex-row items-center justify-between">
                        <img class="mt-3 w-14 h-14 mb-3 rounded-full border" src="{{asset('images/logo-light.png')}}" alt="logo image"/>

                        <span class="p-1 border border-blue-500 text-blue-500">{{$company->enrollment}}</span>
                    </div>
                    <div class="mx-5 ">
                        <h5 class="mb-1 text-xl font-medium text-gray-900 ">{{$company->title}}</h5>
                    </div>
                    <div class="mx-5 whitespace-nowrap">
                        <h5 class="mb-1 text-base font-medium text-gray-500 ">{{$company->Address}}</h5>
                    </div>
                    <div class="mx-5 mt-2 only-3-lines">
                        <h5 class="mb-1 text-base font-medium text-gray-500 ">{{$company->description}}</h5>
                    </div>
                    <div class="mx-5">
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
@endsection


<script>
function on(company) {

    console.log(company);
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

function off() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
    document.getElementById("CV").style.display="none";
    document.body.style.overflow = "auto";
}

function addCV(){
    document.getElementById("popup").style.display="none";
    document.getElementById("CV").style.display="flex";
}
</script>

