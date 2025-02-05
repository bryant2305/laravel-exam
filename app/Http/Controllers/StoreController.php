<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function show($shop)
    {
        $store = Store::where('name', $shop)->firstOrFail(); 
        $categories = $store->categories()->with('products')->get(); 

        return view('shop.show', compact('store', 'categories'));
    }
}

