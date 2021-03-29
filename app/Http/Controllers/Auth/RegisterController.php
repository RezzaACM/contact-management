<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * GET /register
     */
    public function index()
    {
        $role = new Role();
        $getRole = $role->getRoles();
        $data['roles'] = $getRole;
        return view('auth.register', $data);
    }


    /**
     * POST /register
     */
    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6|required',
            'user_role' => 'required'

        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput($request->all());
        }

        $user = new User();
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = $request->input('user_role');
        $user->save();
        if(Auth::check()){
            return redirect('/admin-management')->with('success', 'User created successfully.');
        }else{

            return redirect('/login')->with('success', 'User created successfully.');
        }
    }
}
