<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
class CategoryController extends Controller
{
    // Lista todas las categorías del merchant autenticado
    public function index()
    {
        
        $categories = Category::where('merchant_id', Auth::id())->get();
        return view('merchant.categories.index', compact('categories'));
    }
    
    // Muestra el formulario para crear una nueva categoría
    public function create()
    {
        $stores = Store::where('merchant_id', Auth::id())->get();
        return view('merchant.categories.create', compact('stores'));
    }
    
    // Guarda la nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            // Validación que asegure que el nombre sea único para ese merchant
            'name' => 'required|unique:categories,name,NULL,id,merchant_id,' . Auth::id(),
            'store_id' => 'required|exists:stores,id',
        ]);
        
        Category::create([
            'name' => $request->name,
            'merchant_id' => Auth::id(),
            'store_id' => $request->store_id,
        ]);

        
        return redirect()->route('merchant.categories.index')->with('success', 'Category created successfully.');
    }
}
