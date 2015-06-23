<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ClanData;
use App\UsersChars;
use Symfony\Component\Finder\Tests\Comparator\ComparatorTest;

class ClansController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clans = ClanData::select('ClanData.ClanID', 'ClanData.ClanName', 'ClanData.ClanTag', 'ClanData.OwnerCustomerID',
                'ClanData.OwnerCharID', 'UsersChars.GamerTag', 'ClanData.MaxClanMembers', 'ClanData.NumClanMembers', 'ClanData.ClanLore')
            ->join('UsersData', 'ClanData.OwnerCustomerID', '=', 'UsersData.CustomerID')
            ->join('UsersChars', 'ClanData.OwnerCharID', '=', 'UsersChars.CharID')
            ->get();
        //dd($clans);
        return view('clans', compact('clans'));
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $clan = ClanData::select('ClanData.ClanID', 'ClanData.ClanName', 'ClanData.ClanTag', 'ClanData.OwnerCustomerID',
            'ClanData.OwnerCharID', 'UsersChars.GamerTag', 'ClanData.MaxClanMembers', 'ClanData.NumClanMembers', 'ClanData.ClanLore', 'ClanCreateDate')
            ->where('ClanData.ClanID', '=', $id)
            ->join('UsersChars', 'ClanData.OwnerCharID', '=', 'UsersChars.CharID')
            ->first();
        $users = UsersChars::where('ClanID', '=', $id)
            ->get();
        //dd($users);
        return view('clansView', compact('users','clan'));
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
	public function destroy($id)
	{
		//
	}

}
