<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\UsersInventory;
use App\UsersData;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $packs = [[
                            'name' => 'PVP Starter Pack',
                            'packid' => 0,
                            'CostGD' => 50000,
                            'CostGC' => 200,
                            'contains' => "100 K-Style Helmets<br> 100 Guerillas<br>50 M4's<br> 50 FN Scar's<br>200 Bandages DX"],
    ];

    public function index()
    {
        return view('store')->with(['packs' => $this->packs]);
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

    public function store($id)
    {
        return view('storeConfirm')->with(['pack' => $this->packs[$id]]);
    }

    public function storeGD($id)
    {
        $user = Auth::user();

        $Dollars = UsersData::select('GameDollars')
            ->where('CustomerID', $user->CustomerID)->first();
        switch($id){
            case 0:
                if($Dollars->GameDollars < 50000) return "You cannot afford this!";

                UsersInventory::insert(['CharID' => 0, 'BackpackSlot' => 0, 'LeasedUntil' => '2020-11-29 17:42:12.593',
                     'var1' => '-1', 'var2' => '-1', 'ItemID' => 20006, 'Quantity' => 100,
                     'CustomerID' => $user->CustomerID]);
                UsersInventory::insert(['CharID' => 0, 'BackpackSlot' => 0, 'LeasedUntil' => '2020-11-29 17:42:12.593',
                    'var1' => '-1', 'var2' => '-1', 'ItemID' => 20015, 'Quantity' => 100,
                    'CustomerID' => $user->CustomerID]);
                UsersInventory::insert(['CharID' => 0, 'BackpackSlot' => 0, 'LeasedUntil' => '2020-11-29 17:42:12.593',
                    'var1' => '-1', 'var2' => '-1', 'ItemID' => 101262, 'Quantity' => 200,
                    'CustomerID' => $user->CustomerID]);
                UsersInventory::insert(['CharID' => 0, 'BackpackSlot' => 0, 'LeasedUntil' => '2020-11-29 17:42:12.593',
                    'var1' => '-1', 'var2' => '-1', 'ItemID' => 101055, 'Quantity' => 50,
                    'CustomerID' => $user->CustomerID]);
                UsersInventory::insert(['CharID' => 0, 'BackpackSlot' => 0, 'LeasedUntil' => '2020-11-29 17:42:12.593',
                    'var1' => '-1', 'var2' => '-1', 'ItemID' => 101193, 'Quantity' => 50,
                    'CustomerID' => $user->CustomerID]);

                UsersData::decrement('GameDollars', 50000)
                    ->where('CustomerID', $user->CustomerID);
        }
        return redirect('shop');
    }

    public function storeGP($id)
    {
        $user = Auth::user();
        $GC = UsersData::select('GamePoints')
            ->where('CustomerID', $user->CustomerID)->first();
        switch($id){
            case 0:
                if($GC->GamePoints < 200) return "You cannot afford this!";

                UsersInventory::insert(['CharID' => 0, 'BackpackSlot' => 0, 'LeasedUntil' => '2020-11-29 17:42:12.593',
                    'var1' => '-1', 'var2' => '-1', 'ItemID' => 20006, 'Quantity' => 100,
                    'CustomerID' => $user->CustomerID]);
                UsersInventory::insert(['CharID' => 0, 'BackpackSlot' => 0, 'LeasedUntil' => '2020-11-29 17:42:12.593',
                    'var1' => '-1', 'var2' => '-1', 'ItemID' => 20015, 'Quantity' => 100,
                    'CustomerID' => $user->CustomerID]);
                UsersInventory::insert(['CharID' => 0, 'BackpackSlot' => 0, 'LeasedUntil' => '2020-11-29 17:42:12.593',
                    'var1' => '-1', 'var2' => '-1', 'ItemID' => 101262, 'Quantity' => 200,
                    'CustomerID' => $user->CustomerID]);
                UsersInventory::insert(['CharID' => 0, 'BackpackSlot' => 0, 'LeasedUntil' => '2020-11-29 17:42:12.593',
                    'var1' => '-1', 'var2' => '-1', 'ItemID' => 101055, 'Quantity' => 50,
                    'CustomerID' => $user->CustomerID]);
                UsersInventory::insert(['CharID' => 0, 'BackpackSlot' => 0, 'LeasedUntil' => '2020-11-29 17:42:12.593',
                    'var1' => '-1', 'var2' => '-1', 'ItemID' => 101193, 'Quantity' => 50,
                    'CustomerID' => $user->CustomerID]);
                UsersData::decrement('GamePoints', 200)
                    ->where('CustomerID', $user->CustomerID);
        }
        return redirect('shop');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
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
