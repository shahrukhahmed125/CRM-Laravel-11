<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function login_auth(Request $request)
    {
        $request->validate([
           'email' =>'required|email|string',
           'password' => 'required|string|min:8' 
        ]);

        if(Auth::attempt($request->only('email', 'password')))
        {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->intended('AdminDashboard');
            } elseif ($user->hasRole('sales')) {
                return redirect()->intended('SalesDashboard');
            } elseif ($user->hasRole('support')) {
                return redirect()->intended('SupportDashboard');
            }
            else{
                return redirect()->intended('dashboard');
            }

            // return redirect()->intended('dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Inavlid Credentials!']);
    }

    public function register_auth(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
        
        $data = new User;
        $data->fill($request->all());
        $data->save();

        Auth::login($data);

        return redirect()->intended('dashboard');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();

        return redirect()->route('login');
    }
}
