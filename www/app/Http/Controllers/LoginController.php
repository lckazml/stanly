<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/user/index';
    public function login(){
        return view('login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function dologin(Request $request){
        $user=User::where('username',$request->username)->firstOrFail();
        if(Hash::check($request->password,$user->password)){
            session(['uid'=>$user->id]);
            return redirect('admin');
        }else{
            return back()->with('info','登陆失败');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }

}
