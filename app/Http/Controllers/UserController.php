<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

//        $user = User::where([
//            'name' => $request->name,
//            'email' => $request->email
//        ])->get();


        if (User::where('email', $request->email)->exists()) {
            return redirect()
                ->route('user.regis.page')
                ->with(['error' => 'User has already exist!']);
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('user.login.page');
    }

    public function loginPage()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        // แบบที่ 1
//        $user = User::where('email', $request->email)->get()->first();

        // use Illuminate\Support\Facades\Hash;

//        if (Hash::check($request->password, $user->password)) {
            // แบบที่ 1.1

            /* Auth::login($user); */

            // แบบที่ 1.2

            /* Auth::loginUsingId($user->id); */


//            return redirect()->route('book.index');
//        }

        // แบบที่ 2
        $isAuth = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!$isAuth) {
            return redirect()->route('user.login.page');

        }
        return redirect()->route('book.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login.page');
    }

}
