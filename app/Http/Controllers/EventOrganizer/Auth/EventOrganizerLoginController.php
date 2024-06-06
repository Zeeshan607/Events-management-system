<?php

namespace App\Http\Controllers\EventOrganizer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventOrganizerLoginController extends Controller
{
    //
    use AuthenticatesUsers;

    protected $redirectTo = '/eo/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('eventOrganizerLogout');
    }

    public function showLoginForm(){
        return view('eo.auth.login');
    }

    protected function guard(){
        return Auth::guard("event_organizer");
    }


    public function eventOrganizerLogin(Request $request){

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('event_organizer')->attempt(['email' =>$request->email, 'password' => $request->password], $request->get('remember'))) {
//            dd("in login func..");
            return redirect()->intended($this->redirectTo);
        }
        return back()->withInput($request->only('email', 'remember'))->withErrors(["Incorrect Credentials"]);
    }




    public function eventOrganizerLogout(Request $request)
    {
        Auth::guard("event_organizer")->logout();

        $sessionKey=Auth::guard("event_organizer")->getName();
        $request->session()->forget($sessionKey);


        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/eo/login');
    }





}
