<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;;
use Illuminate\Http\Request;
use Illuminate\Session\SessionServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\RedirectResponse;
use Session;
use Auth;

use App\UsersData;
use App\UsersInventory;
use App\Accounts;
use App\ClanData;
use App\UsersChars;


class AccountsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //dd(Auth::check());
        //if (Session::has('user_id')) {
            $accountCount = Accounts::count();
            $serials = 0;
            $globalInventory = UsersInventory::count();
            $bannedCount = UsersData::where('AccountStatus', '>=', '200')->count();
            $clanCount = ClanData::count();
            $zDollarCount = UsersData::sum('GameDollars');
            $charactersCount = UsersChars::count();

            return view('dashboard')->with([
                'accountCount' => $accountCount,
                'serials' => $serials,
                'globalInventory' => $globalInventory,
                'bannedCount' => $bannedCount,
                'clanCount' => $clanCount,
                'zDollarCount' => $zDollarCount,
                'charactersCount' => $charactersCount
            ]);
        //}
        //else return redirect('login');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Create an account
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function accounts()
    {
        $accounts = Accounts::select('email', 'Accounts.CustomerID', 'GamePoints', 'GameDollars', 'UsersData.IsDeveloper', 'UsersData.AccountStatus')
            ->join('UsersData', 'Accounts.CustomerID', '=', 'UsersData.CustomerID')
            ->orderby('Accounts.CustomerID', 'asc')
            ->paginate(20);//->get();
        //dd($accounts);
        return view('accounts', compact('accounts'));
    }


    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function doLogin(Request $request)
    {

        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            return redirect('home');
        else
            return redirect()->back();
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, Request $request)
	{
        $account = Accounts::join('UsersData', 'Accounts.CustomerID', '=', 'UsersData.CustomerID')
            ->where('Accounts.CustomerID', $id)
            ->first();
        return view('accountView',compact('account'))->with(['success' => $request->input('success')]);
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function charactersShow($id, Request $request)
    {

    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $account = Accounts::join('UsersData', 'Accounts.CustomerID', '=', 'UsersData.CustomerID')
            ->where('Accounts.CustomerID', $id)
            ->first();
        return view('accountEdit',compact('account'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
        $banExpire = explode('-',trim($request->input('date_range1')));
        $accountsEffected = Accounts::where('CustomerID', $id)
            ->update([
                'email' => $request->input('email'),
                'AccountStatus' => $request->input('AccountStatus')
            ]);
        $usersEffected = UsersData::where('CustomerID', $id)
            ->update([
                'GamePoints' => $request->input('GamePoints'),
                'GameDollars' => $request->input('GameDollars'),
                'IsDeveloper' => $request->input('IsDeveloper'),
                'AccountStatus' => $request->input('AccountStatus'),
                'BanReason' => (($request->input('AccountStatus') >= 200) ? $request->input('BanReason') : ''),
                'BanTime' => (($request->input('AccountStatus') >= 200) ? (new \DateTime())->format('Y-m-d H:i:s') : '1900-01-01 00:00:00'),
                'BanExpireDate' => (($request->input('AccountStatus') >= 200) ? (new \DateTime($banExpire[1]. ' '.$request->input('time')))->format('Y-m-d H:i:s') : '1900-01-01 00:00:00')
            ]);

        if($usersEffected >= 1 && $accountsEffected >= 1) return redirect()->action('AccountsController@show',['success' => true, 'id' => $id]);
        else return redirect()->action('AccountsController@show',['success' => false, 'id' => $id]);
	}


    /**
     * Ban the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function ban($id, Request $request)
    {
        $accountsEffected = Accounts::where('CustomerID', $id)
            ->update([
                'AccountStatus' => $request->input('AccountStatus')
            ]);
        $usersEffected = UsersData::where('CustomerID', $id)
            ->update([
                'AccountStatus' => $request->input('AccountStatus'),
                'BanReason' => $request->input('BanReason'),
                'BanTime' => (new \DateTime())->format('Y-m-d H:i:s'),
            ]);
        if($usersEffected >= 1 && $accountsEffected >= 1) return redirect()->action('AccountsController@show',['success' => true, 'id' => $id]);
        else return redirect()->action('AccountsController@show',['success' => false, 'id' => $id]);
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function find(Request $request)
    {
        $accounts = Accounts::join('UsersData', 'Accounts.CustomerID', '=', 'UsersData.CustomerID')
            ->where('Accounts.email', 'like', '%'.$request->input('search').'%')
            ->paginate(20);//->get();
        //dd($accounts);
        return view('accounts', compact('accounts'));
    }

}
