<?php

namespace App\Http\Controllers;

use App\Models\BucketUser;
use App\Models\DataUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $revenue = BucketUser::join('products', 'bucket_users.id_product', '=', 'products.id_product')->sum('total');
        $transaksiYear = BucketUser::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        $people = DataUser::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        return view('admin.dashboard', [
           'revenue' => $revenue,
           'users' => DataUser::get()->count(),
           'transactions' => BucketUser::get()->count(),
           'chart' => $transaksiYear,
           'peoples' => $people
        ]);
    }
}
