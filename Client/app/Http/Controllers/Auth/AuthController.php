<?php

namespace App\Http\Controllers\Auth;

use App\Accounts;
use App\UsersData;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    protected $salt = 'eU2|YqH+56+6K7oj|RZhY2*jwAv0Fbk82hKsi3vPgm3QcutSV+FoFxFh-_TD';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function doLogin(Request $request)
    {
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            return redirect('home');
            //return redirect('home');
        else
            return redirect('login')->with('message', 'Login Failed! Please enter the correct email and password.');
            //return redirect()->back();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request)
    {
        $account = new Accounts;

        $account->email = $request['email'];
        $account->MD5Password = md5($this->salt . $request['password']);
        $account->AccountStatus = 100;
        $account->IsDeveloper = 0;
        $account->ReferralID = 0;
        $account->dateregistered = (new \DateTime())->format('Y-m-d H:i:s');

        $account->save();

        $user = new UsersData;

        $user->CustomerID = $account->CustomerID;
        $user->AccountStatus = 100;
        $user->IsDeveloper = 0;
        $user->AccountType = 2;
        $user->GamePoints = 0;
        $user->GameDollars = 0;
        $user->dateregistered = (new \DateTime())->format('Y-m-d H:i:s');
        $user->lastjoineddate = '1973-01-01 00:00:00.000';
        $user->lastgamedate = '1973-01-01 00:00:00.000';
        $user->ClanID = 0;
        $user->ClanRank = 99;
        $user->CharsCreated = 0;
        $user->TimePlayed = 0;
        $user->DateActiveUntil = '2030-01-01 00:00:00.000';
        $user->BanCount = 0;

        $user->save();

        return redirect('login');

    }

    protected function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    protected function login()
    {
        return view('login');
    }

    protected function register()
    {
        return view('register');
    }
}
