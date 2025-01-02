<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    public function register(Request $request)
    {
        $incomingData = $request->validate(
            [
                'name' => 'required',
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => 'required|min:8'
            ]
        );
        $incomingData['password'] = bcrypt($incomingData['password']);
        $user = User::create($incomingData);
        auth()->login($user);

        return redirect('/home');
    }
    public function login(Request $request)
    {
        $incomingData = $request->validate(
            [
                'name' => 'required',
                'password' => 'required|min:8'
            ]
        );
        if (!auth()->attempt($incomingData)) {
            return back()->with('error', 'Invalid credentials');
        } else {
            $request->session()->regenerate();
        }

        return redirect('/home');
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
