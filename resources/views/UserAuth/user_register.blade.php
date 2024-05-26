@extends('UserAuth.partial.base')

@section('title', 'Register Page')

@section('content')
    <div class="mx-auto p-10 min-h-dvh max-w-screen-md w-auto flex flex-col justify-center border rounded-3xl">
        <h2 class="text-5xl font-bold text-left mb-10">Sign Up</h1>
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
            </form>
        </div>
    </div>
@endsection

{{--
    --}}
