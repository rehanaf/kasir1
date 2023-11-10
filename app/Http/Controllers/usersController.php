<?php

namespace App\Http\Controllers;

use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    function index()
    {
        return view('users.login');
    }

    function login(Request $request)
    {
        $infologin = [
            'email' => $request->name,
            'password'=> $request->password
        ];
        if (Auth::attempt($infologin)) {
            $log = User::where('email', $request->email)->first();
            return redirect('home')->with('success','Done')->with('log',$log);
        } else {
            return redirect('/')->with('error','err')->with('info',$infologin);
        }
    }
    function register(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('/')->with('success','ok');
    }
}
