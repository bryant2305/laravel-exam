<?php
namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $merchants = Merchant::all();
        return view('admin.merchants.index', compact('merchants'));
    }
    public function showLoginForm()
{
    return view('admin.login');
}

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::guard('admin')->attempt($credentials)) {
        return redirect()->route('admin.merchants.index');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}
}
