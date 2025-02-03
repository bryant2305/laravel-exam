<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class MerchantController extends Controller
{
    public function showRegisterForm() {
        return view('merchant.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:merchants,email',
            'password' => 'required|min:6',
        ]);

        Merchant::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('merchant.login');
    }

    public function showLoginForm() {
        return view('merchant.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('merchant')->attempt($credentials)) {
            return redirect()->route('merchant.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function dashboard() {
        return view('merchant.dashboard');
    }

    public function storeList() {
        $stores = Store::where('merchant_id', Auth::id())->get();
        return view('merchant.store-list', compact('stores'));
    }

    public function showCreateStore() {
        return view('merchant.create-store');
    }

    public function createStore(Request $request) {
        $request->validate([
            'name' => 'required|unique:stores,name',
        ]);

        Store::create([
            'name' => $request->name,
            'merchant_id' => Auth::id(),
        ]);

        return redirect()->route('merchant.store.list');
    }
}
