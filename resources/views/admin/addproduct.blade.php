@extends('templateadmin')
@section('content')
<style>
    .rating {
      float:left;
    }

    /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
      follow these rules. Every browser that supports :checked also supports :not(), so
      it doesn’t make the test unnecessarily selective */
    .rating:not(:checked) > input {
        position:absolute;
        top:-9999px;
        clip:rect(0,0,0,0);
    }

    .rating:not(:checked) > label {
        float:right;
        width:1em;
        /* padding:0 .1em; */
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:300%;
        /* line-height:1.2; */
        color:#ddd;
    }

    .rating:not(:checked) > label:before {
        content: '★ ';
    }

    .rating > input:checked ~ label {
        color: dodgerblue;
        
    }

    .rating:not(:checked) > label:hover,
    .rating:not(:checked) > label:hover ~ label {
        color: dodgerblue;
        
    }

    .rating > input:checked + label:hover,
    .rating > input:checked + label:hover ~ label,
    .rating > input:checked ~ label:hover,
    .rating > input:checked ~ label:hover ~ label,
    .rating > label:hover ~ input:checked ~ label {
        color: dodgerblue;
        
    }

    .rating > label:active {
        position:relative;
        top:2px;
        left:2px;
    }
</style>
    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h3 class="font-bold pl-2">Add Product</h3>
            </div>
        </div>

        <div class="container p-5">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid ">
                    <div class="px-4 my-5 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Product Information</h3>
                    </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('listproduct.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                      <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                          <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="first_name" autocomplete="given-name" class="sm:h-4/6 px-2  mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                              </div>
                
                              <div class="col-span-6 sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Ratings</label>
                                <div class="container">
                                    <div class="row">
                                    <div class="rating">
                                      <input type="radio" onclick="myfunction()" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
                                      <input type="radio" onclick="myfunction()" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
                                      <input type="radio" onclick="myfunction()" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
                                      <input type="radio" onclick="myfunction()" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big tim">2 stars</label>
                                      <input type="radio" onclick="myfunction()" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
                                    </div>
                                    </div>
                                </div>
                              </div>
                            <input type="hidden" id="rating" name="rating" value="0">
              
                            <div class="col-span-6 ">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">
                                      Cover photo
                                    </label>
                                    <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                      <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                          <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                          <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="image" type="file" class="sr-only">
                                          </label>
                                          <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                          PNG, JPG, GIF up to 10MB
                                        </p>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">Description</label>
                                <input type="text" name="description" id="first_name" autocomplete="given-name" class="px-2 h-5/6 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Price</label>
                                <input type="number" name="price" id="last_name" autocomplete="family-name" class="px-2 mt-1 h-5/6 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                          </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <a href="{{route('listproduct.index')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
<script>
    function myfunction() {
        var radio1=$('input[type="radio"]:checked').val();
        $('#rating').val(radio1);
    }
</script>
@endsection
