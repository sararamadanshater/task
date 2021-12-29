<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\LoginRequest;
class SupervisorController extends Controller
{
    public function login(LoginRequest $request)
    {
        
        if ($request->method() == 'POST') {
            $credentials = $request->only('email', 'password');

            if (auth('supervisor')->attempt($credentials)) {
                // return redirect()->intended('supervisor');
                return ('login success');
                
            }
           return redirect()->back()->with('danger', 'email or password is incorrect');
        } else {
            return view('supervisor.login');
        }


        
    }

    public function index(){
        $categories=Category::all();
       
        return view('supervisor.home',compact('categories'));
    }

    
}
