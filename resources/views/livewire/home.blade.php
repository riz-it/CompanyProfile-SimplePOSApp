<div>
    <!-- component -->
    <div class=" fade-in container my-12 mx-auto px-4 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">

            @foreach ($products as $item)
            <!-- Column -->
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                
                <!-- Article -->
                <article class="overflow-hidden p-3 rounded-lg shadow-lg">
                    
                    <span class="mt-2">
                        <img alt="Placeholder" class="rounded-lg block h-auto w-full" src="{{asset('images/products')}}/{{$item->image}}">
                    </span>
                    
                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg">   
                            {{$item->title}}
                        </h1>
                        <p class="text-grey-darker text-gray-400 text-sm">
                            {{$item->created_at->diffForHumans()}}
                        </p>
                    </header>
                    <div class="flex items-center justify-between leading-tight md:p-4">
                        <h2 class="text-md">   
                            {{$item->description}}
                        </h2>
                    </div>
                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                        <div class="flex items-center no-underline  text-black">
                            <button wire:click='addBucket({{$item->id_product}}, {{$user->id_user}})' class="transition duration-500 ease-in-out bg-blue-600 hover:bg-red-600 transform hover:-translate-y-1 hover:scale-110 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                        <div class="flex flex-row-reverse">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{$item->sale}}
                            </span>
                        </div>
                    </footer>
                    
                </article>
                <!-- END Article -->
                
            </div>
            <!-- END Column -->
            @endforeach
            
        </div>
        <div class="fade-in p-4 mx-4">
            {{ $products->links() }}
        </div>
    </div>
    
    <style>
        /* CHECKBOX TOGGLE SWITCH */
        /* @apply rules for documentation, these do not work as inline style */
        .toggle-checkbox:checked {
          @apply: right-0 border-green-400;
          right: 0;
          border-color: #68D391;
        }
        .toggle-checkbox:checked + .toggle-label {
          @apply: bg-green-400;
          background-color: #68D391;
        }
        </style>
</div>
