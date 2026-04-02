<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function login(Request $request)
    {
        $input = $request->all();
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email does not exist.');
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Incorrect password.');
        }
        
        if ($user->employment->status == 'Terminated') {
            return redirect()->back()->with('error', 'Employee account is Terminated.');
        }

        if(auth()->attempt(['email'=>$input['email'], 'password'=>$input['password']]))
        {
            if(auth()->user()->role == 'admin'){
                return redirect()->route('admin.home');
            }
            else if(auth()->user()->role == 'employee'){
                return redirect()->route('employee.home');
            }else if(auth()->user()->role == 'it admin'){
                return redirect()->route('itadmin.home');
            }else if(auth()->user()->role == 'payroll officer'){
                return redirect()->route('payrollofficer.home');
            }
            else{
                return redirect()->route('director.home');
            }
        }
    }
}
