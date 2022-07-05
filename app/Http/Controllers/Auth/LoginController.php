<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();

        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ],[
            'username.required' => 'ไม่พบ Username ดังกล่าวในระบบ',
            'password.required' => 'Password ไม่ถูกต้อง',
        ]);
        if(auth()->attempt(array('username' => $input['username'],'password' => $input['password']))){
            if(auth()->user()->email_verified_at != ''){
                return redirect()->route('user.index');
            }else{
                return redirect()->route('login');
            }
        }else{
            return redirect()->route('login')->with('error', 'ไม่พบ Username ดังกล่าวในระบบ');
        }
    }

    
}
