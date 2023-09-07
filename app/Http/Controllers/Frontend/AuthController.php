<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()){
            return redirect('/');
        }
        if ($request->isMethod('post')){
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return response()->json([
                    'status' => true,
                    'message' => 'Login Success',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'These credentials do not match our records',
                ]);
            }
        }else{
            return view('frontend.auth.login');
        }
    }

    public function register(Request $request)
    {
        if (Auth::check()){
            return redirect('/');
        }

        if ($request->isMethod('post')){
            $this->validate($request, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return response()->json([
                    'status' => true,
                    'message' => 'Register Success',
                ]);
            }

        }else{
            return view('frontend.auth.register');
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['Logout Success']);
    }
}
