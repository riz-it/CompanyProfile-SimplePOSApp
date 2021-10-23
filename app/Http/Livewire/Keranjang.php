<?php

namespace App\Http\Livewire;

use App\Models\BucketUser;
use App\Models\DataUser;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Keranjang extends Component
{
    protected $listeners = [
        'refreshBody' => '$refresh'
    ];

    public $StateId = 0;
    public $name = '';
    
    public function render(Request $request)
    {
        $ip = $request->ip();
        $getUser = DataUser::where('ip', $ip)->first();
        return view('livewire.keranjang',  [
            'buckets' => BucketUser::join('products', 'bucket_users.id_product', '=', 'products.id_product')->where('quantity', '>', 0)->where('status', 1)->get(),
            'user' => $getUser,
            'allTransaction' => BucketUser::groupBy('id_user')->count(),
            'transaction' => count(BucketUser::join('products', 'bucket_users.id_product', '=', 'products.id_product')->where('quantity', '>', 0)->get()),
            'data' => count(BucketUser::join('products', 'bucket_users.id_product', '=', 'products.id_product')->where('quantity', '>', 0)->where('status', 1)->get())
        ]);
    }

    public function destroyProduct($id)
    {
        
        $getBucket = BucketUser::where('id', $id)->first();
        $quantity = $getBucket->quantity;
        if($quantity <= 1){
            BucketUser::where('id', $id)
            ->delete();
        }else{
            BucketUser::where('id', $id)
            ->update([
                'quantity' => $getBucket->quantity - 1
            ]);
        }
        $this->emit('refreshBody');
    }

    public function formName($id)
    {
        $this->StateId = $id;
    }

    public function buyNow($id)
    {
        DataUser::where('id_user', $id)
            ->update([
                'name' => $this->slug
            ]);
        
            $dataBucket = BucketUser::join('products', 'bucket_users.id_product', '=', 'products.id_product')->select('title', 'quantity')->where('id_user', $id)->where('status', 1)->where('quantity', '>', 0)->get();
            $ber = '';
            foreach ($dataBucket as $value) {
                $ber .= "$value->title%20sebanyak%20$value->quantity,%20";
            }
            
        BucketUser::where('id_user', $id)->update(['status' => 0]);
        $url = 'https://wa.me/088227061867?text=Halo%20Admin%20saya%20'.$this->name.'%20mau%20beli%20' . $ber . '%20trimakasih';
        return redirect($url);
    }
}
