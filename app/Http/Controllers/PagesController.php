<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\DataUser;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    
   public function index(Request $request)
   {
    
        $ip = $request->ip();
        $getUser = DataUser::where('ip', $ip)->first();
        $getUser = DataUser::get();
        $people = count($getUser);

        if(count($getUser) == 0){
            DataUser::create([
                'ip' => $ip,
                'name' => 'Undefined'
            ]);
            return view('home', compact($people));
        }else{
            return view('home', compact($people));
        }
        
   
   }

   public function about()
   {
    $getUser = DataUser::get();
    $people = count($getUser);
    return view('about', [
        'people' => $people
    ]);
   }

   public function catalog()
   {
        return view('catalog', [
            'catalog' => Catalog::paginate(6)
        ]);
   }
   
}
