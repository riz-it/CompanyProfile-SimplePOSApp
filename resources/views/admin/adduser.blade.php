@extends('templateadmin')
@section('content')

    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h3 class="font-bold pl-2">Add User</h3>
            </div>
        </div>

        <div class="container p-5">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid ">
                    <div class="px-4 my-5 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                    </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('listuser.store') }}" method="POST">
                    @csrf
                      <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                          <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6">
                                <label for="street_address" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" name="name" id="street_address" autocomplete="street-address" class=" h-5/6 px-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                              <label for="first_name" class="block text-sm font-medium text-gray-700">Username</label>
                              <input type="text" name="username" id="first_name" autocomplete="given-name" class="px-2 h-5/6 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
              
                            <div class="col-span-6 sm:col-span-3">
                              <label for="last_name" class="block text-sm font-medium text-gray-700">Password</label>
                              <input type="text" name="password" id="last_name" autocomplete="family-name" class="px-2 mt-1 h-5/6 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
              
                            <div class="col-span-6 sm:col-span-4">
                              <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                              <input type="text" name="email" id="email_address" autocomplete="email" class="px-2 mt-1 h-5/6 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                          </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <a href="{{route('listuser.index')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Back
                          </a>
                          <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>

@endsection
