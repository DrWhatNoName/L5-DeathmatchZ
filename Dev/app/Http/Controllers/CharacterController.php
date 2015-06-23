<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\UsersData;
use App\Accounts;
use App\UsersChars;
class CharacterController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$characters = Accounts::select('Accounts.CustomerID',  'UsersChars.CharID', 'UsersChars.Gamertag', 'UsersChars.Alive', 'UsersChars.Health', 'UsersChars.XP', 'UsersChars.Reputation')
        ->join('UsersChars', 'Accounts.CustomerID', '=', 'UsersChars.CustomerID')
        ->orderby('UsersChars.CharID', 'asc')
        ->paginate(20);//->get();
        //dd($accounts);
        return view('characters', compact('characters'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showAll($id, Request $request)
	{
        $characters = Accounts::join('UsersChars', 'Accounts.CustomerID', '=', 'UsersChars.CustomerID')
            //->join('ClanData', 'UsersChars.ClanID', '=', 'ClanData.ClanID')
            ->where('Accounts.CustomerID', $id)
            ->get();
        //dd($characters);
        return view('charactersView',compact('characters'))->with(['success' => $request->input('success')]);
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id, Request $request)
    {
        $characters = Accounts::join('UsersChars', 'Accounts.CustomerID', '=', 'UsersChars.CustomerID')
            //->join('ClanData', 'UsersChars.ClanID', '=', 'ClanData.ClanID')
            ->where('UsersChars.CharID', $id)
            ->get();

        //$characters = UsersChars::where('UsersChars.CharID', $id)->get();
        //dd($characters);
        return view('charactersView',compact('characters'))->with(['success' => $request->input('success')]);
    }


    /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function find(Request $request)
	{
        $characters = Accounts::select('Accounts.CustomerID',  'UsersChars.CharID', 'UsersChars.Gamertag', 'UsersChars.Alive', 'UsersChars.Health', 'UsersChars.XP', 'UsersChars.Reputation')
            ->join('UsersChars', 'Accounts.CustomerID', '=', 'UsersChars.CustomerID')
            ->where('UsersChars.Gamertag', 'like', '%'.$request->input('search').'%')
            ->orderby('UsersChars.CharID', 'asc')
            ->paginate(20);//->get();
        //dd($accounts);
        return view('characters', compact('characters'));
	}

}
