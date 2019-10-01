<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function regisPage()
    {
        return view('user.regis');
    }

    public function regis(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed'
        ]);

        if (User::where('email', $request->email)->exists()){
            return redirect()
                ->route('user.regis.page')
                ->with(['error' => '๊User is already exist!']);
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('user.login.page');
    }

    public function loginPage()
    {
        return view('user.login');
    }

}
