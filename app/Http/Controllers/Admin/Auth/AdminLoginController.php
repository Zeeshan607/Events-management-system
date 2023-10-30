<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    //
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard/';

    public function __construct()
    {
        $this->middleware('guest')->except('adminLogout');
    }

    public function showLoginForm(){
        return view('admin.auth.login');
    }

    protected function guard(){
        return Auth::guard("admin");
    }


    public function adminLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);
//
//        dd($request);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
//
            return redirect()->intended('/admin/dashboard/');
        }
        return back()->withInput($request->only('email', 'remember'))->withErrors(["Incorrect Credentials"]);
    }




    public function adminLogout(Request $request)
    {
        $this->guard('admin')->logout();

        $sessionKey=$this->guard('admin')->getName();
        $request->session()->forget($sessionKey);


        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/admin/login');
    }




}
