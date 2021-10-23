@extends('templateadmin')
@section('content')

    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

        <div class="bg-gray-800 pt-3">
            <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                <h3 class="font-bold pl-2">Products</h3>
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
                    <a href ="{{route('listproduct.create')}}" class="modal-open bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full"><i class="fas fa-plus-circle"></i> Add</a>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap">
            <!-- component -->
            <div class="container my-12 mx-auto px-4 md:px-12">
                <div class="flex flex-wrap -mx-1 lg:-mx-4">

                    @foreach ($products as $item)
                    <!-- Column -->
                    
                    <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                        <!-- Article -->
                        <article class="overflow-hidden rounded-lg shadow-lg">

                            <span>
                                <img alt="Placeholder" class="block h-auto w-full" src="{{asset('images/products')}}/{{$item->image}}">
                            </span>

                            <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                                <h1 class="text-lg">
                                    <span class="no-underline hover:underline text-black">
                                        {{$item->title}}
                                    </span>
                                </h1>
                                <p class="text-grey-darker text-sm">
                                    {{$item->updated_at->diffForHumans()}}
                                </p>
                            </header>
                            <div class="flex items-center justify-between leading-tight md:p-4">
                                <h2 class="text-md">   
                                    {{$item->description}}
                                </h2>
                            </div>

                            <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                                <span class="flex items-center no-underline text-black">
                                    <img alt="Placeholder" class="w-10 h-10 rounded-full" src="https://images.tokopedia.net/img/cache/215-square/shops-1/2018/7/15/3359426/3359426_84be73f9-95d6-4879-a3ec-93e280db796f.jpg">
                                    <p class="ml-2 text-sm">
                                        Prima Sablon Digital
                                    </p>
                                </span>
                                <span class="no-underline text-grey-darker hover:text-red-dark">
                                    <?php for($i = 0; $i < $item->rating; $i++):  ?>
                                    <?php echo " <i class='fas fa-star'></i>"; ?>
                                    <?php endfor; ?>
                                </span>
                            </footer>
                            <div class="flex justify-end mb-6">
                                <form class="px-5 py-2" action="{{ route('listproduct.destroy',$item->id_product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class=" text-yellow-600 hover:text-yellow-900 mr-6" href="{{ route('listproduct.edit',$item->id_product) }}"><i class="fas fa-2x fa-edit"></i></a>
                                    <button onclick="return confirm('are you sure?')" class="text-red-600 hover:text-red-900 mr-2"><i class="fas fa-trash fa-2x"></i></button>
                                </form>
                            </div>
                        </article>
                        <!-- END Article -->
                        
                    </div>
                    <!-- END Column -->
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection
