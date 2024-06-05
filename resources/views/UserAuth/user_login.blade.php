@extends('UserAuth.partial.base')

@section('title', 'Login Page')

@section('content')
    <div class="bg-slate-50 p-5 max-w-screen-md w-auto flex flex-row justify-center items-center gap-2 border rounded-3xl">
        <div class="bg-white shadow-slate-300 shadow-md p-5 w-96 rounded-xl">
            <h5 class="text-4xl font-bold text-left mt-2 mb-10">Login</h1>
            <div class="">
                <form action="{{route('user_login')}}" method="POST">
                    @csrf
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="my-4 border-2 border-gray-200 rounded-lg p-2 w-full" required>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="mt-4 border-2 border-gray-200 rounded-lg p-2 w-full" required>
                    <div class="mt-3 flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" name="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="">Remember me</label>
                            </div>
                        </div>
                        <a href="#" class="text-sm font-medium hover:underline dark:text-primary-500">Forgot password?</a>
                    </div>
                    <button type="submit" class="w-full border rounded-lg p-2 buttonColor my-10 text-gray-100" >Sign in</button>
                    <p class="text-sm font-light text-gray-700">
                        Don’t have an account yet? <a href="{{route('register')}}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
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
        <div class="">
            <img src="{{ asset('images/login2.png')}}" class="" alt="Login Image">
        </div>
    </div>
@endsection

{{--
    --}}
