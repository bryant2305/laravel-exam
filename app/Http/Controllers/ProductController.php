<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Lista todos los productos del merchant autenticado
    public function index()
    {
        $products = Product::where('merchant_id', Auth::id())->with('category')->get();
        return view('merchant.products.index', compact('products'));
    }
    
    // Muestra el formulario para crear un nuevo producto
    public function create()
    {
        // Para el select de categorías, solo se muestran las del merchant
        $categories = Category::where('merchant_id', Auth::id())->get();
        return view('merchant.products.create', compact('categories'));
    }
    
    // Guarda el nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        Product::create([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'merchant_id' => Auth::id(),
        ]);
        
        return redirect()->route('merchant.products.index')->with('success', 'Product created successfully.');
    }
}
