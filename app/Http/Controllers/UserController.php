<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    //
    public function index()
    {
        return 'Hello World';
    }
    public function login()
    {
        if (View::exists('user.login')) {
            return view('user.login');
        }
        // return response()->view('errors.404');
        return abort(404);
    }
    public function process(Request $request)
    {
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);
        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Successfully Login');
        }
        return back()->withErrors(['email' => 'Login Failed'])->onlyInput('email');
    }
    public function register()
    {
        return view('user.register');
    }
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout Successfull');
    }
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6'
        ]);

        //Another way of hashing password
        // $validated['password'] = Hash::make($validated['password']);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        auth()->login($user);

        // return $user;

    }
    public function show($id)
    {
        return $id;
    }
}
