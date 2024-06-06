<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {

//        dd(123);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        return User::create($data);
    }

    public function login(Request $request)
    {
        if (Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = $request->user()->createToken('profit-dig');
            $user = Auth::user()->load(['company.companyRate', 'company.companyLogo']);
            return [
                'user' => $user,
                'token' => $token->plainTextToken
            ];
        }
    }
}
