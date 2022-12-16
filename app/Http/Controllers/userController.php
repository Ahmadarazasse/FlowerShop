<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;


use App\Models\User;

class userController extends Controller
{
    public function index(Request $request)
    {
        if (session()->get('user_email') != null) {
            $request->session()->forget('user_email');
            return view('signin');
        }

        if ($request->input('email') == "" && $request->input('password') == "") {
            return view('signin');
        }else {
           $user = User::where('email' ,'=' , $request->input('email'))->where('password' ,'=' , $request->input('password'))->get();
            if (empty($user[0]['email'])) {
                return redirect('users')->with(['error' => 'Wrong Email or Passowrd']);
            }else {
                
                $request->session()->put('user_email', $user[0]['email']);
                return to_route('flowers.index');
            }
        }
    }

  
    public function create()
    {
        return view('signup');
    }

  
    public function store(Request $request)
    {   
        $user = User::where('email' ,'=' , $request->input('email'))->get();
        if (empty($user[0]['email'])) {
            
            if ($request->input('password') != $request->input('cpassword')) {
                return to_route('users.create')->with(['error' => 'Passowrd does not match']);
            }
            $vaildateData = $request->validate(
                [
                    'name' => ['required' , 'max:55'],
                    'email' => ['required'],
                    'password' => ['required' , 'min:8' ,],
                ]    
            );
            User::create($vaildateData);

            return redirect('/flowers')->with(["sucssesmessage" => "User created Please Sing in"]);

        } else {
            return to_route('users.create')->with(['emailerror' => 'Email is in Use']);
        }

    }

 
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request,  $id)
    {
        //
    }

  
    public function destroy($id)
    {
       
    }

}
