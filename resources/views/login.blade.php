@extends('welcome')
@section('content')
<div class="fade-in flex h-screen bg-indigo-800">
    <div class="max-w-xs w-full slide-in-bottom-h1 m-auto bg-indigo-100 fade-in rounded p-5">
        <header>
            <img class="w-20 mx-auto mb-5" src="https://img.icons8.com/fluent/344/year-of-tiger.png" />
        </header>
        <form action="{{url('verified_login')}}" method="POST" id="logForm">
         @csrf
            <div>
                <label class="block mb-2 text-indigo-500" for="username">Username</label>
                <input autocomplete="off" class="border rounded-lg w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="text" name="username">
            </div>
            <div>
                <label class="block mb-2 text-indigo-500" for="password">Password</label>
                <input class="border rounded-lg w-full p-2 mb-6 text-indigo-700 border-b-2 border-indigo-500 outline-none focus:bg-gray-300" type="password" name="password">
            </div>
            <div>          
                <button class="w-full bg-indigo-700 hover:bg-pink-700 text-white font-bold py-2 px-4 mb-6 rounded-lg" type="submit">Login</button>
            </div>       
        </form>
        @if(Session::get('fail'))
          <div class="relative px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
            <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                <i class="fas fa-times-circle"></i>
            </span>
            <p class="ml-6">{{ Session::get('fail') }}</p>
          </div>
        @endif
        @if(Session::get('success'))
            <div class="relative px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
                <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                    <i class="fas fa-check-circle"></i>
                </span>
                <p class="ml-6">{{ Session::get('success') }}</p>
            </div>
        @endif
       
    </div>
</div>
@endsection