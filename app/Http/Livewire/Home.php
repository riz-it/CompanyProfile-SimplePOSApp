<?php

namespace App\Http\Livewire;

use App\Models\BucketUser;
use App\Models\DataUser;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public function render(Request $request)
    {
        $ip = $request->ip();
        $getUser = DataUser::where('ip', $ip)->first();
        
        return view('livewire.home', [
            'products' => Product::latest()->paginate(3),
            'user' => $getUser
        ]);
       
    }

    public function addBucket($id, $idUser)
    {
        
       $getBucket = BucketUser::where('id_product', $id)->where('status', 1)->first();
       $product = Product::where('id_product', $id)->first();
       if(empty($getBucket)){
            BucketUser::create([
                'id_user' => $idUser,
                'id_product' => $id,
                'quantity' => 1,
                'total' => $product->sale
            ]);
            
            $this->emit('refreshBody');
       }
       
       if(!empty($getBucket)){
        $quantity = $getBucket->quantity + 1;
        $total = $quantity * $product->sale;
        BucketUser::where('id_product', $id)
                ->update([
                    'id_user' => $idUser,
                    'id_product' => $id,
                    'quantity' => $quantity,
                    'total' => $total
                ]);
               
                $this->emit('refreshBody'); 
       }
    
       
   
    }

}
