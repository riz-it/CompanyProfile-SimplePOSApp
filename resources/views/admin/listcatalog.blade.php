@extends('templateadmin')
@section('content')
<style>
    
</style>
    <div  class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h3 class="font-bold pl-2">Catalogs</h3>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
            <p class="font-bold">Success</p>
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="flex flex-row-reverse mx-auto">
            <div class="">
                <div class="col-end-7 col-span-2 p-5">
                    <a href ="{{route('listcatalog.create')}}" class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full"><i class="fas fa-plus-circle"></i> Add</a>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap">

           <!-- component -->
            <div class="container mx-auto px-4 md:px-12">
                <div class="flex flex-wrap -mx-1 lg:-mx-4">

                @foreach ($catalog as $item)
                     <!-- Column -->
                     <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                        <div class="bg-white w-full flex items-center p-2 rounded-xl shadow border">
                            <div class="flex items-center space-x-4">
                                <img src="{{asset('images/catalogs')}}/{{$item->image}}" alt="My profile" class="w-16 h-16 rounded-full">
                            </div>
                            <div class="flex-grow p-3">
                                <div class="font-semibold text-gray-700">
                                {{$item->title}}
                                </div>
                                <div class="text-sm text-gray-500">
                                {{$item->updated_at->diffForHumans()}}
                                </div>
                                <div class="text-sm text-gray-500">
                                    <span class="no-underline text-grey-darker hover:text-red-dark">
                                    <?php for($i = 0; $i < $item->like; $i++):  ?>
                                        <?php echo " <i class='fas fa-star'></i>"; ?>
                                    <?php endfor; ?>
                                    </span>
                                </div>
                                <div class="text-sm text-gray-500">
                                    <div class="col-span-3 row-span-1">
                                        <ul
                                          class="flex flex-row pl-2 text-gray-600 overflow-x-scroll hide-scroll-bar"
                                        >
                                          @if ($item->tags_1 == Null)
                                              
                                          @else
                                            <li class="py-1">
                                              <div
                                                class="transition duration-300 ease-in-out rounded-2xl mr-1 px-2 py-1 hover:bg-blue-200 text-gray-500 hover:text-gray-800"
                                              >
                                                #{{$item->tags_1}}
                                              </div>
                                            </li>
                                          @endif
                      
                                          @if ($item->tags_2 == Null)
                                              
                                          @else
                                            <li class="py-1">
                                              <div
                                                class="transition duration-300 ease-in-out rounded-2xl mr-1 px-2 py-1 hover:bg-blue-200 text-gray-500 hover:text-gray-800"
                                              >
                                              #{{$item->tags_2}}
                                              </div>
                                            </li>
                                          @endif
                      
                                          @if ($item->tags_3 == Null)
                                              
                                          @else
                                            <li class="py-1">
                                              <div
                                                class="transition duration-300 ease-in-out rounded-2xl mr-1 px-2 py-1 hover:bg-blue-200 text-gray-500 hover:text-gray-800"
                                              >
                                              #{{$item->tags_3}}
                                              </div>
                                            </li>
                                          @endif
                                          
                                        </ul>
                                      </div>
                                </div>
                            </div>
                            
                            <form action="{{ route('listcatalog.destroy',$item->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button onclick="return confirm('are you sure?')" class="text-red-600 hover:text-red-900 mr-2"><i class="fas fa-trash fa-2x"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- END Column -->
                @endforeach
        </div>
        <div class=" p-4 mx-4">
            {{ $catalog->links() }}
        </div>
    </div>
    <style>
        .hide-scroll-bar {
      -ms-overflow-style: none;
      scrollbar-width: none;
      }
      .hide-scroll-bar::-webkit-scrollbar {
      display: none;
      }
    </style> 

@endsection
