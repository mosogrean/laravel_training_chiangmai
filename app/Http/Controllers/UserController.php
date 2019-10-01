<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

//        $user = User::where('email', $request->email)->get();
//        dd($user);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('user.login.page');
    }

    public function loginPage()
    {
        return view('user.login');
    }

}
