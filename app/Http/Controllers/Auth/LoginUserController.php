<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest:murid', ['except' => 'logout']);
    }

    public function formLogin()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'mrd_id' => 'required|exists:admins',
            'password' => 'required'
        ]);

        if (Auth::guard('murid')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(config('murid.prefix'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('murid')->logout();
        return redirect()->route('murid.login');
    }
}