<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('merchant.categories.create');
    }
    
    // Guarda la nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            // Validación que asegure que el nombre sea único para ese merchant
            'name' => 'required|unique:categories,name,NULL,id,merchant_id,' . Auth::id(),
        ]);
        
        Category::create([
            'name' => $request->name,
            'merchant_id' => Auth::id(),
        ]);

        
        return redirect()->route('merchant.categories.index')->with('success', 'Category created successfully.');
    }
}
