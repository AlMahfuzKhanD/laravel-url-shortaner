<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function index(){
        return view('auth.register');
    } // end index

    public function store(Request $request){
        
        $notification = array(
            'message' => 'Something Went Wrong!',
            'alert-type' => 'warning'
        );
        DB::beginTransaction();
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $ipAddress = $request->ip();

            $user = User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_ip' => $ipAddress
            ]);


            $notification = array(
                'message' => 'User created successfully!',
                'alert-type' => 'Success'
            );
            
            DB::commit();
            return redirect()->route('login')->with($notification);
            
        } catch (\Exception $e) {

            DB::rollback();
            dd($e->getMessage());
            $message = $e->getMessage();
            $notification = array(
                'message' => $message,
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    } // end store
}
