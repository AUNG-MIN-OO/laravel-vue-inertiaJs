<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request){

        //Validate
        $formData = $request->validate([
            'name' => 'required',
            'avatar' => 'file|nullable|max:300',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        if ($request->hasFile('avatar')) {
            $formData['avatar'] = Storage::disk('public')->put('avatars' , $request->avatar);
        }

        //register
        $user = User::create($formData);

        //login
        Auth::login($user);

        //redirect
        return redirect()->route('home')->with('greet','Welcome to Laravel Inertia Vue app');
    }

    public function login(Request $request){
        //Validate
        $formData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($formData, $request->remember)){
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('greet','Welcome to Laravel Inertia Vue app');
        }

        return redirect()->back()->withErrors();
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
