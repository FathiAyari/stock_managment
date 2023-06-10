<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products=Product::all()->count();
        $clients=Client::all()->count();
        $currentDate = Carbon::now()->toDateString();
        $sum = Sale::whereDate('created_at', $currentDate)->sum('price');

          return response()->json( ["products"=>$products,"clients"=>$clients,"sum"=>$sum], 200);

    }
}
