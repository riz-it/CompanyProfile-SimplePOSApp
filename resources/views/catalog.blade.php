@extends('welcome')
@section('content')
<!-- component -->
<!-- component -->
<div class="container slide-in-bottom bg-gray-50 rounded-lg py-2 my-8 mx-auto px-4 md:px-12">
  <div class="flex bounce-top-icons  flex-wrap -mx-1 lg:-mx-4">

      <!-- Column -->
      @foreach ($catalog as $item)
      <div class="my-1 fade-in px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

              <!-- Article -->
              <article class="overflow-hidden rounded-lg shadow-lg">

                
                    <img alt="Placeholder" class="block h-auto w-full" src="{{asset('images')}}/{{$item->image}}">
               
                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                            {{$item->title}}
                    </h1>
                    <p class="text-grey-darker text-sm">
                        {{$item->created_at->diffForHumans()}}
                    </p>
                </header>

                <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                    <div class="flex items-center no-underline text-black" >
                        <img alt="Placeholder" class="block rounded-full" width="10%" src="https://images.tokopedia.net/img/cache/215-square/shops-1/2018/7/15/3359426/3359426_84be73f9-95d6-4879-a3ec-93e280db796f.jpg">
                        <p class="ml-2 text-sm">
                            Prima Printing
                        </p>
                      </div>
                    <span class="no-underline text-grey-darker hover:text-red-dark">
                      <?php for($i = 0; $i < $item->like; $i++):  ?>
                        <?php echo " <i class='fas fa-star'></i>"; ?>
                      <?php endfor; ?>
                    </span>
                </footer>
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
            </article>
          <!-- END Article -->
          
        </div>
        @endforeach
      <!-- END Column -->
  </div>
  <div class="bounce-top-icons p-4 mx-4">
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