<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class AuthController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        $formData=request()->validate([
            'name'=>['required','max:255','min:3'],
            'username'=>['required','min:3',Rule::unique('users','username')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:8']
        ]);
        $user=User::create($formData);
        auth()->login($user);
        session()->flash('success','Welcome Dear,'.$user->name);
        return redirect('/');
    }

    public function login(){
        return view('auth.login');

    }

    public function post_login(){
        $formData=request()->validate([
            'email'=>['required','email','max:255',Rule::exists('users','email')],
            'password'=>['required','max:255']
        ]);
        if(auth()->attempt($formData)){
            if(auth()->user()->is_admin){
                return redirect('/admin/blogs');
            }
            else{
                return redirect('/')->with('success','Welcome Back');
            } 
        }
        else{
            return redirect()->back()->withErrors([
                'email'=>'User Credentials wrong']);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success','Good Bye........');
    }
}
