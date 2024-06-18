@extends('UserAuth.partial.base')

@section('title', 'Register Page')

@section('content')
    <div class="bg-slate-50 p-5 max-w-screen-md w-auto flex flex-row justify-center items-center gap-2 border rounded-3xl">
        <div>
            <img src="{{ asset('images/register.png')}}" class="" alt="Register Image">
        </div>
        <div class="sm:bg-white sm:shadow-slate-300 sm:shadow-md p-5 w-96 rounded-xl">
            <h2 class="text-4xl font-bold text-left mt-2 mb-8 background-transparent">Sign Up</h1>
            <div class="">
                <form action="{{route('user_register')}}" method="POST">
                    @csrf
                    <label for="name">Name</label>
                    <input type="name" name="name" id="name" class="my-4 border-2 border-gray-200 rounded-lg p-2 w-full" required>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="my-4 border-2 border-gray-200 rounded-lg p-2 w-full" required>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="mt-4 border-2 border-gray-200 rounded-lg p-2 w-full" required>
                    <div class="mt-3 flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                            <input id="accept" aria-describedby="accept" type="checkbox" class="w-4 h-4 border  rounded focus:ring-3 bg-gray-700 border-gray-600 focus:ring-primary-600 ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-600">I accept the <a class="font-medium hover:underline" href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-full border rounded-lg p-2 buttonColor my-4 text-gray-100" >Create an account</button>
                    <p class="text-sm font-light text-gray-600">
                        Already have an account? <a href="{{route('login')}}" class="font-medium hover:underline">Login here</a>
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
    </div>
@endsection

{{--
    --}}
