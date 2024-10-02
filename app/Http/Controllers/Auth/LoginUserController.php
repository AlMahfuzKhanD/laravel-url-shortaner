<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function index(){
        return view('auth.login');
    } // end index

    public function login(Request $request){
        $notification = array(
            'message' => 'Something Went Wrong!',
            'alert-type' => 'warning'
        );

        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if(Auth::attempt($credentials)){
                $request->session()->regenerate();

                $notification = array(
                    'message' => 'Login Successful!',
                    'alert-type' => 'Success'
                );
            
                return redirect()->intended('dashboard')->with($notification);

            }

        } catch (\Exception $e) {
            dd($e->getMessage());
            $message = $e->getMessage();
            $notification = array(
                'message' => $message,
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }

}
