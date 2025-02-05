<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function show($shop)
    {
        $store = Store::where('name', $shop)->firstOrFail(); // Buscar la tienda por nombre
        $categories = $store->categories()->with('products')->get(); // Obtener categorías con productos

        return view('shop.show', compact('store', 'categories'));
    }
}

