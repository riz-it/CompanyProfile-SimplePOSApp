<div>
    <div class="my-5 bg-white p-3 border-t-4 border-green-400 bounce-top-icons">
        <div class="bg-white p-3 hover:shadow">
            <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                <span class="text-green-500">
                    <i class="fas fa-shopping-cart"></i>
                </span>
                <span>Shopping Cart</span>
            </div>
            
            <div class="grid grid-cols-3">
             <table>
                 @foreach ($buckets as $item) 
                 <tr>
                     <td class="whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="">
                                <div class="text-sm font-medium text-gray-900">
                                    ◉
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{$item->title}}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-3 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{$item->quantity}}
                        </span>
                    </td>
                    <td class="px-4 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{$item->sale}}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button wire:click='destroyProduct({{$item->id}})' class="text-red-600 hover:text-red-900"><i class="fas fa-minus"></i></button>
                    </td>
                </tr>
                @endforeach
            </table>
            
        </div>
        
        </div>
        <ul
            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
            <li class="flex items-center py-3">
                <span>User status</span>
                <span class="ml-auto"><span
                        class="bg-blue-400 py-1 px-2 rounded text-white text-sm">Registered</span></span>
            </li>
            <li class="flex items-center py-3">
                <span>Date :</span>
                <span class="ml-auto">{{date('Y-m-d')}}</span>
            </li>
            @if ($StateId !== 0)
                <li class="flex py-3">
                <input wire:model='name' class="border rounded-lg w-full p-2 mb-6 text-black border-b-2 outline-none focus:bg-gray-300" placeholder='Enter name..' type="text" name="name">
                </li>
                <li class="flex py-3">
                    <button wire:click='buyNow({{$user->id_user}})' class="transition duration-500 ease-in-out bg-purple-600 hover:bg-red-600 transform hover:-translate-y-1 hover:scale-110 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-check-circle"></i>
                    </button>
                </li>
            @endif
            
            @if ($StateId == 0)
                <li class="flex py-3">
                    <button wire:click='formName({{$user->id_user}})' @if (empty($data)) disabled="" @endif class="transition duration-500 ease-in-out bg-purple-600 hover:bg-red-600 transform hover:-translate-y-1 hover:scale-110 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Buy Now
                    </button>
                </li>
            @endif
            @if ($StateId == 0)
            <li class="flex items-center py-3">
                <span><i>Buttons can be used when you have added items.</i></span>
            </li>
            @endif
        </ul>
        <div class="bg-white w-full my-2 flex items-center p-2 rounded-xl shadow border">
            <div class="flex items-center space-x-4">
                <img src="https://images.tokopedia.net/img/cache/215-square/shops-1/2018/7/15/3359426/3359426_84be73f9-95d6-4879-a3ec-93e280db796f.jpg" alt="My profile" class="w-16 h-16 rounded-full">
            </div>
            <div class="flex-grow p-3">
                <div class="font-semibold text-gray-700">
                    Lots of your transactions : {{$transaction}}
                </div>
                <div class="text-sm text-gray-500">
                    Lots of transactions in app : {{$allTransaction}}
                </div>
            </div>
        </div>
    </div>
</div>
